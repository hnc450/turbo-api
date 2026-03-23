<?php 
  namespace App\controllers;

use App\models\UserModel;

 class UserController extends Controller {
     public function create()
     {
        // johndoe@gmail.com 12345678 seller
        // arthur@gmail.com 12345678 user
         $user = new UserModel();
         $user->username = 'henock';
         $user->email = 'henock@gmail.com';
         $user->password = password_hash('12345678', PASSWORD_DEFAULT);
         $user->phone = '1234567890';
         $user->role = 'admin';
         $user->save();
         self::status(201)->json(['message' => 'User created successfully']);
     }
   
 }
?>