<?php

namespace App\Http\Controllers\Base;

use Illuminate\Http\Request;

use App\Expense;
use App\User;

class ExpenseController extends UserResourceController
{
    public function __construct(){
        parent::__construct();
        $this->Model = 'Expense';
    }
}
