<?php

namespace App\Http\Controllers;
use App\Custom;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CustomController extends Controller
{
    public function Add(Request $request)
    {
//        return $request;
        $request->CusCode=$request->Code;
        $request->BDate=Carbon::now();
        if($request->Kind==1)   //1 == haghighi
        {
            $this->validate($request, [
                'Code'=>'required',
                'CusCode' => 'unique:customs|max:699|integer',
                'Name'=>'required|max:25|string',
                'Family' => 'required|max:30|string',
                'Phone'=>'nullable|max:11|string',
                'Status'=>'required|boolean',
                'FatherName'=>'nullable|max:25|string',
               // 'BDate'=>'nullable|date',
                'Point'=>'nullable|max:10000000|integer',
                'CellNo'=>'nullable|max:13|string',

            ]);
            $PayKind=0;
            if($request->Cash==1)
                $PayKind+=1;
            if($request->Check==1)
                $PayKind+=10;
            if($request->Credit==1)
                $PayKind+=100;
            $custom = new Custom();
            $custom->CusKind = $request->Kind;
            $custom->CusName = $request->Name;
            $custom->CusFamily = $request->Family;
            $custom->CusPhone = $request->Phone;
            $custom->CusStatus = $request->Status;
            $custom->CusFatherName = $request->FatherName;
            $custom->CusBDate = $request->BDate;
            $custom->CusPoint = (empty($request->Point))?0:$request->Point;
            $custom->CusCellNo = $request->CellNo;
            $custom->CusPayKind = $PayKind;
            $custom->CusCode = $request->Code;
            $custom->save();
        }
        //---------------------------------------------------------------------------------
        if($request->Kind==0)    //0 == hoghoghi
        {
            $this->validate($request, [
                'Code'=>'required',
                'CusCode' => 'unique:customs|max:699|integer',
                'Name'=>'required|max:55|string',
                'Phone'=>'required|max:11|string',
                'Status'=>'required|boolean',
                'Point'=>'nullable|max:100000000|integer',
                'CellNo'=>'nullable|max:13|string',
            ]);
            if(lenght($request->Name)>25)
            {
                $first="";
                $second="";
                for($x=0;$x<lenght($request->Name);$x++)
                {
                   if($x<25)
                    $first.=$request->Name[$x];
                   else
                       $second+=$request->Name[$x];
                }
                $custom->CusName=$first;
                $custom->CusFamily=$second;
            }
            else {
                $custom->CusName = $request->Name;
            }
            $PayKind=0;
            if($request->Cash==1)
                $PayKind+=1;
            if($request->Check==1)
                $PayKind+=10;
            if($request->Credit==1)
                $PayKind+=100;
            $custom = new Custom();
            $custom->CusKind = $request->Kind;
            $custom->CusPhone = $request->Phone;
            $custom->CusStatus = $request->Status;
            $custom->CusPoint = $request->Point;
            $custom->CusPayKind = $PayKind;
            $custom->CusCode = $request->Code;
            $custom->CusCellNo =$request->CellNo;
            $custom->save();
        }
    }

    public function ShowPage()
    {
        return view('customer');
    }
}
