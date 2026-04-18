<?php


use Container\Dic;
use Helper\Build\Database;
use Helper\Build\Query;
use Helper\Build\QueryBuilder;
use Router\Router;

require dirname(__DIR__). DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

require dirname(__DIR__). DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'web.php';
require dirname(__DIR__). DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'api.php';
Database::Instance()->run();

Dic::set(Database::class, Database::Instance());
Dic::set(Query::class, new Query());
Dic::set(QueryBuilder::class, new QueryBuilder());

Router::matcher();
