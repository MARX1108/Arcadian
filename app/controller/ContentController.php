<?php

include_once '../global.php';

if(isset($_POST['delete_request']))
{

  PictureStory::deleteStory($_POST['storyID']); 
  $ev = new Event();
  $ev->event_type = Event::EVENT_TYPE['delete_story'];
  $ev->user_1_id = $_POST['userid'];
  $ev->story_1_id = $_POST['storyID'];
  $ev = Event::insertEvent($ev);
  echo json_encode(
    array("message" => "test call back")
  );
}

$route = $_GET['route'];

$nc = new ContentController();




if ($route == 'all') {
  $nc->all();
} elseif ($route == 'discover') {
  $nc->discover();
} elseif ($route == 'profile_timeline') {
  $nc->profile_timeline(' ');
} elseif ($route == 'profile_following') {
  $nc->profile_following(' ');
} elseif ($route == 'detail') {
  $nc->detail();
} elseif ($route == 'submit') {
  $nc->addnewpicture();
}
elseif ($route == 'save_editing_process') {
  $nc->save_editing_process();
}
elseif ($route == 'admin')
{
  $nc->admin("");
}
elseif ($route == 'myProfile')
{
  $nc->myProfile(' ');
}
elseif ($route == 'confirm_profile_change')
{
  $nc->confirm_profile_change();
}
elseif ($route == 'admin_confirm_change')
{
  $nc->admin_confirm_change();
}
elseif ($route == 'user')
{
  $nc->userProfile();
}
elseif ($route == 'signup')
{
  $nc->signup();
}
elseif($route == 'confirm_registration')
{
  $nc->confirm_registration();
}
elseif($route == 'event_order')
{
  $nc->event_order();
}
elseif ($route == 'post_on_plugin') {
  $nc->post_on_plugin();
}
elseif($route == 'user_bubble')
{
  $nc->user_bubble();
}
elseif($route == 'change_bubble')
{
  $nc->change_bubble();
}





class ContentController {
  // build and load admin page
  public function admin($notification) {

    $stories = PictureStory::loadAllStories();
    $users = User::loadAllUsers();
    $stylesheet = "style.css";
    $pageTitle = 'News';

    $script = 'news';
    $all_state = "active_tab";
    $discover_state = "";
    $profile_state = "";
    // $notification = "";
    if(isset($_GET['success']))
    {
      $succss = $_GET['success'];
      if($succss == "true")
      {
        $notification = 
        "<div class='alert alert-success mx-3' role='alert'>
        Profile update succesful! </div>";
      }
    }


    include_once SYSTEM_PATH.'/view/header.php';
    include_once SYSTEM_PATH.'/view/admin.php';
    include_once SYSTEM_PATH.'/view/footer.php';
  }
  // build and load the home page
  public function all() {

    $stories = PictureStory::loadAllStories();
    $stylesheet = "style.css";
    $pageTitle = 'News';

    $script = 'news';
    $all_state = "active_tab";
    $discover_state = "";
    $profile_state = "";
    $content = Event::generateContent("");
    include_once SYSTEM_PATH.'/view/header.php';
    include_once SYSTEM_PATH.'/view/home.php';
    include_once SYSTEM_PATH.'/view/footer.php';
  }
  // build and load discover page
  public function discover() 
  {
    $all_state = "";
    $discover_state = "active_tab";
    $profile_state = "";


    $stylesheet = "style.css";
    $stories = PictureStory::loadAllStories();

    include_once SYSTEM_PATH.'/view/header.php';
    include_once SYSTEM_PATH.'/view/discover.php';
    include_once SYSTEM_PATH.'/view/footer.php';
  }
  // build and load signup page
  public function signup()
  {
    $all_state = "";
    $discover_state = "";
    $profile_state = "";


    $stylesheet = "style.css";    

    include_once SYSTEM_PATH.'/view/header.php';
    include_once SYSTEM_PATH.'/view/signup.php';
    include_once SYSTEM_PATH.'/view/footer.php';
  }
  // build and load user profile page
  public function userProfile()
  {
    $username = $_GET['username'];
    $all_state = "";
    $discover_state = "";
    $profile_state = "active_tab";


      $stories = PictureStory::loadAllStories();

      $stylesheet = "profile.css";
      $user = User::loadByUsername($username);

      if($user == null)
      {
        include_once SYSTEM_PATH.'/view/header.php';
        echo "<div class = 'container card m-4 p-4 alert alert-danger'> Wrong username or The user no longer exists</div>
        <footer id='footer' class = 'page-footer fixed-bottom'>
        <div id='copyright'>@2019 Arcadian <a href='#'>Contact Us</a></div>
        </footer>
        </body>
        </html>
        ";
      // include_once SYSTEM_PATH.'/view/footer.php';
      }
      else
      {
        if($user->role == 0)
        {
          $acounttype = "Registered user";
        }
        else
        {
          $acounttype = "Site admin";
        }
  
        if($user->class_standing == 0)
        {
          $class_standing = "Freshman";
        }
        elseif($user->class_standing == 1)
        {
          $class_standing = "Sophomore";
        }
        elseif($user->class_standing == 2)
        {
          $class_standing = "Junior";
        }
        elseif($user->class_standing == 3)
        {
          $class_standing = "Senior";
        }
  
  
      $content = Event::generateContent($user->id);
      include_once SYSTEM_PATH.'/view/header.php';
      include_once SYSTEM_PATH.'/view/userProfile.php';
      include_once SYSTEM_PATH.'/view/footer.php';
      }
      
  }
  // process event reorder ajax request
  public function event_order()
  {
    // $content = Event::generateContent($user->id);
    // echo "generateContent\n";
    $order = $_GET['order'];

    $content = Event::generateContent($order);
    echo json_encode(
      array("message" => "generateContent", "event" => $content)
    );
  }

