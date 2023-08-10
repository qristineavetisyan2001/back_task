<?php
session_start();
function set_session($key, $value){
    $_SESSION[$key] = $value;
    if(isset($_SESSION[$key])){
         return true;
    } else{
        return false;
    }
}
function get_session($key){
    if(isset($_SESSION[$key])){
        return $_SESSION[$key];
    } else{
        return null;
    }
}
function del_session($key){
    unset($_SESSION[$key]);
    if(!isset($_SESSION[$key])){
        return true;
    }
    else{
        return false;
    }
}
function file_upload($file,$path){
    $res = [];
    $exp = explode('.',$file['name']);
    $format = end($exp);
    $allowed_types = ['jpg','jpeg','gif','png'];
    if(!in_array($format,$allowed_types)){
        $res['error'] = "ERROR: Invalid format type!";
    }
    else{
        $new_file_name = md5(date('y-m-d H:i:s')).'.'.$format;
        $upload = move_uploaded_file($file['tmp_name'], ROOT.'/public/uploads/'.$path. '/' . $new_file_name);
        if(!$upload){
            $res['error'] = 'Upload failed';
        }
        else{
            $res['success'] = 'post was successful';
            $res['file_name'] = $new_file_name;
        }
    }
    return $res;
}