<?php

class Event {
  public $id;
  public $event_type;
  public $user_1_id;
  public $user_2_id;
  public $story_1_id;
  public $story_2_id;
  public $data_type;
  public $data_2;
  public $data_value;
  const DB_TABLE = 'event';
  const EVENT_TYPE = array(
    'add_story' => 201,
    'delete_story' => 202,
    'edit_story' => 203,
    'edit_profile' => 204,
    'new_users' => 204
    );

  public static function loadAllEvents() {

    $events = array();

    $query = "SELECT id FROM ".self::DB_TABLE." ORDER BY date_created DESC";
    $result = $GLOBALS['conn']->query($query);
    if($result->num_rows) {
      while($row = $result->fetch_assoc()) {
        $ev = self::loadByID($row['id']);
        $events[$row['id']] = $ev;
      }
    }

    return $events;

  }

  public static function loadByID($eventID) {
    $query = sprintf("SELECT * FROM %s WHERE id = %d",
        self::DB_TABLE,
        $GLOBALS['conn']->real_escape_string($eventID)
        );

    $result = $GLOBALS['conn']->query($query);
    if($result->num_rows) {
      $row = $result->fetch_assoc();
      $ev = new Event();
      $ev->id = $row['id'];
      $ev->event_type = $row['event_type'];
      $ev->user_1_id = $row['user_1_id'];
      $ev->user_2_id = $row['user_2_id'];
      $ev->story_1_id = $row['story_1_id'];
      $ev->story_2_id = $row['story_2_id'];
      $ev->data_type = $row['data_type'];
      $ev->data_value = $row['data_value'];
      $ev->date_created = $row['date_created'];
      return $ev;
    } else {
      return null;
    }
  }

  private static function checkIfNull($val) {
    if($val == null) {
      return 'NULL';
    } elseif(is_numeric($val)) {
      return $val;
    } else {
      "'".$val."'";
    }
  }

  public static function insertEvent($event) {
    $query = sprintf("INSERT INTO %s (event_type, user_1_id, user_2_id, story_1_id, story_2_id, data_type, data_value) VALUES (%d, %d, %s, %s, %s, %s, %s) ",
      self::DB_TABLE,
      $GLOBALS['conn']->real_escape_string($event->event_type),
      $GLOBALS['conn']->real_escape_string($event->user_1_id),
      self::checkIfNull($GLOBALS['conn']->real_escape_string($event->user_2_id)),
      self::checkIfNull($GLOBALS['conn']->real_escape_string($event->story_1_id)),
      self::checkIfNull($GLOBALS['conn']->real_escape_string($event->story_2_id)),
      self::checkIfNull($GLOBALS['conn']->real_escape_string($event->data_type)),
      self::checkIfNull($GLOBALS['conn']->real_escape_string($event->data_value))
      );

    // echo $query;
    $result = $GLOBALS['conn']->query($query);
    if($result) {
      $eventID = $GLOBALS['conn']->insert_id;
      $ev = self::loadByID($eventID);
      return $ev;
    } else {
      return $query;
    }
  }

}
