<?php

namespace App\Controllers\Admin;

use App\Models\Admin\UsersModel;

class UsersController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new UsersModel();
    }
    public function users()
    {

        $json_response = $this->model->getUser();


        return $this->views('users',$json_response);
    }

    public function users_add(){
        $json_response = '';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $user_data = [
                'user_name' => $_POST['usr_name'],
                'user_pass' => $_POST['usr_pass']
            ];

            $json_response = $this -> model -> add_user($user_data);

            echo json_encode(true);

        }
    }
}
