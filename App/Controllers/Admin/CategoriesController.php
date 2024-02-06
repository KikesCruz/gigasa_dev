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

        $sub_categories =  $this->model->list_sub_categories();
        $categories = $this->model->list_categories();

        $dataArray = [
            "categories" => $categories,
            "sub_categories" => $sub_categories
        ];



        return $this->views('sub_categories', $dataArray);
    }

    public function add()
    {


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $notify = '';
            $route = FILES_IMG . 'Categories/';

            $category = [
                "category" => $this->sanitizerString($_POST['name_category']),
                "id_department" => $_POST['depto'],
                "picture" => 'empty_url'
            ];

            if ($category['category'] == '') {
                return json_encode($this->message_type(1));
            }

            if ($category['id_department'] == 0) {
                return json_encode($this->message_type(2));
            }


            $name_category = $this->model->searchCategory($category);

            if ($name_category == $category['category']) {
                return json_encode($this->message_type(3));
            }

            if ($_FILES['img_file']['name'] == '') {
                $notify = $this->model->new_category($category);
            } else {
                $url_img = $this->img_save($route, $category['category'], $_FILES['img_file']['type'], $_FILES['img_file']['tmp_name']);
                $url_img = explode("Store/",$url_img);
                $category['picture'] = IMG_URL.$url_img[1];

                $notify = $this -> model -> new_category($category);
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
