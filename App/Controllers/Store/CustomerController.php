<?php

namespace App\Controllers\Store;

use App\Models\Store\StoreModel;

class CustomerController  extends Controller
{

    private $model;
    public function __construct()
    {
        $this->model = new StoreModel();
    }

    public function view()
    {

        return $this->views('customer');
    }
}
