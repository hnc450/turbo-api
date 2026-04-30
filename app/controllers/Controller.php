<?php

namespace App\controllers;

use Container\Dic;
use Helper\Build\Query;

class Controller
{
    private static $controller;

    private static function instance(): self
    {
        if (is_null(self::$controller)) {
            self::$controller = new self();
        }
        return self::$controller;
    }

    protected function sanitaze(string $input): string
    {
        return strip_tags(htmlspecialchars($input));
    }

    public static function status(int $status)
    {
        \http_response_code($status);
        return self::instance();
    }

    public static function json(array $array)
    {
        header("Content-Type:application/json");
        echo json_encode($array, JSON_PRETTY_PRINT);
    }

    public function inputs()
    {
        $datas = \json_decode(\file_get_contents('php://input')) ?? [];
        return $datas;
    }

    public function create()
    {
    }
    public function delete($uuid)
    {
    }
    public function index()
    {
    }
    public function update()
    {
    }
    
    public function get(string $table, mixed $column,  mixed $value)
    {
        $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
        $column = preg_replace('/[^a-zA-Z0-9_]/', '', $column);

        return Dic::get(Query::class)->fetch("SELECT * FROM {$table} WHERE {$column} = :val", [
            ':val' => $value
        ]);
    }
}
