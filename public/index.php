<?php


use Container\Dic;
use Helper\Build\Database;
use Helper\Build\Query;
use Helper\Build\QueryBuilder;
use Router\Router;

require dirname(__DIR__). DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER'])->notEmpty();
require dirname(__DIR__). DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'web.php';
require dirname(__DIR__). DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'api.php';
Database::Instance()->run();

Dic::set(Database::class, Database::Instance());
Dic::set(Query::class, new Query());
Dic::set(QueryBuilder::class, new QueryBuilder());

Router::matcher();
