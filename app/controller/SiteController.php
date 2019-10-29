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
    if($username == ADMIN_USERNAME && $password == ADMIN_PASSWORD) {
      //  echo 'correct';
      // session_start();
      $_SESSION['username'] = $username;
      $_SESSION['msg'] = 'Login successful!';
      header('Location: '.BASE_URL.'/profile/timeline'); exit();
    } else {
      //  echo 'incorrect';
      $_SESSION['msg'] = 'Login failed. Your username or password is incorrect.';
      header('Location: '.BASE_URL.'/home'); exit();
    }
  }

  public function logout(){
    unset($_SESSION['username']); // unset session variable
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
