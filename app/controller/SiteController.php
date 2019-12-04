<?php

include_once '../global.php';

$route = $_GET['route'];

$sc = new SiteController();

if ($route == 'login') {
  $sc->login();
} elseif($route == 'loginProcess') {
  $sc->loginProcess();
} elseif($route == 'logout') {
  $sc->logout();
} elseif($route == 'home') {
  $sc->home();
}
elseif($route == 'login_on_plugin') {
  $sc->login_on_plugin();
}

class SiteController {
  public function login() {
    $stylesheet = "style.css";
    $pageTitle = 'Log In';
    include_once SYSTEM_PATH.'/view/header.php';
    // include_once SYSTEM_PATH.'/view/login.php';
    include_once SYSTEM_PATH.'/view/footer.php';
  }

  public function loginProcess() 
  {
      
    $username = $_POST['un'];
    $password = $_POST['pw'];
    $user = User::loadByUsername($username);

    if($user == null) {
      $_SESSION['msg'] = 'Login failed. Username does not exits.';
      header('Location: '.BASE_URL.'/home'); exit();
    } elseif($user->password != $password) {
      $_SESSION['msg'] = 'Login failed. Your password is incorrect.';
      header('Location: '.BASE_URL.'/home'); exit();
    } else {

      $_SESSION['username'] = $user->username;
      $_SESSION['loggedInUserID'] = $user->id;
      $_SESSION['loggedInUserRole'] = $user->role;
      $_SESSION['msg'] = 'Login successful!';
      header('Location: '.BASE_URL.'/profile/timeline'); exit();
    }

  }

  public function login_on_plugin() 
  {
      
    $username = $_POST['un'];
    $password = $_POST['pw'];
    $user = User::loadByUsername($username);

    if($user == null) {
      echo json_encode(array("content" => 'Login failed. Your password is incorrect.', "username" => 'none'));
    } elseif($user->password != $password) {
      echo json_encode(array("content" => 'Login failed. Your password is incorrect.', "username" => 'none'));
    } else {
      echo json_encode(array("content" => 'Login successful!'. $user->username, "username" => $user->username, "userid" => $user->id));
      // $_SESSION['username'] = $user->username;
      // $_SESSION['loggedInUserID'] = $user->id;
      // $_SESSION['loggedInUserRole'] = $user->role;
      // $_SESSION['msg'] = 'Login successful!';
      // header('Location: '.BASE_URL.'/profile/timeline'); exit();
    }

  }

  public function logout(){
    unset($_SESSION['loggedInUserID']); // unset session variable
    session_destroy(); // destroy session
    header('Location: '.BASE_URL.'/home'); exit(); // redirect to login page
  }

  public function home() {
    $pageTitle = 'Home';
    include_once SYSTEM_PATH.'/view/header.php';
    include_once SYSTEM_PATH.'/view/home.php';
    include_once SYSTEM_PATH.'/view/footer.php';
  }

}
