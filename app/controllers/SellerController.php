<?php 
  namespace App\Controllers;

use App\models\SellerModel;

  class SellerController extends Controller
  {
        public function index(){
            $seller = new SellerModel();
            $seller = $seller->all();
            $this->status(200)->json($seller);
        }
  }
?>