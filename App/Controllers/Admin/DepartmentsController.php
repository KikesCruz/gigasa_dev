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
        $data = $this->model->getAllDepartments();

        return $this->views('departments', $data);
    }

    public function add()
    {

        $res_json = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = $this->sanitizerString($_POST['depto_name']);

            if ($request != '') {

                $data = $this->model->findByDepto($request);

                switch (true) {
                    case is_array($data):
                        if ($data['depto_name'] == $request) {

                            $res_json = 'duplicate';
                        }
                        break;

                    case is_bool($data):
                        $this->model->addDepto($request);
                        $res_json = 'success';
                        break;
                }
            } else {
                $res_json = 'empty';
            }

            echo json_encode($res_json);
        }
    }

    public function enable(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $request = $_POST['id_depto'];

            $data = $this -> model -> enableDepto($request);

        }
    }

    public function disable()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = $_POST['id_depto'];

            $data = $this->model->disableDepto($request);

            if($data == 'true'){
                echo json_encode('actualizado');
            }else{
                echo json_encode('error');
            }
        }
    }

    public function update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = array (
                "id_depto" => $_POST['id_depto'],
                "name_depto" => $this -> sanitizerString($_POST['depto']),
                
            );

            $data = $this->model->updateDepto($request);
        }
    }
}
