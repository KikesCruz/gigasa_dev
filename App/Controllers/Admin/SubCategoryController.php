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
 *     sanitizerInt => limpia números
 *   
 */


namespace App\Controllers\Admin;

use App\Models\Admin\SubCategoryModel;

class SubCategoryController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new SubCategoryModel();
    }


    public function view()
    {

        $sub_categories =  $this->model->list_sub_categories();
        $categories = $this->model->list_categories();

        $dataArray = [
            "categories" => $categories,
            "sub_categories" => $sub_categories
        ];



        return $this->views('sub_categoria', $dataArray);
    }

    public function add()
    {


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $notify = '';
            $subcategory = [
                "subcategory_name" => $this->sanitizerString($_POST['name_subcategory']),
                "id_category" => $_POST['category'],
            ];

            if ($subcategory['subcategory_name'] == '') {
                return json_encode($this->message_type(2));
            }

            if ($subcategory['id_category'] == 0) {
                return json_encode($this->message_type(2));
            }


            if ($this->model->search_category($subcategory) == $subcategory['subcategory_name']) {
                return json_encode($this->message_type(1));
            }


            $notify = $this->model->add_sub_category($subcategory);
            

            return json_encode($notify == 'success' ? $this->message_type(0) : $this->message_type(3));
        }
    }

    public function update_status()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $subcategory = [
                'id_subcategory' => $_POST['id_subcategory'],
                'status_subcategory' => $_POST['status_subcategory']
            ];

            $response = $this->model->update_status_subcategory($subcategory);

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

    public function edit()



    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $id_subcategory = $_GET['id_subcategory'];
            
            $categories = $this->model->list_categories();

            $category = $this -> model -> search_category_by_id($id_subcategory);


        }else if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $subcategory = [
                'id_subcategory'=> $_POST['id_subcategory'],
                'subcategory_name'=> $_POST['name_subcategory'],
                'id_category'=> $_POST['category'],
            ];

            if($subcategory['subcategory_name'] == '' ){
                return json_encode($this->message_type(2));
            }


            if($this -> model -> search_category($subcategory) == $subcategory['subcategory_name']){
                return json_encode($this->message_type(1));
            }


            $response = $this->model->edit_subcategory($subcategory);
   
           return json_encode($response == 'success' ? $this->message_type(0) : $this->message_type(3));
        }
    }
}
