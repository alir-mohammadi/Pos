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
        $goods= Goods::select('GoodsId','GoodsName','GoodsPrice','GoodsDiscount','GoodsNumber','GoodsImage')->get();
        foreach ($goods as $data)
        {
            if(empty($Response))
            {
                $Size=0;
            }
            else
            $Size=sizeof($Response);
            $Response[$Size]['Id'] = $data->GoodsId;
            $Response[$Size]['Name'] = $data->GoodsName;
            $Response[$Size]['Price'] =$data-> GoodsPrice;
            $Response[$Size]['Discount'] =$data->GoodsDiscount;
            $Response[$Size]['Number'] = $data->GoodsNumber;
            $Response[$Size]['Image'] = $data->GoodsImage;
        }
        return $Response;
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
            $query[0]['Value']=$request->Name;
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
            $query[$size]['Name']='GoodsCode';
            $query[$size]['Name']="GoodsCode";
            $query[$size]['Value']=$request->Code;
            $query[$size]['Operation']='=';

        }

        dd(Goods::where(function ($q) use ($query)
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
    public function EditJar (Request $request)
    {
        $Edit=Goods::Where('GoodsId','=',$request->EditGoods->Id)->select('GoodsNumber')->get();
        $number=0;
        foreach ($request->JarGoods as $jargoods )
        {
            if($jargoods->Id==$request->EditGoods->Id)
            {
                $number=$jargoods->Number;
            }
        }
        if($number>=$request->EditGoods->Number)
        {
            $final = $number-$request->EditGoods->Number;
            Goods::where('GoodsId','=',$request->EditGoods->Id)->increment('GoodsNumber',$final);
        }
        if($number < $request->EditGoods->Number) {
            $final = $request->EditGoods->Number - $number;
            if ($final >= $Edit->Number)
            {
                Goods::where('GoodsId', '=', $request->EditGoods->Id)->descrement('GoodsNumber', $request->EditGoods->Number);
            }
            else
            {
                return view("error");
            }
        }
        foreach ($request->JarGoods as $data)
        {
            if(empty($Response))
            {
                $Size=0;
            }
            else
            {
                $Size = sizeof($Response);
            }
                $Response[$Size]['Id'] = $data->GoodsId;
                $Response[$Size]['Name'] = $data->GoodsName;
                $Response[$Size]['Price'] = $data->GoodsPrice;
                $Response[$Size]['Discount'] = $data->GoodsDiscount;
            if($request->jarGoods->Id != $request->EditGoods->Id)
            {
                $Response[$Size]['Number'] = $data->GoodsNumber;
            }
            else
            {
                $Response[$Size]['Number'] = $request->EditeGoods->Number;
            }
                $Response[$Size]['Image'] = $data->GoodsImage;

        }
        return $Response;

    }
    public function DeleteJar(Request $request)
    {
        Goods::where('GoodsId','=',$request->DeleteGoods->Id)->increment('GoodsNumber',$request->DeleteGoods->GoodsNumber);
        foreach ($request->JarGoods as $data)
        {
                if(empty($Response))
                {
                    $Size=0;
                }
                else
                {
                    $Size = sizeof($Response);
                }
                if($request->jarGoods->Id != $request->DeleteGoods->Id)
                {
                    $Response[$Size]['Id'] = $data->GoodsId;
                    $Response[$Size]['Name'] = $data->GoodsName;
                    $Response[$Size]['Price'] = $data->GoodsPrice;
                    $Response[$Size]['Discount'] = $data->GoodsDiscount;
                    $Response[$Size]['Number'] = $data->GoodsNumber;
                    $Response[$Size]['Image'] = $data->GoodsImage;
                }
        }
        return $Response;
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
    public function AddToJar(Request $request)
    {
        $this->validate($request, [
            'Barcode'=>'nullable|max:50|string',
            'Price' => 'nullable|max:99999999999999999999|integer',
            'Name'=>'nullable|max:50|string',
            'Number'=>'nullable|max:99999999999999999999|integer',
            'Discount'=>'nullable|max:100|integer'
        ]);
        if(!empty($request->NewGoods->Id))//TODO:Add goods buy select
        {
            $GoodsNumber = Goods::where('GoodsId', '=', $request->NewGoods->Id)->value('GoodsNumber');
            $GoodsName=$request->NewGoods->Name;
            $GoodsPrice=$request->NewGood->Price;
            $GoodsId=$request->NewGoods->Id;

        }
        if(!empty($request->NewGoods->Barcode))//TODO:Add goods buy barcode
        {
           $final= Goods::where('GoodsBarcode','=',$request->NewGoods->Barcode)->select('GoodsId','GoodsNumber','GoodsName','GoodsNumber','GoodsPrice')->get();
            $GoodsId=$final->GoodsId;
            $GoodsName=$final->GoodsName;
            $GoodsNumber=$final->GoodsNumber;
            $GoodsPrice=$final->GoodsPrice;
        }
        if ($GoodsNumber==-1 || $GoodsNumber>=1)
        {
            if(!empty($request->JarGoods))
            {
                foreach ($request->JarGoods as $Goods)//TODO:when goods is available in jar
                {
                    if ($Goods->Id == $GoodsId)
                    {
                        $Goods->Number ++;
                        Goods::where('GoodsId','=',$GoodsId)->decrement('GoodsNumber');
                        $request->success=true;
                        $request->NewGoods="";
                        return $request;
                    }
                }
            }
            $data=$request;   //TODO:when Goods is a new Goods
            $data=json_decode($data);
            $size=sizeof($data);
            $data['NewGoods']['Id']=$GoodsId;
            $data['NewGoods']['Name']=$GoodsName;
            $data['NewGoods']['Price']=$GoodsPrice;
            $data['NewGoods']['Number']=1;
            $data['Success']=true;
            Goods::where('GoodsId','=',$GoodsId)->decrement('GoodsNumber',$data[$size]['Number']);
//            $this->CustomerScreen($data);
            return json_encode($data);

        }

        else
        {
            return json_encode($data['Success']=false);
        }
    }
}
