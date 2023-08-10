<?php

header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Headers: Content-Type, AUTHORIZATION');
header('Access-Control-Allow-Credentials: true'); // If needed
class AdminController extends Controller {
    public function index(){
        $this->views("admin/index");
    }
    public function login(){
        $data = json_decode(file_get_contents("php://input"), TRUE);
        $name = $data['name'];
        $pass = $data['pass'];

        $res["error_mes"] = "";
        $res["empty_fields"] = [];

        if(count($res["empty_fields"]) > 0){
            $res["error_mes"] = "please fill in all fields";
        } else{
            $num = $this-> models('admin')->select()->where('user_name', '=' , $name)->where('pass', '=' , $pass)-> execute()->num_rows();
            if($num == 0){
                $res["error_mes"] = "Incorrect username or password";
            } else
            {
                if(set_session('admin', 'Admin')){
                    $res["url"] = 'http://localhost:8080/admin/dashboard';
                    $res["success_mes"] = 'You are logged in';
                }
                else{
                    $res["error_mes"] = "Oooops Something went wrong";
                }
            }
        }
        echo json_encode($res);
    }

    public function dashboard(){
        $titleEng = $_POST['titleEng'];
        $titleArm = $_POST['titleArm'];
        $textEng = $_POST['textEng'];
        $textArm = $_POST['textArm'];
        $image = $_FILES['image'];

      /*  if(isset($_POST['submit'])){
            $image = $_FILES['image']['name'];
            if(empty($image)){
                set_session('error','<div class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>');
            }*/
           /* else{*/
                $upload = file_upload($_FILES['image'],'homeslider');
                if(array_key_exists("success",$upload)){
                    $_POST['image'] = $upload['file_name'];

                }

       /* $insert = */$this->models('homeslider')->insert($_POST)->execute();
       /* if($insert){
            $response = ['message' => $_POST];
        }*/

        $data = $this-> models('homeslider')->select()-> execute()->fetchAll();
        echo json_encode($data);
    }

    public function getPost(){
        $data = $this-> models('homeslider')->select()-> execute()->fetchAll();
        foreach ($data as &$item) {
            $item['image'] = URL_ROOT . '/public/uploads/homeslider/' . $item['image'];
        }
        unset($item);
        /*$data[0]['image'] =  URL_ROOT.'/public/uploads/homeslider/'.$data[0]['image'];*/
        echo json_encode($data);
    }
        /*}*/

        /*$this -> views('admin/dashboard',$data);*/
   /* }*/
}
?>