    // build and load my profile page
  public function myProfile($notification)
  {
    $all_state = "";
    $discover_state = "";
    $profile_state = "active_tab";


    $stories = PictureStory::loadAllStories();
    if(isset($_SESSION['username']))
    {
      $stylesheet = "profile.css";
      $user = User::loadByID($_SESSION['loggedInUserID']);
      if($user->role == 0)
      {
        $acounttype = "Registered user";
      }
      else
      {
        $acounttype = "Site admin";
      }

      if($user->class_standing == 0)
      {
        $class_standing = "Freshman";
      }
      elseif($user->class_standing == 1)
      {
        $class_standing = "Sophomore";
      }
      elseif($user->class_standing == 2)
      {
        $class_standing = "Junior";
      }
      elseif($user->class_standing == 3)
      {
        $class_standing = "Senior";
      }




    }
    else
    {
      $stylesheet = "lock.css";
    }

    $content = Event::generateContent($_SESSION['loggedInUserID']);
    include_once SYSTEM_PATH.'/view/header.php';
    include_once SYSTEM_PATH.'/view/myProfile.php';
    include_once SYSTEM_PATH.'/view/footer.php';
  }

    // build and load timeline page
  public function profile_timeline($note) 
  {
    
    $all_state = "";
    $discover_state = "";
    $profile_state = "active_tab";
    $notification = $note;

    $stories = PictureStory::loadAllStories();
    if(isset($_SESSION['username']))
    {
      $stylesheet = "profile.css";
      $user = User::loadByID($_SESSION['loggedInUserID']);
    }
    else
    {
      $stylesheet = "lock.css";
    }

    if(isset($_SESSION['loggedInUserID']))
    {
      $content = Event::generateContent($_SESSION['loggedInUserID']);
    }
    else
    {
      $content = "";
    }


    include_once SYSTEM_PATH.'/view/header.php';
    include_once SYSTEM_PATH.'/view/timeline.php';
    include_once SYSTEM_PATH.'/view/footer.php';
    // echo $notification;
  }

  // build and load following page
  public function profile_following($notification) 
  {
    $all_state = "";
    $discover_state = "";
    $profile_state = "active_tab";
    
    if(isset($_SESSION['username']))
    {
      $stylesheet = "profile.css";
      $user = User::loadByID($_SESSION['loggedInUserID']);
    }
    else
    {
      $stylesheet = "lock.css";
    }
    
    $stories = PictureStory::loadAllStories();
    $content = Event::generateContent($_SESSION['loggedInUserID']);
    include_once SYSTEM_PATH.'/view/header.php';
    include_once SYSTEM_PATH.'/view/following.php';
    include_once SYSTEM_PATH.'/view/footer.php';
 
  }


