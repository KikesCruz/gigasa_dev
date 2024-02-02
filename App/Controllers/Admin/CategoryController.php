<?php

namespace App\Controllers\Admin;

use App\Models\Admin\CategoryModel;

class CategoryController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new CategoryModel();
    }
    public function view()
    {
        $data = $this->model->getCategories();

        return $this->views('categories', $data);
    }

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $notify = '';
            $route = FILES_IMG.'Categories/';

            
            $categories = [
                "name_category" => $this -> sanitizerString($_POST['category_name']),
                "picture" => "url_empty"
            ];

            if($categories['name_category'] == ''){
                return json_encode($this->message_type(1));
            }

            $name_category = $this -> model -> search_category($categories['name_category']);
            
            if($name_category == $categories['name_category']){
                return json_encode($this->message_type(3));
            }

            if($_FILES['img_category']['name'] == ''){
                $notify = $this -> model -> new_category($categories);
            }else{
                $url_img = $this->img_save($route, $categories['name_category'], $_FILES['img_category']['type'], $_FILES['img_category']['tmp_name']);
                $url_img = explode("Store/", $url_img);
                $categories['picture'] = IMG_URL . $url_img[1];

                $notify =   $this->model->new_category($categories);  
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



    public function web_status(){
        $notify = '';
        
        $category =[
            "id_category" => $_POST['category_id'],
            "web_status" => $_POST["category_web_status"] == 'on' ? 'off':'on',
        ];

        $response = $this -> model -> web_status($category);

        
        if($response == 'success'){
            $notify = $this -> message_type(4);
        }else{
            $notify = $this -> message_type(2);
        }

        return json_encode($notify);

    }

  
}
