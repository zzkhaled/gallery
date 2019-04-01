<?php
class Model {
  private static $static_db;
  protected $db; 

  public function __construct() {
    $this->db = self::$static_db;
  }

  public static function init() {
    global $config;
    self::$static_db = new PDO('sqlite:models/database.sqlite'); // instantie une PDO et l'affecté 
                    //à une variable qui va etre utilisé dans les models par exmple gallery_model
                    // car elles extends cette classe
  }

  public function inject_data($data) { return $data; }
}

Model::init();