<?php
class Controller {
  protected $loader;
  
  public function __construct() { // instantie le Loder (view ) et les models (BD)
    $this->loader = new Loader();
    $this->init_models();
  }
  
  private function init_models() { // 
    global $config;
    foreach ($config['models'] as $model) {
      $this->init_model($model);
    }
  }
  
  private function init_model($model) { // includ les models dans models et instancie les classes

    $class = $model.'_model';
    require "models/$class.php"; // includ les models dans models
    $variable = strtolower($model);
    $this->$variable = new $class(); //instancie les classes
    $this->loader->add_model($variable, $this->$variable); // ajouter le model dans le tbaleau des models 
                                                          // de la class Loder par la méthde add_model
  }
}