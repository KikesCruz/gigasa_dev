<?php

namespace App\Controllers\Admin;

use App\Models\Admin\CategoriesModel;

class CategoriesController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new CategoriesModel();
    }

    
    public function view()
    {

        $categories =  $this->model->getAllCategories();
        $departments = $this->model->getAllDepartments();

        $dataArray = [
            "departments" => $departments,
            "categories" => $categories
        ];



        return $this->views('categories', $dataArray);
    }

    public function add()
    {


        $notifications = array('success', 'update', 'empty', 'error', 'duplicate');


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request_array = [
                "id_depto" => $_POST['depto'],
                "name_category" => $this->sanitizerString($_POST['name_category'])
            ];

            if ($request_array['name_category'] == '') {
                return json_encode($notifications[2]);
            }

            if ($request_array['id_depto'] == 0) {
                return json_encode($notifications[3]);
            }


            $category_find = $this->model->searchCategory($request_array);

            switch (true) {
                case is_array($category_find):
                    if ($category_find['category_name'] == $request_array['name_category']) {
                        return json_encode($notifications[4]);
                    }
                    break;

                case is_bool($category_find):
                    $this->model->new_category($request_array);
                    echo json_encode($notifications[0]);
                    break;
            }
        }
    }

    public function enable()
    {
        $notifications = array('success', 'update', 'empty', 'error', 'duplicate');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $request = $_POST['id_cat'];

            if ($this->model->enable($request)) {
                return json_encode($notifications[0]);
            }
        }
    }

    public function disable()
    {
        $notifications = array('success', 'update', 'empty', 'error', 'duplicate');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $request = $_POST['id_cat'];

            if ($this->model->disable($request)) {
                return json_encode($notifications[0]);
            }
        }
    }

    public function update()
    {
        $notifications = array('success', 'update', 'empty', 'error', 'duplicate');
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $departments = $this->model->getAllDepartments();
          
            return json_encode($departments);

        }else if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $request = [
                'id_category' => $_POST['id_cat'],
                'id_depto' => $_POST['depto'],
                'category_name' => $_POST['cat']
            ];  

            $this -> debug($request);

            $this -> model -> update($request);
        }
    }
}