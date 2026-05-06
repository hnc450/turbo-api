<?php 
  return [
    'DB_USER' => $_ENV['DB_USER'] ?? 'root',
    'DB_MDP' => $_ENV['DB_MDP'] ?? '',
    'DB_NAME' => $_ENV['DB_NAME'],
    # exemple : mysql , pgsql
    'DB_SGBD' => $_ENV['DB_SGBD'] ?? 'mysql',

    # exemple host : localhost, localhost:3306 , test.com, https://exemple.com
    'DB_HOST' => $_ENV['DB_HOST'] ?? 'localhost',
  ]
?>
