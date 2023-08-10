<?php
class Admin extends Database
{
    public function __construct()
    {
        $this->table_name = "admin";
        parent:: __construct();
    }
}