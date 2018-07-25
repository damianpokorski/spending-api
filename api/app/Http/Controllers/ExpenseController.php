<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Base\UserResourceController;
use App\Expense;
use App\User;

class ExpenseController extends UserResourceController
{
    public function __construct(){
        parent::__construct();
        $this->Model = 'App\\Expense';
    }
}
