<?php

include_once '../global.php';
//include_once '../model/classes/NewsStory.php';

$route = $_GET['route'];

$nc = new NewsController();

if ($route == 'all') {
  $nc->all();
} elseif ($route == 'discover') {
  $nc->add();
} elseif ($route == 'profile') {
  $nc->addProcess();
} elseif ($route == 'detail') {
  $nc->detail();
}

class NewsController {
  public function all() {

    // $stories = NewsStory::loadAllStories();

    // $pageTitle = 'News';
    // $stylesheet = 'news';
    // $script = 'news';

    include_once SYSTEM_PATH.'/view/header.php';
    include_once SYSTEM_PATH.'/view/home.php';
    include_once SYSTEM_PATH.'/view/footer.php';
  }

  public function discover() 
  {
    $pageTitle = 'Submit News';
    include_once SYSTEM_PATH.'/view/header.php';
    include_once SYSTEM_PATH.'/view/discover.php';
    include_once SYSTEM_PATH.'/view/footer.php';
  }

  public function profile() {
    // get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $img_url = $_POST['img_url'];
    $url = $_POST['url'];

    // save new NewsStory to database
    $story = new NewsStory();
    $story->title = $title;
    $story->description = $description;
    $story->img_url = $img_url;
    $story->url = $url;
    $story->creator = $_SESSION['username'];
    $story = NewsStory::insertStory($story);

    // redirect to detail page for that story
    header('Location: '.BASE_URL.'/news/'.$story->id); exit();
  }

  public function detail() {
    $storyID = $_GET['storyID'];
    $story = NewsStory::loadByID($storyID);
    echo $story->title;
    //$stories = NewsStory::loadAllStories();
    //$story = $stories[$storyID];

    $pageTitle = 'News';
    include_once SYSTEM_PATH.'/view/header.php';
    include_once SYSTEM_PATH.'/view/detail.php';
    include_once SYSTEM_PATH.'/view/footer.php';
  }

}
