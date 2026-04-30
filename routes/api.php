<?php

use App\controllers\{BoutiqueController, Controller,UserController,MarketController,CategorieController, ProdcutsController, SellerController};
use Router\Router;
use Service\AuthService;

Router::get('/', function () {
    Controller::status(200)->json(['message' => 'home api']);
});

Router::get('/api/users', [UserController::class,'index']);
Router::get('/api/sellers',[SellerController::class,'index'],'sellers.route');
Router::get('/api/boutiques', [BoutiqueController::class,'index']);
Router::get('/api/markets', [MarketController::class,'index']);
Router::get('/api/categories', [CategorieController::class,'index']);
Router::get('/api/products', [ProdcutsController::class,'index']);
Router::get('/api/stats',[UserController::class,'stats'],'statisitques.administration');

Router::post('/api/create/market', [MarketController::class,'create']);
Router::post('/api/create/user', [UserController::class,'create']);
Router::post('/api/create/boutique', [BoutiqueController::class,'create']);
Router::post('/api/create/categorie', [CategorieController::class, 'create']);
Router::post('/api/create/product', [ProdcutsController::class,'create']);


Router::delete("/api/delete/[a:uuid]/user", [UserController::class,'delete']);
Router::delete("/api/delete/[a:uuid]/boutique", [BoutiqueController::class,'delete']);
Router::delete("/api/delete/[a:uuid]/market", [MarketController::class,'delete']);
Router::delete("/api/delete/[a:uuid]/category", [CategorieController::class,'delete']);
Router::delete("/api/delete/[a:uuid]/product", [ProdcutsController::class,'delete']);


Router::post('/api/login', [AuthService::class,'login']);
Router::post('/api/register', [AuthService::class,'register']);