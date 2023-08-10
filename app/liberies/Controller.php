<?php

class Controller {
    protected function views($views, $data = false){
        require ("app/views/".$views.".php");
    }
    public function models ($model){
        $model = ucwords($model);
        require_once "app/models/".$model.".php";
        return $model = new $model;
    }
}
?>