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

        return $this->views('brands', $data);
    }

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $notify = '';
            $route = FILES_IMG . 'Icons/Brands/';

            $brand = [
                "brand" => $this->sanitizerString($_POST['brand_name']),
                "picture" => "url_empty"
            ];

            if ($brand['brand'] == '') {
                return json_encode($this->message_type(1));
            }


            $data = $this->model->searchBrand($brand['brand']);

            if ($data == $brand['brand']) {
                return json_encode($this->message_type(3));
            }

            if ($_FILES['img_brand']['name'] == '') {

                $notify =   $this->model->new_brand($brand);
            } else {

                $url_img = $this->img_product($route, $brand['brand'], $_FILES['img_brand']['type'], $_FILES['img_brand']['tmp_name']);
                $url_img = explode("Store/", $url_img);
                $brand['picture'] = IMG_URL . $url_img[1];

                $notify =   $this->model->new_brand($brand);

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

        $notifications = array('success', 'update', 'empty', 'error');
        $response_json = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = $_POST['id_brand'];

            $data = $this->model->enablebrand($request);

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

            $request = $_POST['id_brand'];

            $data = $this->model->disablebrand($request);

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

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $notify = '';
     
        


            $brand = array(
                "id_brand" => $_POST['id_brand'],
                "name_brand" => $this->sanitizerString($_POST['brand']),
                "new_url" => 'url_empty'
            );

      
            if($brand['name_brand'] == ''){
                return json_encode($this->message_type(1));
            }

            
            $data = $this->model->searchBrand($brand['name_brand']);

            if ($data == $brand['name_brand']) {
                return json_encode($this->message_type(3));
            }

            $img_url = $this -> model -> searchUrl($brand['id_brand']);

            
            
            if($img_url['img_path'] == 'url_empty'){

                $this -> model -> update_brand($brand);

                return json_encode($this->message_type(0));
            }

    


            $img_old_name = explode(IMG_URL, $img_url['img_path']);
            $img_old_name = FILES_IMG.$img_old_name[1];
            
            
            $img_new_name = explode($img_url['brand_name'].".webp",$img_old_name);
            $img_new_name = $img_new_name[0].$brand['name_brand'].".webp";
      
            rename($img_old_name, str_replace(' ','_', $img_new_name));

            $brand['new_url'] = $img_new_name;

            $this -> model -> update_brand($brand);

            return json_encode($this->message_type(0));
      
        }
    }
}
