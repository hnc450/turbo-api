<?php 
  namespace App\controllers;

use App\models\UserModel;

 class UserController extends Controller {
     public function create()
     {
        // johndoe@gmail.com 12345678 seller
       // arthur@gmail.com 12345678 user
       // henock@gmail.com 12345678 admin
         $user = new UserModel();
         $user->username = 'arthur';
         $user->email = 'arthur@gmail.com';
         $user->password = password_hash('12345678', PASSWORD_DEFAULT);
         $user->phone = '1234567890';
         $user->role = 'seller';
         $user->save();
         self::status(201)->json(['message' => 'User created successfully']);
     }
     
     public function index(){
         $user = new UserModel();
         self::status(200)->json($user->all());
     }
   
 }
?>
