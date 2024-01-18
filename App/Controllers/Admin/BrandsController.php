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

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name_brand = $this->sanitizerString($_POST['brand_name']);

            if ($name_brand== '' && $_FILES['img_file']['name'] == '') {
                return json_encode($this->message_type(1));
            }


                $data = $this->model->findBybrand($name_brand);

                switch (true) {
                    case is_array($data):
                        if ($data['brand_name'] == $name_brand) {
                            return json_encode($this->message_type(3));
                        }
                        break;

                    case is_bool($data):

                    $img_save = $_FILES['img_file']['name'] == '' ? 'empty' : $this->img_save('Icons/Brands/', $name_brand, $_FILES);

                    $brand_array = [
                        'brand_name' => $name_brand,
                        'img' => $img_save
                    ];

                    if ($this->model->addbrand($brand_array) == 'true') {
                        return json_encode($this->message_type(0));
                    }
                        break;
                }
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
