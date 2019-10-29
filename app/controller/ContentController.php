<?php

include_once '../global.php';
// include_once '../model/classes/PictureStory.php';

$route = $_GET['route'];

$nc = new ContentController();

if(isset($_POST['delete_request']))
{
  PictureStory::deleteStory($_POST['storyID']);

  header('Location: '.BASE_URL.'/profile/timeline'); exit();
}


if ($route == 'all') {
  $nc->all();
} elseif ($route == 'discover') {
  $nc->discover();
} elseif ($route == 'profile_timeline') {
  $nc->profile_timeline();
} elseif ($route == 'profile_following') {
  $nc->profile_following();
} elseif ($route == 'detail') {
  $nc->detail();
} elseif ($route == 'submit') {
  $nc->addnewpicture();
}
elseif ($route == 'save_editing_process') {
  $nc->save_editing_process();
}

class ContentController {
  public function all() {

    $stories = PictureStory::loadAllStories();
    $stylesheet = "style.css";
    $pageTitle = 'News';

    $script = 'news';
    $all_state = "active_tab";
    $discover_state = "";
    $profile_state = "";

    include_once SYSTEM_PATH.'/view/header.php';
    include_once SYSTEM_PATH.'/view/home.php';
    include_once SYSTEM_PATH.'/view/footer.php';
  }

  public function discover() 
  {
    $all_state = "";
    $discover_state = "active_tab";
    $profile_state = "";


    $stylesheet = "style.css";
    $stories = PictureStory::loadAllStories();

    $pageTitle = 'Submit News';
    include_once SYSTEM_PATH.'/view/header.php';
    include_once SYSTEM_PATH.'/view/discover.php';
    include_once SYSTEM_PATH.'/view/footer.php';
  }


  public function profile_timeline() 
  {
    $all_state = "";
    $discover_state = "";
    $profile_state = "active_tab";


    $stories = PictureStory::loadAllStories();
    if(isset($_SESSION['username']))
    {
      $stylesheet = "profile.css";
    }
    else
    {
      $stylesheet = "lock.css";
    }

    include_once SYSTEM_PATH.'/view/header.php';
    include_once SYSTEM_PATH.'/view/timeline.php';
    include_once SYSTEM_PATH.'/view/footer.php';
  }


  public function profile_following() 
  {
    $all_state = "";
    $discover_state = "";
    $profile_state = "active_tab";
    
    if(isset($_SESSION['username']))
    {
      $stylesheet = "profile.css";
    }
    else
    {
      $stylesheet = "lock.css";
    }
    
    $stories = PictureStory::loadAllStories();
    include_once SYSTEM_PATH.'/view/header.php';
    include_once SYSTEM_PATH.'/view/following.php';
    include_once SYSTEM_PATH.'/view/footer.php';
 
  }
  public function delete()
  {
    $storyID = $_POST['storyID'];
    PictureStory::deleteStory($storyID);
    echo "delete successful";
    header('Location: '.BASE_URL.'/profile/timeline'); exit();
  }


  public function detail() {
    $storyID = $_GET['storyID'];

    if((isset($_POST['delete_request']) ))
    {
      PictureStory::deleteStory($storyID);
      echo "delete successful";
      header('Location: '.BASE_URL.'/profile/timeline'); exit();
    }

  
    $story = PictureStory::loadByID($storyID);
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

  public function addnewpicture()
  {
    $title = $_POST['title'];
    $url = $_POST['url'];
    $img_url = $_POST['img_url'];
    $description = $_POST['description'];
    $tags = $_POST['tags'];

    $story = new PictureStory();


    $story-> title = $title;
    $story-> url = $url;
    $story-> img_url = $img_url;

    // if($description == "") $description = "He/She didn't leave any descriptions";
    $story-> description = $description;
    
    if($tags == "") $tags = "#This-is-no-tag tag";
    $story-> tags = $tags;

    $story->author = $_SESSION['username'];
    $story = PictureStory::insertStory($story);
    header('Location: '.BASE_URL.'/detail/'.$story->id); exit();

  }

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

    $story = new PictureStory();
    $story-> id = $storyID;
    $story-> title = $title;
    $story-> url = $url;
    $story-> img_url = $img_url;
    $story-> description = $description;
    $story-> tags = $tags;
    PictureStory::updateStory($story);
    header('Location: '.BASE_URL.'/detail/'.$story->id); exit();
  }
}