  // build and load detail story page
  public function detail() {
    $storyID = $_GET['storyID'];

    $story = PictureStory::loadByID($storyID);
    $user = User::loadByID($story->creator_id);
    $stylesheet = "pic.css";
    $pageTitle = 'News';
    include_once SYSTEM_PATH.'/view/header.php';
    
    if((isset($_POST['edit_request']) ))
    {
      include_once SYSTEM_PATH.'/view/detail_edit.php';
    }
    else
    {
      include_once SYSTEM_PATH.'/view/detail.php';
    }

    include_once SYSTEM_PATH.'/view/footer.php';
  }
  // process and add a new picture to the database
  public function addnewpicture()
  {
    $title = $_POST['title'];
    $url = $_POST['url'];
    $img_url = $_POST['img_url'];
    $description = $_POST['description'];
    $tags = $_POST['tags'];
    $creator_id = $_SESSION['loggedInUserID'];
    $story = new PictureStory();


    $story-> title = $title;
    $story-> url = $url;
    $story-> img_url = $img_url;

    $story-> description = $description;
    $story-> creator_id = $creator_id;
    
    if($tags == "") $tags = "#This-is-no-tag tag";
    $story-> tags = $tags;

    $story->author = $_SESSION['username'];
    $story = PictureStory::insertStory($story);

    // log the event
    $ev = new Event();
    $ev->event_type = Event::EVENT_TYPE['add_story'];
    $ev->user_1_id = $story->creator_id;
    $ev->story_1_id = $story->id;
    $ev = Event::insertEvent($ev);
    // echo $ev;
    header('Location: '.BASE_URL.'/detail/'.$story->id); exit();

  }

  // process chrome plugin
  public function post_on_plugin()
  {
    $description = $_POST['description_2'];
    $title = $_POST['title'];
    $url = $_POST['url'];
    $img_url = $_POST['img_url'];
    $creator_id = $_POST['description'];
    $tags = $_POST['tags'];
    $story = new PictureStory();


    $story-> title = $title;
    $story-> url = $url;
    $story-> img_url = $img_url;

    $story-> description = $description;
    $story-> creator_id = $creator_id;
    
    if($tags == "") $tags = "#This-is-no-tag tag";
    $story-> tags = $tags;

    $story->author = $POST['username'];
    $story = PictureStory::insertStory($story);

    // log the event
    $ev = new Event();
    $ev->event_type = Event::EVENT_TYPE['add_story'];
    $ev->user_1_id = $story->creator_id;
    $ev->story_1_id = $story->id;
    $ev = Event::insertEvent($ev);

    $url = BASE_URL."/detail/".$story->id;
    echo json_encode(array("content" => 'post success', "url" => $url, "id" => $creator_id, "description" => $description));
  }


  // save the edited story to the database
  public function save_editing_process()
  {
    $storyID = $_GET['storyID'];
    $title = "empty";
    $img_url = "empty";
    $description = "empty";
    $tags = "empty";
    $url = "empty";

    if(isset($_POST['title'])) $title = $_POST['title'];
    if(isset($_POST['img_url'])) $img_url = $_POST['img_url'];
    if(isset($_POST['url'])) $url = $_POST['url'];
    if(isset($_POST['description'])) $description = $_POST['description'];
    if(isset($_POST['tag'])) $tags = $_POST['tag'];
    if(isset($_POST['tag'])) $creator_id = $_POST['creator_id'];

    $story = new PictureStory();
    $story-> id = $storyID;
    $story-> title = $title;
    $story-> url = $url;
    $story-> img_url = $img_url;
    $story-> description = $description;
    $story-> tags = $tags;
    $story-> creator_id = $creator_id;
    PictureStory::updateStory($story);

    $ev = new Event();
    $ev->event_type = Event::EVENT_TYPE['edit_story'];
    $ev->user_1_id = $story->creator_id;
    $ev->story_1_id = $story->id;
    $ev = Event::insertEvent($ev);

    header('Location: '.BASE_URL.'/detail/'.$story->id); exit();
  }

