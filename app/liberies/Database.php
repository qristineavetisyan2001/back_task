<?php
class Database
{
    protected $table_name;
    private $conn;
    private $str_query;
    private $str_q;

    private $query;
    public function __construct()
    {
        $this->conn =new mysqli(DB_HOST, DB_NAME, DB_PASS, DB_USER);
    }
    public function select()
    {
        $this->str_query = "SELECT * FROM ".$this->table_name;
        return $this;
    }
    public function delete()
    {
        $this->str_query = "DELETE FROM ".$this->table_name;
        return $this;
    }
    public function update($fild_name, $op, $value)
    {
        $this->str_query = "UPDATE".$this->table_name." SET".$fild_name . $op ."'". $value."'";;
        return $this;
    }
    public function update_array($data)
    {
        foreach($data as $key => $value){
            $this->str_q .= $key .' = '."'".$value."', ";
        }
        $this->str_query = 'UPDATE '.$this->table_name.' SET '.substr($this->str_q, 0, -2);
        return  $this;
    }
    public function where($fild, $op ,$val)
    {
        if (strpos($this->str_query,"WHERE") == false){
            $this->str_query .= " WHERE ".$fild.$op."'".$val."'";
        }
        else
        {
            $this->str_query .= " AND ".$fild.$op."'".$val."'";
        }
        return $this;
    }
    public function where_in($fild, $value){
        $this->str_query .= " WHERE ".$fild." IN"."(".$value.")";
        return $this;
    }
    public function fetchRow(){
        return $this->str_query = mysqli_fetch_assoc($this->query);
    }

    public function mysqli_fetch_assoc(){
        $this->str_query = mysqli_fetch_assoc($this->query);
        return $this;
    }

    public function fetchAll(){
        if(!is_bool($this->query) && mysqli_num_rows($this->query) > 0){
            $res = [];
            while($row = mysqli_fetch_assoc($this->query))
            {
                $res[] = $row;
            }
            return $res;
        }
        return false;
    }
    public function execute(){
        $this->query = mysqli_query($this->conn,$this->str_query);
        return $this;
    }
    public function num_rows(){
        $num = mysqli_num_rows($this->query);
        return $num;
    }

    public function insert($postData){
        unset($postData['submit']);
        $key_array = [];
        $value_array = [];
        foreach ($postData as $key => $value) {
            array_push($key_array,$key);
            array_push($value_array,"'".$value."'");
        }
        $columns = implode(', ', $key_array);
        $placeholders = implode(', ', $value_array);
        $this->str_query = "INSERT INTO " . $this->table_name . " ($columns) VALUES ($placeholders)";
        return $this;
    }
}