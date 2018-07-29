<?php

namespace App\Http\Controllers\Base;

use Illuminate\Http\Request;

use App\User;

// Responsible for controlling models that belong to the user
class UserResourceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $User = null;
    public $Model = '';
    public $responseContent = null; 
    public function __construct()
    {
        $Model = 'Expense';
        $this->User = User::fromRequest();
    }

    // Just in case I want to access data from inherited class
    public function output($data){
        $this->responseContent = $data;
        return response()->json($data);
    }

    // POST - C
    public function post(Request $request){
        // Create
        $model = $this->Model::create($request->all());

        // Assign to user
        $model->user_id = $this->User->id;
        $model->save();

        // Output
        return $this->output($model);
    }

    // GET -  R
    public function get($id){
        return $this->Model::find($id);
    }

    public function getAll(){
        $model = ($this->Model);
        $items = $model::where('user_id', $this->User->id);

        // Output
        return $this->output($items->get());
    }

    public function search(Request $request){
        $model = ($this->Model);
        $items = $model::where('user_id', $this->User->id);
        foreach($request->all() as $key => $value){
            $items = $items->where($key, $value);
        }

        // Output
        return $this->output($items->get());
    }

    // Update - U
    public function put(Request $request){
        $model = $this->Model::find($request->input('id'));
        $model->fill($request->all())->save();
        
        // Output
        return $this->output($model);
    }

    // Delete - D
    public function delete(Request $request){
        return $this->output($this->Model::destroy($request->input('id')));
    }
}
