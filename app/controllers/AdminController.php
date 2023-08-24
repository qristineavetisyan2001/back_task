<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Authorization, Content-Type');
header('Access-Control-Allow-Credentials: true');


// Set appropriate CORS headers for the 'saveChanges' endpoint


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

    public function deletePost(){
        $data = json_decode(file_get_contents("php://input"), TRUE);
        $path = "public/uploads/homeslider";
        $datas = $this->models('homeslider')->select()->where('id', '=' , $data)->execute()->fetchRow();
            $imageFilename = $datas['image'];
            $fullImagePath = $path . '/' . $imageFilename;

            if (file_exists($fullImagePath)) {
                if (unlink($fullImagePath)) {
                    $delete = $this->models('homeslider')->delete()->where('id','=' , $data)->execute();
                    if ($delete) {
                        echo json_encode(array("status" => "success", "message" => "Post deleted successfully"));
                    } else {
                        echo json_encode(array("status" => "error", "message" => "Error deleting post from database"));
                    }
                } else {
                    echo json_encode(array("status" => "error", "message" => "Error unlinking file"));
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "File not found"));
            }

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
        /*var_dump($data);exit;*/
        echo json_encode($data);
    }
    public function get(){
        $data = json_decode(file_get_contents("php://input"), TRUE);
        $data = $this->models('homeslider')->select()->where('id', '=' , $data)->execute()->fetchRow();
        $data['image'] =  URL_ROOT.'/public/uploads/homeslider/'.$data['image'];
        //var_dump( $data['image']);
        echo json_encode($data);
    }
    public function saveChanges(){
        $postId = $_POST['id'];
        unset($_POST['id']);
        $_POST['image'] = $_FILES['image'];
        if($_POST['image'] != ''){
            $edit_data = $this-> models('homeslider')->select()->where('id', '=' , $postId)-> execute()->fetchRow();
            $path = "public/uploads/homeslider";
            $imageFilename = $edit_data['image'];
            $fullImagePath = $path . '/' . $imageFilename;
            if (file_exists($fullImagePath)) {
                unlink($fullImagePath);
                $upload = file_upload($_POST['image'],'homeslider');
                if(array_key_exists("success",$upload)){
                    $_POST['image'] = $upload['file_name'];
                }
            }
        }

        $update = $this-> models('homeslider')->update_array($_POST)->where('id', '=' , $postId)->execute();
        echo json_encode($update);
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