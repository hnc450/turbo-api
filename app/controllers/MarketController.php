<?php 
  namespace App\controllers;

use App\models\MarketModel;

 class MarketController extends Controller {
 
    public function index(){
       $market = new MarketModel();
       self::status(200)->json($market->all());
    }
    
    public function create() {
        $market = new MarketModel();
        $market->name = 'Botour';
        $market->location = 'Kinshasa , en ville';
        $market->save();
        return $this->status(201)->json(['message' => 'Market created successfully']);
    }
    

 }
?>
