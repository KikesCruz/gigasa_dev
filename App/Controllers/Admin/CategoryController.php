<?php

/**
 *  Author : Enrique cruz
 *  functions controller: 
 *    message_type(){
 *       0 -> success,
 *       1 -> duplicate
 *       2 -> empty
 *       3 -> error 
 *     }
 *   
 *    sanitizerString => limpia una cadena
 *     sanitizerInt => limpia numeros
 *   
 */


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
            $route = FILES_IMG . 'Categories/';
            
            $name_category = $this->sanitizerString($_POST['category_name']);
            
            if ($name_category == '') {
                return json_encode($this->message_type(2));
            }
            
            // Validar duplicado
            if ($this->model->search_category($name_category) == $name_category) {
                return json_encode($this->message_type(1));
            }
            
            $categories = [
                "name_category" => $name_category,
                "picture" => "url_empty"
            ];
            
            if ($_FILES['img_category']['name'] != '') {
                $url_img = $this->img_save($route, $name_category, $_FILES['img_category']['type'], $_FILES['img_category']['tmp_name'], $_FILES['img_category']['name']);
                $url_img = explode("Store/", $url_img);
                $categories['picture'] = IMG_URL . $url_img[1];
            }
            
            $notify = $this->model->new_category($categories);
            
            return json_encode($notify == 'success' ? $this->message_type(0) : $this->message_type(3));
          
        }
    }


    public function status_update()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $response = "";

            $category = [
                'id_category' => $_POST['id_category'],
                'status' => $_POST['status_category']
            ];

            $response = $this->model->status_category($category);

            switch ($response) {

                case 1:
                    $response = $this->message_type(0);
                    break;
                case 0:
                    $response = $this->message_type(3);
                    break;
            }


            return json_encode($response);
        }
    }


    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $department = [
                "id_department" => $_POST['id_depto'],
                "department_name" => $this->sanitizerString($_POST['depto']),
                "new_url" => "url_empty"
            ];

            if ($department['department_name'] == '') {
                return json_encode($this->message_type(1));
            }

            $name_depto = $this->model->searchDepartment($department['department_name']);

            if ($name_depto == $department['department_name']) {
                return json_encode($this->message_type(3));
            }

            $img_url = $this->model->searchUrl($department['id_department']);

            if ($img_url['path_img'] == 'url_empty') {
                $this->model->updateDepto($department);
                return json_encode($this->message_type(4));
            }

            $img_old = explode(IMG_URL, $img_url['path_img']);
            $img_old = FILES_IMG . $img_old[1];

            $img_new = explode($img_url['depto_name'] . ".webp", $img_old);

            $img_new = $img_new[0] . $department['department_name'] . ".webp";

            rename($img_old, str_replace(" ", "_", $img_new));

            $img_format = str_replace(FILES_IMG, IMG_URL, $img_new);

            $department['new_url'] = str_replace(" ", "_", $img_format);

            $this->model->updateDepto($department);


            return json_encode($this->message_type(4));
        }
    }



    public function web_status()
    {
        $notify = '';

        $category = [
            "id_category" => $_POST['category_id'],
            "web_status" => $_POST["category_web_status"] == 'on' ? 'off' : 'on',
        ];

        $response = $this->model->web_status($category);


        if ($response == 'success') {
            $notify = $this->message_type(4);
        } else {
            $notify = $this->message_type(2);
        }

        return json_encode($notify);
    }
}
