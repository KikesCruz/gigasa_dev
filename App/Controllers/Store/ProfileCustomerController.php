<?php

namespace App\Controllers\Store;

use App\Models\Store\StoreModel;

class ProfileCustomerController extends Controller
{

    private $model;
    public function __construct()
    {
        $this->model = new StoreModel();
    }

    public function view()
    {

        return $this->views('profile');
    }
}
