<?php

use App\controllers\{BoutiqueController, Controller,UserController,MarketController};

use Router\Router;
use Service\AuthService;

  Router::get('/api',function(){
    Controller::status(200)->json(['message' => 'home api']);
  });

  Router::post('/api/create/market',[MarketController::class,'create']);
  Router::post('/api/create/user',[UserController::class,'create']);
  //\ à  implementer prochainement
  // Router::post('/api/create/boutique',[BoutiqueController::class,'create']);
  
  Router::post('/api/login',[AuthService::class,'login']);
  Router::post('/api/register',[AuthService::class,'register']);
?>