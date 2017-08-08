<?php

namespace App\Http\Controllers;
use App\Custom;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function Add(Request $request)
    {
        $custom=new Custom();
        $custom->CusKind=$request->cusKind;
        $custom->CusName=$request->cusName;
        $custom->CusFamily=$request->cusFamily;
        $custom->CusPhone=$request->cusPhone;
        $custom->CusStatus=$request->cusStatus;
        $custom->CusFatherName=$request->cusFatherName;
        $custom->CusBDate=$request->cusBDate;
        $custom->CusPoint=$request->cusPoint;
        $custom->CusCellNo=$request->cusCellNo;
        $custom->CusPayKind=$request->cusPayKind;
        $custom->save();
        return "--1--";
    }

    public function AddShow()
    {
        return view('AddCustom');
    }
}
