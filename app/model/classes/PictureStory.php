<?php

class PictureStory {
    public $id;
    public $author;
    public $title;
    public $img_url;
    public $url;
    public $views;
    public $tags;
    public $likes;
    public $donate;
    public $description;
    public $date_created;
    public $creator_id;
    const DB_TABLE = "news_list";

    public static function loadAllStories()
    {
        $stories = array();
        $query = "SELECT id FROM ".self::DB_TABLE." ORDER BY id";
        
        $result = $GLOBALS['conn']->query($query);
        // $num_rows = mysql_num_rows($result);

        if($result->num_rows) {
          while($row = $result->fetch_assoc()) 
          {
              $st = self::loadByID($row['id']);
              $stories[$row['id']] = $st;
          }
        }
        return $stories;
    }

    public static function loadByID($storyID) {
        $query = sprintf("SELECT * FROM %s WHERE id = %d",
            self::DB_TABLE,
            $GLOBALS['conn']->real_escape_string($storyID)
            );
    
        $result = $GLOBALS['conn']->query($query);
        if($result->num_rows) {
          $row = $result->fetch_assoc();
          $st = new PictureStory();
          $st -> id =  $row['id'];
          $st -> author = $row['author'];
          $st -> title =  $row['title'];
          $st -> img_url =  $row['img_url'];
          $st -> url =  $row['url'];
          $st -> views =  $row['views'];
          $st -> tags =  $row['tags'];
          $st -> likes =  $row['likes'];
          $st -> donate =  $row['donate'];
          $st -> description =  $row['description'];
          $st -> date_created =  $row['date_created'];
          $st -> creator_id =  $row['creator_id'];
          return $st;
        }
        else {
          return null;
        }
      }

      public static function insertStory($story)
      {


          if(strcmp($story->title, '')==0)
          {
            $story->title = "This guy forgot a title";
          } 
          if(strcmp($story->description, '')==0)
          {
            $story->description = "This author forgot to leave a description";
          } 
          

          $description = mysqli_real_escape_string($GLOBALS['conn'], $story->description);
          $author = mysqli_real_escape_string($GLOBALS['conn'], $story->author);
          $title = mysqli_real_escape_string($GLOBALS['conn'], $story->title);
          $img_url = mysqli_real_escape_string($GLOBALS['conn'], $story->img_url);
          $url = mysqli_real_escape_string($GLOBALS['conn'], $story->url);
          $tags = mysqli_real_escape_string($GLOBALS['conn'], $story->tags);
          $creator_id = mysqli_real_escape_string($GLOBALS['conn'], $story->creator_id);

          $query = "INSERT INTO `news_list`(`author`, `title`, `img_url`, `url`, `tags`, `description`, `creator_id`) 
          VALUES ('$author',
            '$title',
            '$img_url',
            '$url',
            '$tags',
            '$description',
            '$creator_id')";

          $result = $GLOBALS['conn']->query($query);
          // echo("Error description: " . mysqli_error($con));
          echo($query); 
          if($result) {
            $storyID = $GLOBALS['conn']->insert_id;
            $ns = self::loadByID($storyID);
            return $ns;
          } else {
            return null;
          }
        }

        public static function updateStory($story)
        {

          $story->title = mysqli_real_escape_string($GLOBALS['conn'], $story->title);
          $story->img_url = mysqli_real_escape_string($GLOBALS['conn'], $story->img_url);
          $story->description = mysqli_real_escape_string($GLOBALS['conn'], $story->description);
          $story->tags = mysqli_real_escape_string($GLOBALS['conn'], $story->tags);
          $story->url = mysqli_real_escape_string($GLOBALS['conn'], $story->url);

          if(strcmp($story->title, 'empty')!= 0)
          {
            $query = "UPDATE `news_list` SET `title`= '$story->title' WHERE id = '$story->id' ";
            $result = $GLOBALS['conn']->query($query);
          }
            
          if(strcmp($story->img_url, 'empty')!= 0)
          {
            $query = "UPDATE `news_list` SET `img_url`= '$story->img_url' WHERE id = '$story->id' ";
            $result = $GLOBALS['conn']->query($query);
          }
          if(strcmp($story->description, 'empty')!= 0)
          {
            $query = "UPDATE `news_list` SET `description`= '$story->description' WHERE id = '$story->id' ";
            $result = $GLOBALS['conn']->query($query);
          }

          if(strcmp($story->tags, 'empty')!= 0)
          {
            $query = "UPDATE `news_list` SET `tags`= '$story->tags' WHERE id = '$story->id' ";
            $result = $GLOBALS['conn']->query($query);
          }

          if(strcmp($story->url, 'empty')!= 0)
          {
            $query = "UPDATE `news_list` SET `url`= '$story->url' WHERE id = '$story->id' ";
            $result = $GLOBALS['conn']->query($query);
          }

          }

        public static function deleteStory($storyID)
       {
          $delete_query = "DELETE FROM `news_list` WHERE `id` = '$storyID'";
          $result = $GLOBALS['conn']->query($delete_query);
        }

      
}