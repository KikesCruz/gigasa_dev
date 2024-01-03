<?php

namespace App\Controllers\Ecommer;

use App\Models\Ecommer\EcommerModel;

class CustomerController  extends Controller
{

    private $model;
    public function __construct()
    {
        $this->model = new EcommerModel();
    }

    public function view()
    {

        return $this->views('customer');
    }
}
