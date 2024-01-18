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

            $name_depto = $this->sanitizerString($_POST['depto_name']);

            if ($name_depto == '' && $_FILES['img_file']['name'] == '') {
                return json_encode($this->message_type(1));
            }
        
            $search = $this->model->findByDepto($name_depto);

            switch (true) {
                case is_array($search):
                    if ($search['depto_name'] == $name_depto) {
                        return json_encode($this->message_type(3));
                    }
                    break;

                case is_bool($search):

                    $img_save = $_FILES['img_file']['name'] == '' ? 'empty' : $this->img_save('Departments/', $name_depto, $_FILES);

                    $depto_array = [
                        'depto_name' => $name_depto,
                        'img' => $img_save
                    ];

                    if ($this->model->addDepto($depto_array) == 'true') {
                        return json_encode($this->message_type(0));
                    }

                    break;
            }
        }
    }

    public function enable()
    {

        $notifications = array('success', 'update', 'empty', 'error');
        $response_json = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = $_POST['id_depto'];

            $data = $this->model->enableDepto($request);

            if ($data == 'true') {
                $response_json = $notifications[1];
            } else {
                $response_json = $notifications[3];
            }

            echo json_encode($response_json);
        }
    }

    public function disable()
    {
        $notifications = array('success', 'update', 'empty', 'error');
        $response_json = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = $_POST['id_depto'];

            $data = $this->model->disableDepto($request);

            if ($data == 'true') {
                $response_json = $notifications[1];
            } else {
                $response_json = $notifications[3];
            }

            echo json_encode($response_json);
        }
    }

    public function update()
    {

        $notifications = array('success', 'update', 'empty', 'error');
        $response_json = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $request = array(
                "id_depto" => $_POST['id_depto'],
                "name_depto" => $this->sanitizerString($_POST['depto']),

            );


            if ($request['name_depto'] != '') {
                $data = $this->model->updateDepto($request);

                if ($data == 'true') {
                    $response_json = $notifications[1];
                } else {
                    $response_json = $notifications[3];
                }
            } else {
                $response_json = $notifications[2];
            }

            echo json_encode($response_json);
        }
    }
}
