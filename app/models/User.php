<?php
class User extends Database
{
    public function __construct()
    {
        $this->table_name = "user";
        parent:: __construct();
    }
}