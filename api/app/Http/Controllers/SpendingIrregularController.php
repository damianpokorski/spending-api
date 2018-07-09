<?php

namespace App\Http\Controllers;

use App\SpendingIregular;
use Illuminate\Http\Request;

class SpendingIrregularController extends Controller
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
        $model = SpendingIregular::create($request->all());
        $model->save();
        return response()->json($model);
    }

    // GET -  R
    public function get($id){
        return response()->json(SpendingIregular::find($id));
    }

    // Update - U
    public function put(Request $request, $id){
        $model = SpendingIregular::find($id);
        $model->fill($request->all())->save();
        return response()->json($model);
    }

    // Delete - D
    public function delete($id){
        return response()->json(SpendingIregular::destroy($id));
    }
}
