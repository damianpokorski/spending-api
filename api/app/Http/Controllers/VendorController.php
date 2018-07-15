<?php

namespace App\Http\Controllers\Base;

use Illuminate\Http\Request;

use App\Label;
use App\User;

class VendorController extends UserResourceController
{
    public function __construct(){
        parent::__construct();
        $this->Model = 'Vendor';
    }
}
