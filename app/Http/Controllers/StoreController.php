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


        $query[0]['Name']='WoodCode';
        $query[0]['Value']='-1';
        if (!empty($request->Name))
        {
            $query[0]['Name']='WoodName';
            $query[0]['Value']=$request->Name;

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
            $query[$size]['Name']='WoodCode';
            $query[$size]['Value']=$request->Code;

        }

        dd(Wood::where(function ($q) use ($query)
        {
            foreach ($query AS $Q)
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
