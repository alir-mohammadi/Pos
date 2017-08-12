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
        //search seda zade mishe va
        
    }

    public function ShowPage ()
    {
        return view('test');
    }
    public function Search (Request $request)
    {

        if (!empty($request->Name))
        {
            $query[0]['Name']='WoodName';
            $query[0]['Value']=$request->Name;

        }
        if (!empty($request->Code))
        {

            $query[sizeof($query)]['Name']='WoodCode';
            $query[sizeof($query)]['Value']=$request->Code;

        }
        dd(Wood::where(function ($q) use ($query)
        {
            foreach ($query as $Q)
            {
                $q->where($Q['Name'],$Q['Value']);
            }
        })->value());


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
