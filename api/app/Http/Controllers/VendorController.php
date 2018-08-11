<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Base\UserResourceController;
use App\Vendor;
use App\User;

class VendorController extends UserResourceController
{
    public function __construct()
    {
        parent::__construct();
        $this->Model = 'App\\Vendor';
    }
}
