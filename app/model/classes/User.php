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

}
