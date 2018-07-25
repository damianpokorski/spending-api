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
    public function __construct()
    {
        $Model = 'Expense';
        $this->User = User::FromRequest();
    }

    // POST - C
    public function post(Request $request){
        // Create
        $model = $this->Model::create($request->all());
        // Assign to user
        $model->user_id = $this->User->id;
        $model->save();

        // Output
        return response()->json($model);
    }

    // GET -  R
    public function get($id){
        return $this->Model::find($id);
    }

    public function getAll(){
        $model = ($this->Model);
        $items = $model::where('user_id', $this->User->id)->get();
        return response()->json($items);
    }

    // Update - U
    public function put(Request $request){
        $model = $this->Model::find($request->input('id'));
        $model->fill($request->all())->save();
        return response()->json($model);
    }

    // Delete - D
    public function delete(Request $request){
        return response()->json($this->Model::destroy($request->input('id')));
    }
}
