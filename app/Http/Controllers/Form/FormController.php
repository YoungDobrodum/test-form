<?php

namespace App\Http\Controllers\Form;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FormController extends BaseController
{
    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required | string',
            'surname' => 'required | string',
            'email' => 'required | email',
            'password' => 'required | string',
            'conf_pass' => 'required | same:password',
        ]);
        if($validator->fails()){
            return response()->json(['status' => 400,'message'=> 'Fail try again']);
        }
        if(\session('error')){
            return response()->json(['status' => 400,'message'=> 'This email already exists.']);
        }
        else{
            $this->service->addData($request);
            return response()->json(['status' => 200, 'message' => 'success']);
        }
    }


}
