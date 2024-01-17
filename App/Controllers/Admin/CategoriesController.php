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


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name_category = $this->sanitizerString($_POST['name_category']);
            $id_depto = $this->sanitizerInt($_POST['depto']);

            if ($name_category == '' || $id_depto == 0) {
                return json_encode($this->message_type(1));
            }

            $search = $this -> $this -> model -> searchCategory($name_category);

            switch(true){
                case is_array($search):

                    if($search['category_name'] == $name_category){
                        return json_encode($this -> message_type(3));
                    }

                break;

                case is_bool($search):

                $img_save = $_FILES['img_file']['name'] == '' ? 'empty' : $this->img_save('Categories/', $name_category, $_FILES);
                
                $depto_array = [
                    'category_name' => $name_category,
                    'depto_id' => $id_depto,
                    'img' => $img_save
                ];

                if ($this->model->new_category($depto_array) == 'true') {
                    return json_encode($this->message_type(0));
                }

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
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $departments = $this->model->getAllDepartments();

            return json_encode($departments);
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = [
                'id_category' => $_POST['id_cat'],
                'id_depto' => $_POST['depto'],
                'category_name' => $_POST['cat']
            ];

            $this->debug($request);

            $this->model->update($request);
        }
    }
}
