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

    }

    public function AddShow()
    {
        return view('AddCustom');
    }

    public function CustomerSearch (Request $request )
    {
        $query='';
        $kindquery='';
        if (!empty($request->Name))
        {
            if (!empty($query))
            {
                $query.=',';
            }
               $query.="['CusName','=',$request->Name]";
        } if (!empty($request->Family))
        {
            if (!empty($query))
            {
                $query.=',';
            }
               $query.="['CusFamily','=',$request->Family]";
        } if (!empty($request->Kind))
        {
            if (!empty($query))
            {
                $query.=',';
            }
               $query.="['CusKind','=',$request->Kind]";
        } if (!empty($request->Phone))
        {
            if (!empty($query))
            {
                $query.=',';
            }
               $query.="['CusPhone','=',$request->Phone]";
        } if (!empty($request->Status))
        {
            if (!empty($query))
            {
                $query.=',';
            }
               $query.="['CusStatus','=',$request->Status]";
        } if (!empty($request->FatherName))
        {
            if (!empty($query))
            {
                $query.=',';
            }
               $query.="['CusFatherName','=',$request->FatherName]";
        } if (!empty($request->Point))
        {
            if (!empty($query))
            {
                $query.=',';
            }
               $query.="['CusPoint','=',$request->Point]";
        }if (!empty($request->BDate))
        {
            if (!empty($query))
            {
                $query.=',';
            }
               $query.="['CusName','=',$request->BDate]";
        }if (!empty($request->CellNo))
        {
            if (!empty($query))
            {
                $query.=',';
            }
               $query.="['CusCellNo','=',$request->CellNo]";
        }
        if (!empty($request->Cash))
        {
            if (!empty($kindquery))
            {
                $kindquery.=',';
            }
               $kindquery.="['CusPayKind','=',001]";
        }
        if (!empty($request->Credit))
        {
            if (!empty($kindquery))
            {
                $kindquery.=',';
            }
               $kindquery.="['CusPayKind','=',010]";
        }if (!empty($request->Check))
        {
            if (!empty($kindquery))
            {
                $kindquery.=',';
            }
               $kindquery.="['CusPayKind','=',100]";
        }
        if (!empty($query) && !empty($kindquery)) {
            $data=Custom::where(["$query"])->where(function ($q) use ($kindquery) {
                $q->orWhere(["$kindquery"]);
            })->get();
            return $data;
        }
        if (!empty($query) && empty($kindquery)) {
            $data=Custom::where(["$query"])->get();
            return $data;
        } if (empty($query) && !empty($kindquery)) {
            $data=Custom::orWhere(["$kindquery"])->get();
            return $data;
        }

    }
}
