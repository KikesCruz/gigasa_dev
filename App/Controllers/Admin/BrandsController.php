<?php

namespace App\Controllers\Admin;

use App\Models\Admin\BrandsModel;

class BrandsController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new BrandsModel();
    }
    public function view()
    {
        $data = $this->model->getAllBrands();

        return $this->views('brands',$data);
    }

    public function add()
    {

        $res_json = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = $this->sanitizerString($_POST['brand_name']);

            if ($request != '') {

                $data = $this->model->findBybrand($request);

                switch (true) {
                    case is_array($data):
                        if ($data['brand_name'] == $request) {

                            $res_json = 'duplicate';
                        }
                        break;

                    case is_bool($data):
                        $this->model->addbrand($request);
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

        $notifications = array('success','update','empty','error');
        $response_json = '';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $request = $_POST['id_brand'];

            $data = $this -> model -> enablebrand($request);

            if($data == 'true'){
                $response_json = $notifications[1];
            }else{
                $response_json = $notifications[3];
            }

            echo json_encode($response_json);

        }
    }

    public function disable()
    {
        $notifications = array('success','update','empty','error');
        $response_json = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = $_POST['id_brand'];

            $data = $this->model->disablebrand($request);

            if($data == 'true'){
                $response_json = $notifications[1];
            }else{
                $response_json = $notifications[3];
            }

            echo json_encode($response_json);
        }
    }

    public function update(){

        $notifications = array('success','update','empty','error');
        $response_json = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $request = array (
                "id_brand" => $_POST['id_brand'],
                "name_brand" => $this -> sanitizerString($_POST['brand']),
            );

            
            if($request['name_brand'] != ''){
                $data = $this->model->updatebrand($request);

                if($data == 'true'){
                    $response_json = $notifications[1];
                }else{
                    $response_json = $notifications[3];
                }

            }else{
                $response_json = $notifications[2];
            }

            echo json_encode($response_json);
            
        }
    }
}
