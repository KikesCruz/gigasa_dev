<?php

namespace App\Controllers\Admin;

use App\Models\Admin\DepartmentsModel;

class DepartmentsController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new DepartmentsModel();
    }
    public function view()
    {
        $data = $this->model->getDepartments();

        return $this->views('departments', $data);
    }

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $notify = '';
            $route = FILES_IMG.'Departments/';

            
            $department = [
                "name_department" => $this -> sanitizerString($_POST['depto_name']),
                "picture" => "url_empty"
            ];

            if($department['name_department'] == ''){
                return json_encode($this->message_type(1));
            }

            $name_depto = $this -> model -> searchDepartment($department['name_department']);
            
            if($name_depto == $department['name_department']){
                return json_encode($this->message_type(3));
            }

            if($_FILES['img_file']['name'] == ''){
                $notify = $this -> model -> new_department($department);
            }else{
                $url_img = $this->img_save($route, $department['name_department'], $_FILES['img_file']['type'], $_FILES['img_file']['tmp_name']);
                $url_img = explode("Store/", $url_img);
                $department['picture'] = IMG_URL . $url_img[1];

                $notify =   $this->model->new_department($department);  
            }

            if ($notify  == 'success') {
                return json_encode($this->message_type(0));
            } else {
                return json_encode($this->message_type(2));
            }
        

        }
    }

    public function enable()
    {


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = $_POST['id_depto'];

            $data = $this->model->enableDepto($request);

            if ($data == 'true') {
                $response_json = $this -> message_type(4);
            } else {
                $response_json = $this -> message_type(2);
            }

            echo json_encode($response_json);
        }
    }

    public function disable()
    {
 

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = $_POST['id_depto'];

            $data = $this->model->disableDepto($request);

            if ($data == 'true') {
                $response_json = $this -> message_type(4);
            } else {
                $response_json = $this -> message_type(2);
            }

            echo json_encode($response_json);
        }
    }

    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $department = [
                "id_department" => $_POST['id_depto'],
                "department_name" => $this -> sanitizerString($_POST['depto']),
                "new_url" => "url_empty"
            ];

            if($department['department_name'] == ''){
                return json_encode($this->message_type(1));
            }

            $name_depto = $this -> model -> searchDepartment($department['department_name']);
            
            if($name_depto == $department['department_name']){
                return json_encode($this->message_type(3));
            }

            $img_url = $this -> model -> searchUrl($department['id_department']);

            if($img_url['path_img'] == 'url_empty'){
                $this -> model -> updateDepto($department);
                return json_encode($this->message_type(4));
            }

            $img_old = explode(IMG_URL, $img_url['path_img']);
            $img_old = FILES_IMG.$img_old[1];

            $img_new = explode($img_url['depto_name'].".webp",$img_old);

            $img_new = $img_new[0].$department['department_name'].".webp";

            rename($img_old, str_replace(" ","_", $img_new));

            $img_format = str_replace(FILES_IMG,IMG_URL, $img_new);

            $department['new_url'] = str_replace(" ","_",$img_format);

            $this -> model -> updateDepto($department);
                
            
            return json_encode($this->message_type(4));
        }
    }

    public function off_web(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $notify = '';
            
            $response = $this -> model -> off_web($_POST['id_depto']);

            if($response == 'success'){
                $notify = $this -> message_type(0);
            }else{
                $notify = $this -> message_type(2);
            }

            return json_encode($notify);
        }
    }

    public function on_web(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $notify = '';
            
            $response = $this -> model -> on_web($_POST['id_depto']);

            if($response == 'success'){
                $notify = $this -> message_type(0);
            }else{
                $notify = $this -> message_type(2);
            }

            return json_encode($notify);
        }
    }
}
