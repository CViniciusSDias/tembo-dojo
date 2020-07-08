<?php

namespace TemboSocial\Dojo;

class DatabaseObject
{
    protected \PDO $conn;

    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }
}
