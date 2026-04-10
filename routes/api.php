<?php

use App\controllers\{BoutiqueController, Controller,UserController,MarketController,CategorieController, ProdcutsController};

use Router\Router;
use Service\AuthService;

  Router::get('/api',function(){
    Controller::status(200)->json(['message' => 'home api']);
  });

  Router::get('/api/database',function(){
    $query = new \Helper\Build\Query();
    $query->insert("");
       
  });
  
  Router::get('/api/users',[UserController::class,'index']);
  Router::get('/api/boutiques',[BoutiqueController::class,'index']);
  Router::get('/api/markets',[MarketController::class,'index']);
  Router::get('/api/categories',[CategorieController::class,'index']);
  Router::get('/api/products',[ProdcutsController::class,'index']);

  Router::post('/api/create/market',[MarketController::class,'create']);
  Router::post('/api/create/user',[UserController::class,'create']);
  Router::post('/api/create/boutique',[BoutiqueController::class,'create']);
  Router::post('/api/create/categorie',[CategorieController::class, 'create']);
  Router::post('/api/create/product',[ProdcutsController::class,'create']);
  
  Router::post('/api/login',[AuthService::class,'login']);
  Router::post('/api/register',[AuthService::class,'register']);
?>
