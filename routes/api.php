<?php

use App\controllers\{Controller,UserController};
use Router\Router;

  Router::get('/api',function(){
    Controller::status(200)->json(['message' => 'home api']);
  });

  Router::post('/api/login',[UserController::class,'login']);
  Router::post('/api/register',[UserController::class,'register']);
?>