<?php

use App\controllers\{BoutiqueController, Controller,UserController,MarketController};

use Router\Router;
use Service\AuthService;

  Router::get('/api',function(){
    Controller::status(200)->json(['message' => 'home api']);
  });

  Router::get('/api/database',function(){
    $query = new \Helper\Build\Query();
    $query->insert("

CREATE TABLE `favorites`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `uuid` varchar(10) NOT NULL UNIQUE,
    `user_id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `rating` int(1) NOT NULL,
    
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE
);
    ");
       
  });

  Router::post('/api/create/market',[MarketController::class,'create']);
  Router::post('/api/create/user',[UserController::class,'create']);
  //\ à  implementer prochainement
  // Router::post('/api/create/boutique',[BoutiqueController::class,'create']);
  
  Router::post('/api/login',[AuthService::class,'login']);
  Router::post('/api/register',[AuthService::class,'register']);
?>
