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

    public function Search (Request $request)
    {

        $query[0]['Name']='CusCode';
        $query[0]['Value']='-1';
        if (!empty($request->Name))
        {
            $query[0]['Name']='CusName';
            $query[0]['Value']='%'.$request->Name.'%';
            $query[0]['Operation']='like';

        }
        if (!empty($request->Code))
        {
            if(empty($query))
            {
                $size=0;
            }
            else {

                $size = sizeof($query);
            }
            $query[$size]['Name']='CusCode';
            $query[$size]['Value']=$request->Code;
            $query[$size]['Operation']='=';
        } if (!empty($request->Family))
        {
            if(empty($query))
            {
                $size=0;
            }
            else {

                $size = sizeof($query);
            }
            $query[$size]['Name']='CusFamily';
            $query[$size]['Value']='%'.$request->Family.'%';
            $query[$size]['Operation']='like';
        } if (!empty($request->FatherName))
        {
            if(empty($query))
            {
                $size=0;
            }
            else {

                $size = sizeof($query);
            }
            $query[$size]['Name']='CusFatherName';
            $query[$size]['Value']='%'.$request->FatherName.'%';
            $query[$size]['Operation']='like';
        } if (!empty($request->Point))
        {
            if(empty($query))
            {
                $size=0;
            }
            else {

                $size = sizeof($query);
            }
            $query[$size]['Name']='CusPoint';
            $query[$size]['Value']=$request->Point;
            $query[$size]['Operation']='=';
        } if (!empty($request->Status))
        {
            if(empty($query))
            {
                $size=0;
            }
            else {

                $size = sizeof($query);
            }
            $query[$size]['Name']='CusStatus';
            $query[$size]['Value']=$request->Status;
            $query[$size]['Operation']='=';
        }
         if (!empty($request->Kind))
        {
            if(empty($query))
            {
                $size=0;
            }
            else {

                $size = sizeof($query);
            }
            $query[$size]['Name']='CusKind';
            $query[$size]['Value']=$request->Kind;
            $query[$size]['Operation']='=';
        }

            $payKindQuery[0]['Name']='CusPayKind';
            $payKindQuery[0]['Value']=0;
            $payKindQuery[0]['Operation']='=';

        if (!empty($request->Cash))
        {
            $payKindQuery[0]['Value']+=1;
        }if (!empty($request->Check))
        {
            $payKindQuery[0]['Value']+=100;

        }if (!empty($request->Credit))
        {
            $payKindQuery[0]['Value']+=10;
        }

        dd($payKindQuery);

    }
}
