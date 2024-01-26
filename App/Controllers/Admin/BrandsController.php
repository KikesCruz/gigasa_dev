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

            echo FILES_IMG;
            $this -> debug($_POST);
            $this -> debug($_FILES);
          

            $brand = [
              "brand" => $this-> sanitizerString($_POST['brand_name']),
              "picture" => []
            ];

            if ($brand['brand'] == '' && $_FILES['img_file']['name'] == '') {
                return json_encode($this->message_type(1));
            }


                $data = $this->model->findBybrand($brand['brand']);
                echo is_bool($data);
                print_r($data);
                switch (true) {
                    case is_array($data):
                        if ($data['brand_name'] == $brand['brand']) {
                            return json_encode($this->message_type(3));
                        }
                        break;

                    case is_bool($data):


                    $img_save = $_FILES['img_file']['name'] == '' ? 'empty' :  $this->img_product(FILES_IMG.'Icons/Brands/', $brand['brand'], $_FILES['img_file']['type'],$_FILES['img_file']['tmp_name']);
                    $route_img = explode("Store/",$img_save);

                    $brand['picture'] = IMG_URL.$route_img[1];
                    $this -> debug($brand);

                    /*/if ($this->model->addbrand($brand_array) == 'true') {
                        return json_encode($this->message_type(0));
                    }*/
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
