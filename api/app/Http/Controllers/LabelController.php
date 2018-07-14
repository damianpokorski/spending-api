<?php

namespace App\Http\Controllers;

use App\SpendingType;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // POST - C
    public function post(Request $request){
        $model = Label::create($request->all());
        $model->save();
        return response()->json($model);
    }

    // GET -  R
    public function get($id){
        return response()->json(Label::find($id));
    }

    // Update - U
    public function put(Request $request, $id){
        $model = Label::find($id);
        $model->fill($request->all())->save();
        return response()->json($model);
    }

    // Delete - D
    public function delete($id){
        return response()->json(Label::destroy($id));
    }
}
