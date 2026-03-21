<?php 
  namespace App\controllers;

 class UserController extends Controller {
  public function login(){
    $datas = $this->inputs();
    var_dump($datas);
  }

  public function register(){
    $datas = $this->inputs();
    var_dump($datas);
  }
   
 }
?>