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

            $category = [
                "id_category" => $_POST['id_category'],
                "category_name" => $this->sanitizerString($_POST['category_name']),
                "url_img" => "url_empty"
            ];

            if ($category['category_name'] == '') {
                return json_encode($this->message_type(2));
            }

            $name_depto = $this->model->search_category($category['category_name']);

            if ($name_depto == $category['category_name']) {
                return json_encode($this->message_type(1));
            }

            $img_url = $this->model->search_img($category['id_category']);

            

            if ($img_url['img_path'] == 'url_empty') {
                $this->model->update_category($category);
                return json_encode($this->message_type(0));
            }

            $img_old = explode(IMG_URL, $img_url['img_path']);
            $img_old = FILES_IMG . $img_old[1];

            $img_new = explode($img_url['name_category'] . ".svg", $img_old);

            $img_new = $img_new[0] . $category['category_name'] . ".svg";

            rename($img_old, str_replace(" ", "_", $img_new));

            $img_format = str_replace(FILES_IMG, IMG_URL, $img_new);

            $category['url_img'] = str_replace(" ", "_", $img_format);

            $this -> model -> update_category($category);


            return json_encode($this->message_type(0));
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
            $notify = $this->message_type(0);
        } else {
            $notify = $this->message_type(3);
        }

        return json_encode($notify);
    }

    public function update_img(){
    
        if($_SERVER['REQUEST_METHOD'] == 'GET'){

           

            $picture = $_GET['id_category'];

            $response = $this->model->getImg($picture);

          return json_encode($response);

        }else if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $route = FILES_IMG.'Categories/';
            $notify='';
            
            $category = [
                "id_category" => $_POST['id_category'],
                "picture" => ""
            ];
            
            if($_FILES['img_category_new']['name'] != ''){

                $name_category = $this->model->search_category_by_id($category['id_category']);
                
                $url_img = $this -> img_save($route,$name_category, $_FILES['img_category_new']['type'], $_FILES['img_category_new']['tmp_name'],$_FILES['img_category_new']['name']);
                $url_img = explode('Store/',$url_img);
                $category['picture'] = IMG_URL . $url_img[1]; 
                
            }


            $notify = $this ->model -> update_img_category($category);


            return json_encode($notify == 'success' ? $this->message_type(0) : $this->message_type(3));




        }

    }
}
