<?php

namespace App\Http\Controllers;

use App\SpendingRegular;
use Illuminate\Http\Request;

class SpendingRegularController extends Controller
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
        $model = SpendingRegular::create($request->all());
        $model->save();
        return response()->json($model);
    }

    // GET -  R
    public function get($id){
        return response()->json(SpendingRegular::find($id));
    }

    // Update - U
    public function put(Request $request, $id){
        $model = SpendingRegular::find($id);
        $model->fill($request->all())->save();
        return response()->json($model);
    }

    // Delete - D
    public function delete($id){
        return response()->json(SpendingRegular::destroy($id));
    }
}
