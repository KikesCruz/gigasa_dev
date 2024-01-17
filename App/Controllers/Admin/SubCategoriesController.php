<?php


namespace App\Controllers\Admin;

use App\Models\Admin\SubCategoriesModel;

class SubCategoriesController extends Controller
{
    private $model;

    public function __construct(){
        $this->model = new SubCategoriesModel();
    }

    public function view(){

        $subcategories = $this->model->getAllSubcategories();
        $departments = $this->model->getAllDepartments();
        $categories =  $this->model->getAllCategories();
    
        $dataArray = [
            "subcategories" => $subcategories,
            "departments" => $departments,
            "categories" => $categories
        ];
        return $this->views('subcategories', $dataArray);

    }

    public function add()
    {

        $notifications = array('success', 'update', 'empty', 'error', 'duplicate');


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request_array = [
                "id_depto" => $_POST['depto'],
                "id_category" => $_POST['id_category'],
                "name_subcategory" => $this->sanitizerString($_POST['name_subcategory'])
            ];

            if ($request_array['name_subcategory'] == '') {
                return json_encode($notifications[2]);
            }

            if ($request_array['id_depto'] == 0  || $request_array['id_category'] === 0) {
                return json_encode($notifications[3]);
            }

            /**VALIDATE **/
            $subcategory_find = $this->model->searchSubCategory($request_array);

            switch (true) {
                /**duplicates */
                case is_array($subcategory_find):
                    if ($subcategory_find['subcategory_name'] == $request_array['name_subcategory']) {
                        return json_encode($notifications[4]);
                    }
                break;
                /**new  */
                case is_bool($subcategory_find):
                    $this->model->new_subcategory($request_array);
                    echo json_encode($notifications[0]);
                    break;
            }
        }
    }

    public function disable($param){
    }

    public function enable($param){
    }    

    public function update($param){
    }    
}