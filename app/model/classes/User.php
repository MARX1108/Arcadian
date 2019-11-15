<?php

class User {
  public $id;
  public $username;
  public $password;
  public $role;
  public $date_registered;
  public $firstname;
  public $lastname;
  public $email;
  public $class_standing;

  const DB_TABLE = 'user';
  const ROLE = array(
    'regular' => 0,
    'admin' => 1
    );

  public static function loadAllUsers() {

    $users = array();

    $query = "SELECT id FROM ".self::DB_TABLE." ORDER BY date_registered DESC";
    $result = $GLOBALS['conn']->query($query);
    if($result->num_rows) {
      while($row = $result->fetch_assoc()) {
        $u = self::loadByID($row['id']);
        $users[$row['id']] = $u;
      }
    }

    return $users;

  }

  public static function loadByUsername($username) {
    $query = sprintf("SELECT id FROM %s WHERE username = '%s'",
        self::DB_TABLE,
        $GLOBALS['conn']->real_escape_string($username)
        );
    $result = $GLOBALS['conn']->query($query);
    if($result->num_rows) {
      $row = $result->fetch_assoc();
      return self::loadByID($row['id']);
    } else {
      return null;
    }
  }

  public static function loadByID($userID) {
    $query = sprintf("SELECT * FROM %s WHERE id = %d",
        self::DB_TABLE,
        $GLOBALS['conn']->real_escape_string($userID)
        );

    $result = $GLOBALS['conn']->query($query);
    if($result->num_rows) {
      $row = $result->fetch_assoc();
      $u = new User();
      $u->id = $row['id'];
      $u->username = $row['username'];
      $u->password = $row['password'];
      $u->role = $row['role'];
      $u->date_registered = $row['date_registered'];
      $u->firstname = $row['firstname'];
      $u->lastname = $row['lastname'];
      $u->email = $row['email'];
      $u->class_standing = $row['class_standing'];
      return $u;
    } else {
      return null;
    }
  }

  public static function update_Username($id, $newUserName)
  {
    $newUserName = mysqli_real_escape_string($GLOBALS['conn'], $newUserName);
    $query = "UPDATE `user` 
    SET `username`='$newUserName'WHERE id = '$id'";
    $result = $GLOBALS['conn']->query($query);

    $ev = new Event();
    $ev->event_type = Event::EVENT_TYPE['admin_update_username'];
    $ev->user_1_id = $id;
    $ev = Event::insertEvent($ev);
  }

  public static function update_role($id, $role)
  {
    if($role == "1 - site admin") $role = 1;
    elseif ($role == "0 - regular user") $role = 0;
    $query = "UPDATE `user` 
    SET `role`='$role'WHERE id = '$id'";
    $result = $GLOBALS['conn']->query($query);


    $ev = new Event();
    $ev->event_type = Event::EVENT_TYPE['admin_update_role'];
    $ev->user_1_id = $id;
    $ev = Event::insertEvent($ev);

}
    public static function create_new($user)
    {
      $username = $user-> username;
      $password = $user-> password;
      $firstname = $user-> firstname;
      $lastname = $user-> lastname;
      $email = $user-> email;
      $class_standing = $user-> class_standing;

      $query = "INSERT INTO `user`
      (`username`, `password`, `role`, `firstname`, `lastname`, `email`, `class_standing`)
      VALUES(
      '$username',
      '$password',
      1,
      '$firstname',
      '$lastname',
      '$email',
      '$class_standing')";
      //  echo $query;   
      $result = $GLOBALS['conn']->query($query);

      
      return $result;
    }


    public static function update_profile($user)
    {

        $id = $user-> id;
        $password = $user-> password;
        $firstname = $user-> firstname;
        $lastname = $user-> lastname;
        $email = $user-> email;
        $class_standing = $user-> class_standing;

        $query = "UPDATE `user` 
        SET 
        `password`='$password',
        `firstname`='$firstname',
        `lastname`='$lastname',
        `email`='$email',
        `class_standing`='$class_standing' WHERE id = '$id'";
        //  echo $query;   
        $result = $GLOBALS['conn']->query($query);
        return $result;
    }

}
