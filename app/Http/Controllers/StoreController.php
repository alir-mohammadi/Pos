<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wood;
class StoreController extends Controller
{
    public function ReturnWood ()
    {
        
    }

    public function Pay ()
    {
        
    }

    public function AddCustomer ()
    {
        //search seda 
        
    }

    public function ShowPage ()
    {
        return view('test');
    }
    public function Search (Request $request)
    {
        $query='';
        if (!empty($request->Name))
        {
            $query.="['WoodName','=',$request->Name]";
        }
        if (!empty($request->Code))
        {
            if (!empty($query))
                $query.=',';
            $query.="['WoodCode','=',$request->Code]";
        }
        dd(Wood::where(["$query"])->get);


    }
    public function EditJar ()
    {
        
    }
    public function DeleteJar()
    {
        
    }

    public function MakeBill ()
    {
        
    }

    public function PrintBail ()
    {
        
    }

    public function CustomerScreen ()
    {
        
    }
}
