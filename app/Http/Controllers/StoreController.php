<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use PDF;
use Illuminate\Http\Request;
use App\Goods;
class StoreController extends Controller
{
    public function ReturnGoods ()
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
        return view('cash');
    }
    public function Search (Request $request)
    {


        $query[0]['Name']='GoodsCode';
        $query[0]['Value']='-1';
        $query[0]['Operation']='=';
        if (!empty($request->Name))
        {
            $query[0]['Name']='GoodsName';
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
            $query[$size]['Name']="GoodsCode";
            $query[$size]['Value']=$request->Code;
            $query[$size]['Operation']='=';

        }

        $data=Goods::where(function ($q) use ($query)
        {
            foreach ($query AS $Q)
            {
                $q->where($Q['Name'],$Q['Operation'],$Q['Value']);
            }
        })->select('GoodsId','GoodsCode','GoodsName','GoodsPrice','GoodsImage','GoodsNumber','GoodsDiscount')->get();
        foreach ($data as $d)
        {
            if (empty($response))
                $size=0;
            else
                $size=sizeof($response);
            $response[$size]['Id']=$d->GoodsId;
            $response[$size]['Code']=$d->GoodsCode;
            $response[$size]['Name']=$d->GoodsName;
            $response[$size]['Price']=$d->GoodsPrice;
            $response[$size]['Image']=$d->GoodsImage;
            $response[$size]['Number']=$d->GoodsNumber;
            $response[$size]['Discount']=$d->GoodsDiscount;
        }
        $response=json_encode($response);
        return $response;



    }
    public function EditJar ()
    {
        
    }
    public function DeleteJar()
    {
        
    }

    public function MakeBill (Request $request)
    {


        $data = [
            'css' => $request->css,
            'html'=>$request->html
        ];


        $pdf = PDF::loadView('Jar',$data);
        return $pdf->stream('document.pdf');



    }

    public function PrintBail ()
    {
        
    }

    public function CustomerScreen ()
    {
        
    }
}
