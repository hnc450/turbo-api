<?php

namespace Helper\Build;

use Container\Dic;
use Helper\String\Stringy;
use Helper\Build\Database;

class QueryBuilder
{
    private string $facadeRequest;

    public function select(){
        $this->facadeRequest = "SELECT ";
        return $this;
    }

    public function from(string $table)
    {
        $this->facadeRequest = " FROM {$table}";
        return $this;
    }

    public function where(mixed $column, mixed $value)
    {
        $this->facadeRequest .= " WHERE {$column}='{$value}'";
        return $this;
    }

    public function delete(string $table)
    {
        $this->facadeRequest  = "DELETE FROM {$table} ";
        return $this;
    }

    public function run()
    {
        Dic::get(Database::class)->query($this->facadeRequest);

    }

}
