<?php


namespace App\Controllers\Admin;

use App\Models\Admin\ProductTypeModel;

class ProductTypeController extends Controller
{
    private $model;

    public function __construct(){
        $this->model = new ProductTypeModel();
    }

    public function view(){

        $items_type = [
            "categories" => $this->model-> get_categories(),
            "productsType" => $this->model->get_productsType()
        ];

        return $this->views('product_type', $items_type);

    }

    public function get_categories($id_category){

       $items_subcategories = $this->model->get_sub_categories($id_category);
       return json_encode($items_subcategories);

    }

    public function add(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $product_type = [

                "name" => $this -> sanitizerString($_POST['item_type_name']),
                "id_subcategory" => $_POST['id_subcategory'],
                "id_category" => $_POST["id_category"]
            ];

            if($product_type['name'] == ''){
                return json_encode($this->message_type(2));
            }

            if($product_type['id_subcategory'] == 0){
                return json_encode($this->message_type(2));
            }

            $sear_result = $this -> model -> search_name_type($product_type);
        

            if($sear_result != 'no_matches'){
                foreach ($sear_result as $value) {
                    if($product_type['name'] == $value['type_name']){
                        return json_encode($this->message_type(1));
                    }
                }
            }

            $notify =  $this -> model -> new_type_product($product_type);
           
            return json_encode($notify == 'success' ? $this->message_type(0) : $this->message_type(3));

        }

    }

    public function update_status(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

          $type_product =[
            "id_type_product" => $_POST['id_type_product'] ,
            "status_type_product" => $_POST['status_type_product']
          ];

          $response = $this->model->update_status_type($type_product);

          switch ($response) {

              case 1:
                  $response = $this->message_type(0);
                  break;
              case 0:
                  $response = $this->message_type(3);
                  break;
          }


          return json_encode($response);


        }
    }
 
  
}