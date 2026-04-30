<?php
 namespace Router;

 use App\App;

   class Router
   {

       public static function get(string $route, mixed $target, string $name = '')
       {
          App::getInstanceRouter()->map('GET',$route,$target,$name);
       }

       public static function post(string $route, mixed   $target, string $name = '')
       {
        App::getInstanceRouter()->map('POST',$route,$target,$name);
       }

       public static function delete(string $route, mixed $target, string $name = '')
       {
        App::getInstanceRouter()->map('DELETE',$route,$target,$name);
       }

       public static function put(string $route, mixed $target, string $name = '')
       {
        App::getInstanceRouter()->map('PUT',$route,$target,$name);
       }
       
       public function origin(string $path)
       {
        App::getInstanceRouter()->setBasePath($path);
       }

       public static function matcher()
       {
          $match = App::getInstanceRouter()->match();
   
          if($match && is_callable($match['target']))
            {
            call_user_func($match['target'],$match['params']);
          }

          elseif(is_array($match) && is_array($match['target']))
          {
            $controller = $match['target'][0];
            $method = $match['target'][1];
            $controller = new $controller();
            $controller->$method($match['params']);
          }

          else
          {
             self::respondNotFound();
          }
       }

       private static function respondNotFound()
       {
           http_response_code(404);
           echo json_encode([
               'status' => 404,
               'message' => 'Route introuvable'
           ]);
       }

   }
?>