<?php

class Loader {

  private $models = [ ];

  public function view($view, $data = []) {
    foreach ($data as $key=>$value) $$key = $value; // parcours le tableau de data et afecte rend 
  //key comme une variable et lui afecte la valeur 
  // exmple dans  Gallery on le tableau e $data=
  // ['title'=>'Liste des albums', 'albums'=>$this->gallery->albums()] DONC
  // $title = 'Liste das albume et $albums = $this->gallery->albums() c'est tableau cotenant les albums
                                   // retourné par gallery model
    include "views/${view}.php";// inclure les views
  }

  public function load($view = null, $data = []) { // inclure les views Footer, heeader et 
    //la view choisie par exemple albums()
    $this->define_helper(); //pour rendre tous les entrée string pour ne pas se confondre avce les cartéres pséciaux de php
    $data = $this->inject_model_data($data); // retourn $data par la méthode inject_data défini dans Model
    $this->view('header', $data);
    if ($view!==null) $this->view($view, $data);
    $this->view('footer', $data);
  }
  
  public function define_helper() {
    function set_value($name) {
      return isset($_POST[$name])?htmlentities($_POST[$name]):'';
    }
  }

  public function add_model($model_name, $model) {
    $this->models [$model_name] = $model;
  }

  private function inject_model_data($data) {
    foreach ( $this->models as $model )
      $data = $model->inject_data ( $data );
    return $data;
  }

}