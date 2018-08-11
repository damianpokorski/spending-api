<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Base\UserResourceController;
use App\Label;
use App\User;


class LabelController extends UserResourceController
{
    public function __construct()
    {
        parent::__construct();
        $this->Model = 'App\\Label';
    }
}
