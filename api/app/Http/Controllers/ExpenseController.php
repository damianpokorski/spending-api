<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Base\UserResourceController;
use App\Expense;
use App\Label;
use App\User;

class ExpenseController extends UserResourceController
{
    public function __construct(){
        parent::__construct();
        $this->Model = 'App\\Expense';
    }

    public function post(Request $request){
        // Call parent to create object
        parent::post($request);

        // Associate vendor
        $vendor = $request->input('vendor');
        if(!empty($vendor)){
            $vendor = $this->User
                ->vendors()
                ->firstOrCreate(['name' => $vendor]);

            $this->responseContent->vendor()->associate($vendor);
            $this->responseContent->save();
        }

        // Process labels
        foreach($request->input('labels') as $label){
            // Create or find matching label
            $new_label = $this->User
                ->labels()
                ->firstOrCreate(['name' => $label]);

            // Assign it to expense through pivot table
            $this->responseContent
                ->labels()
                ->save($new_label);
        }
        
        // Output object
        return $this->output($this->responseContent);
    }
}