  //  save and create a new user on the database
  public function confirm_registration()
  {

    $user = new User();
    if(isset($_POST['username'])) $username = $_POST['username'];
    if(isset($_POST['password'])) $password = $_POST['password'];
    if(isset($_POST['firstname'])) $firstname = $_POST['firstname'];
    if(isset($_POST['lastname'])) $lastname = $_POST['lastname'];
    if(isset($_POST['email'])) $email = $_POST['email'];
    if(isset($_POST['class_standing'])) $class_standing = $_POST['class_standing'];

    if($class_standing == "Freshman")
    {
      $class_standing = 0;
    }
    elseif($class_standing == "Sophomore")
    {
      $class_standing = 1;
    }
    elseif($class_standing== "Junior")
    {
      $class_standing = 2;
    }
    elseif($class_standing == "Senior")
    {
      $class_standing = 3;
    }

    $username = mysqli_real_escape_string($GLOBALS['conn'], $username);
    $password = mysqli_real_escape_string($GLOBALS['conn'], $password);
    $firstname = mysqli_real_escape_string($GLOBALS['conn'], $firstname);
    $lastname = mysqli_real_escape_string($GLOBALS['conn'], $lastname);
    $email = mysqli_real_escape_string($GLOBALS['conn'], $email);
    $class_standing = mysqli_real_escape_string($GLOBALS['conn'], $class_standing);

    $user-> username = $username;
    $user-> password = $password;
    $user-> firstname = $firstname;
    $user-> lastname = $lastname;
    $user-> email = $email;
    $user-> class_standing = $class_standing;

    $exist_user = User::loadByUsername($username);

    
    

    if($exist_user != null)
    {
      $all_state = "";
      $discover_state = "";
      $profile_state = "";
  
  
      $stylesheet = "style.css";    
  
      include_once SYSTEM_PATH.'/view/header.php';
      echo"<div id = 'alert_div'><div class='alert alert-danger' role='alert'>
      Unsuccesful! Duplicate username </div> </div>";
      include_once SYSTEM_PATH.'/view/signup.php';
      include_once SYSTEM_PATH.'/view/footer.php';
    }
    else
    {
      User::create_new($user);

      $newuser = User::loadByUsername($username);
      $newuser_id = $newuser-> id;
      
       
      $ev = new Event();
      $ev->event_type = Event::EVENT_TYPE['new_users'];
      $ev->user_1_id = ($newuser_id );
      $ev = Event::insertEvent($ev);

      $stories = PictureStory::loadAllStories();
      $stylesheet = "style.css";
      $pageTitle = 'News';
  
      $script = 'news';
      $all_state = "active_tab";
      $discover_state = "";
      $profile_state = "";
      $name = $user->$username;
      $content = Event::generateContent("");





      include_once SYSTEM_PATH.'/view/header.php';
      echo"<div id = 'alert_div'><div class='alert alert-success' role='alert'>
      Registration succesful! Your username is $username </div> </div>";
      include_once SYSTEM_PATH.'/view/home.php';
      include_once SYSTEM_PATH.'/view/footer.php';
      exit();
    }
    
  }

  //  save the change of user profile to the database
  public function confirm_profile_change()
  {
    $id = $_GET['user_ID'];
    $user = new User();
    $user-> id = $id;

    if(isset($_POST['password'])) $password = $_POST['password'];
    if(isset($_POST['firstname'])) $firstname = $_POST['firstname'];
    if(isset($_POST['lastname'])) $lastname = $_POST['lastname'];
    if(isset($_POST['email'])) $email = $_POST['email'];
    if(isset($_POST['class_standing'])) $class_standing = $_POST['class_standing'];

  

    if($class_standing == "Freshman")
    {
      $class_standing = 0;
    }
    elseif($class_standing == "Sophomore")
    {
      $class_standing = 1;
    }
    elseif($class_standing== "Junior")
    {
      $class_standing = 2;
    }
    elseif($class_standing == "Senior")
    {
      $class_standing = 3;
    }


    $password = mysqli_real_escape_string($GLOBALS['conn'], $password);
    $firstname = mysqli_real_escape_string($GLOBALS['conn'], $firstname);
    $lastname = mysqli_real_escape_string($GLOBALS['conn'], $lastname);
    $email = mysqli_real_escape_string($GLOBALS['conn'], $email);
    $class_standing = mysqli_real_escape_string($GLOBALS['conn'], $class_standing);

    $user-> password = $password;
    $user-> firstname = $firstname;
    $user-> lastname = $lastname;
    $user-> email = $email;
    $user-> class_standing = $class_standing;

    // echo("Error description: " . mysqli_error($con));
    
    $result = User::update_profile($user);

    $ev = new Event();
    $ev->event_type = Event::EVENT_TYPE['edit_profile'];
    $ev->user_1_id = $id;
    $ev = Event::insertEvent($ev);

    if($result) {
      $notification = 
      "<div class='alert alert-success' role='alert'>
      Profile update succesful! </div>";
      
    } else {
      $notification = 
      "<div class='alert alert-danger' role='alert'>
      Profile update unsuccesful! </div>";
    }

    $nc = new ContentController();
    $nc-> myProfile($notification);

  }

