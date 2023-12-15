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
                'user_name' => $this -> sanitizerString($_POST['usr_name']),
                'user_pass' => $this -> sanitizerString($_POST['usr_pass'])
            ];

            $json_response = $this -> model -> add_user($user_data);

            echo json_encode(true);

        }
    }

    public function users_update(){
        $json_response = '';

        $user_data = [
            'id_user' => trim($_POST['usr_id']),
            'user_password' => $this -> sanitizerString($_POST['usr_pass'])
        ];
    

        $response_db = $this -> model ->update_user($user_data);
        echo json_encode($response_db);
    }

    public function users_down()
    {
        $json_response = '';

        $response_db = $this->model->down_user(trim($_POST['usr_id']));
        echo json_encode($response_db);
    }

    public function users_active()
    {
        $json_response = '';

        $response_db = $this->model->active_user(trim($_POST['id_usr']));
        echo json_encode($response_db);
    }
}