  // confirm the change and save the user profile change to the database
  function admin_confirm_change()
  {
    $id = $_GET['user_ID'];
    // echo $id ;
    $newUserName = $_POST['username'];
    User::update_Username($id, $newUserName);

    $role = $_POST['role'];
    User::update_role($id, $role);
    // echo $role;

    header('Location: '.BASE_URL.'/admin/success'); exit();

  }

  // create new nodes and bubbles
  function user_bubble()
  {
    $nodes = array();

    // create user nodes
    $users = User::loadAllUsers();
    foreach($users as $user) {
      
      //place holder
      $childrens = array();
      $childrens[0] = array( 'name' => 'role','address' => "1",'note' => 'n');
      $childrens[1] = array( 'name' => 'email','address' => "2",'note' => 'u');
      $childrens[2] = array( 'name' => 'class standing','address' => "3",'note' => 'e');

      //user info

      $info = array( 
        'ID' => $user->id,
        'Username' => $user->username,
        'Firstname' => $user->firstname,
        'LastName' =>$user->lastname,
        'Role' => $user->role,
        'Date' => $user->date_registered,
      );
      
      $userNode = array(
        //username & userid
        'name' => $user->username,
        'id' => $user->id,
        'children' => $childrens,
        'info' => $info
      );
      $nodes[] = $userNode;
    }

    $json = array(
      "name" => "bubble",
      'children' => $nodes
    );

    header('Content-Type: application/json');
    echo json_encode($json);
  }

  // make changes to the bubbles
  function change_bubble()
  {
    if($_POST['mode'] == 'save')
    {


      $id = $_POST['user_ID'];
      // echo $id ;
      $newUserName = $_POST['username'];
      User::update_Username($id, $newUserName);
  
      $newlastname = $_POST['lastname'];
      User::update_Lastname($id, $newlastname);


      $newfirstname= $_POST['firstname'];
      User::update_Firstname($id, $newfirstname);

      $role = $_POST['role'];
      User::update_role($id, $role);


      $json = array(
        "id" => $id,
        "msg" => "saved in php"
      );
    }
    else if($_POST['mode'] == 'delete')
    {
      $id = $_POST['user_ID'];
      User::delete_by_UserId($id);
    }
    else
    {
      $user = new User();
      if(isset($_POST['username'])) $username = $_POST['username'];
      if(isset($_POST['password'])) $password = $_POST['password'];
      if(isset($_POST['firstname'])) $firstname = $_POST['firstname'];
      if(isset($_POST['lastname'])) $lastname = $_POST['lastname'];
      $username = mysqli_real_escape_string($GLOBALS['conn'], $username);
      $password = mysqli_real_escape_string($GLOBALS['conn'], $password);
      $firstname = mysqli_real_escape_string($GLOBALS['conn'], $firstname);
      $lastname = mysqli_real_escape_string($GLOBALS['conn'], $lastname);
      
      $user-> username = $username;
      $user-> password = $password;
      $user-> firstname = $firstname;
      $user-> lastname = $lastname;
      $user-> email = '';
      $user-> class_standing = 0;
      User::create_new($user);
    }


    echo json_encode($json);
  }
}