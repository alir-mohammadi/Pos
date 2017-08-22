<?php

namespace App\Http\Controllers;

use App\Events\Store\Sell\AddEvent;
use Illuminate\Support\Facades\App;
use PDF;
use Illuminate\Http\Request;
use App\Goods;
use Debugbar;

class StoreController extends Controller
{

    public function ReturnGoods ()
    {
        $goods = Goods::select('GoodsId', 'GoodsName', 'GoodsPrice', 'GoodsDiscount', 'GoodsNumber', 'GoodsImage')->get();

        foreach ($goods as $data)
        {
            if (empty($Response))
            {
                $Size = 0;
            }
            else
            {
                $Size = sizeof($Response);
            }
            $Response[ $Size ][ 'Id' ] = $data->GoodsId;
            $Response[ $Size ][ 'Name' ] = $data->GoodsName;
            $Response[ $Size ][ 'Price' ] = $data->GoodsPrice;
            $Response[ $Size ][ 'Discount' ] = $data->GoodsDiscount;
            $Response[ $Size ][ 'Number' ] = $data->GoodsNumber;
            $Response[ $Size ][ 'Image' ] = $data->GoodsImage;
        }

//        $Response['FactorNumber']=
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


        $query[ 0 ][ 'Name' ] = 'NULL';

        if (!empty($request->Name))
        {
            $query[ 0 ][ 'Name' ] = 'GoodsName';
            $query[ 0 ][ 'Value' ] = '%' . $request->Name . '%';
            $query[ 0 ][ 'Operation' ] = 'like';

        }
        if (!empty($request->Code))
        {
            if ($query[ 0 ][ 'Name' ] == 'NULL')
            {
                $size = 0;
            }
            else
            {

                $size = sizeof($query);
            }
            $query[ $size ][ 'Name' ] = "GoodsCode";
            $query[ $size ][ 'Value' ] = $request->Code;
            $query[ $size ][ 'Operation' ] = '=';

        }

        $data = Goods::where(function ($q) use ($query)
        {
            foreach ($query AS $Q)
            {
                $q->where($Q[ 'Name' ], $Q[ 'Operation' ], $Q[ 'Value' ]);
            }
        })->select('GoodsId', 'GoodsCode', 'GoodsName', 'GoodsPrice', 'GoodsImage', 'GoodsNumber', 'GoodsDiscount')->get();
        foreach ($data as $d)
        {
            if (empty($response))
            {
                $size = 0;
            }
            else
            {
                $size = sizeof($response);
            }
            $response[ $size ][ 'Id' ] = $d->GoodsId;
            $response[ $size ][ 'Code' ] = $d->GoodsCode;
            $response[ $size ][ 'Name' ] = $d->GoodsName;
            $response[ $size ][ 'Price' ] = $d->GoodsPrice;
            $response[ $size ][ 'Image' ] = $d->GoodsImage;
            $response[ $size ][ 'Number' ] = $d->GoodsNumber;
            $response[ $size ][ 'Discount' ] = $d->GoodsDiscount;
        }
        if (!empty($response))
        {


            return $response;
        }
        else
        {
            return NULL;
        }


    }

    public function EditJar (Request $request)
    {
        $EditNumber = Goods::Where('GoodsId', '=', $request->EditGoods[ 'Id' ])->value('GoodsNumber');
        Debugbar::info($request->all());
        $number = 0;
        foreach ($request->JarGoods as $jargoods)
        {
            if ($jargoods[ 'Id' ] == $request->EditGoods[ 'Id' ])
            {
                $number = $jargoods[ 'Number' ];
            }
        }
        if ($number >= $request->EditGoods[ 'Number' ])
        {
            $final = $number - $request->EditGoods[ 'Number' ];
            Goods::where('GoodsId', '=', $request->EditGoods[ 'Id' ])->increment('GoodsNumber', $final);
        }
        if ($number < $request->EditGoods[ 'Number' ])
        {
            $final = $request->EditGoods[ 'Number' ] - $number;
            Debugbar::info($final);
            if ($final <= $EditNumber)
            {
                Goods::where('GoodsId', '=', $request->EditGoods[ 'Id' ])->decrement('GoodsNumber', $final);
            }
            else
            {
//                return view("error");
            }
        }
        foreach ($request->JarGoods as $data)
        {
            if (empty($Response))
            {
                $Size = 0;
            }
            else
            {
                $Size = sizeof($Response);
            }

//            $Response[ $Size ][ 'Discount' ] = $data['Discount'];

            if ($data[ 'Id' ] != $request->EditGoods[ 'Id' ])
            {
                $Response[ 'JarGoods' ][ $Size ][ 'Id' ] = $data[ 'Id' ];
                $Response[ 'JarGoods' ][ $Size ][ 'Name' ] = $data[ 'Name' ];
                $Response[ 'JarGoods' ][ $Size ][ 'Price' ] = $data[ 'Price' ];
                $Response[ 'JarGoods' ][ $Size ][ 'Number' ] = $data[ 'Number' ];
            }
            else
            {
                if ($request->EditGoods[ 'Number' ] != 0)
                {
                    $Response[ 'JarGoods' ][ $Size ][ 'Id' ] = $data[ 'Id' ];
                    $Response[ 'JarGoods' ][ $Size ][ 'Name' ] = $data[ 'Name' ];
                    $Response[ 'JarGoods' ][ $Size ][ 'Price' ] = $data[ 'Price' ];
                    $Response[ 'JarGoods' ][ $Size ][ 'Number' ] = $request->EditGoods[ 'Number' ];
                }
            }
//            $Response[ $Size ][ 'Image' ] = $data['Image'];

        }
        $Response[ 'Success' ] = "true";

        return $Response;

    }

    public function DeleteJar (Request $request)
    {
        foreach ($request->JarGoods as $data)
        {
            if (empty($Response))
            {
                $Size = 0;
            }
            else
            {
                $Size = sizeof($Response);
            }
            Debugbar::info($request->DeleteGoods[ 'Id' ]);
            Debugbar::info($request->JarGoods);
            if ($data[ 'Id' ] != $request->DeleteGoods[ 'Id' ])
            {
                $Response[ 'JarGoods' ][ $Size ][ 'Id' ] = $data[ 'Id' ];
                $Response[ 'JarGoods' ][ $Size ][ 'Name' ] = $data[ 'Name' ];
                $Response[ 'JarGoods' ][ $Size ][ 'Price' ] = $data[ 'Price' ];
//                $Response['JarGoods'][ $Size ][ 'Discount' ] = $data['Discount'];
                $Response[ 'JarGoods' ][ $Size ][ 'Number' ] = $data[ 'Number' ];
//                $Response['JarGoods'][ $Size ][ 'Image' ] = $data['Image'];
            }
            if ($data[ 'Id' ] = $request->DeleteGoods[ 'Id' ])
            {
                $number = $data[ 'Number' ];
            }
        }
        $Response[ 'Success' ] = "true";
        Goods::where('GoodsId', '=', $request->DeleteGoods[ 'Id' ])->increment('GoodsNumber', $number);
        if (empty($Response))
        {
            $Response[ 'JarGoods' ] = '';
        }
        else
        {
            return $Response;
        }
    }

    public function MakeBill (Request $request)
    {


        $data = [
            'css'  => $request->css,
            'html' => $request->html,
        ];


        $pdf = PDF::loadView('Jar', $data);

        return $pdf->stream('document.pdf');


    }

    public function PrintBail ()
    {

    }

    public function CustomerScreen ($data)
    {
        session('ExtendScreen', $data);

    }

    public function AddToJar (Request $request)
    {


        Debugbar::info($request->all());
        $this->validate($request, [
            'Barcode'  => 'nullable|max:50|string',
            'Price'    => 'nullable|max:99999999999999999999|integer',
            'Name'     => 'nullable|max:50|string',
            'Number'   => 'nullable|max:99999999999999999999|integer',
            'Discount' => 'nullable|max:100|integer',
        ]);
        if (empty($request->FactorCode))
        {
            $FactorCode=$this->MakeFactor();
        }
        if (!empty($request->NewGoods[ 'Id' ]))//TODO:Add goods buy select
        {

            $final = Goods::where('GoodsId', '=', $request->NewGoods[ 'Id' ])->select( 'GoodsNumber', 'GoodsName', 'GoodsNumber', 'GoodsPrice','GoodsDiscount')->first();
            if (empty($final))
            {
                return $Response[ 'Success' ] = 'False';
            }
            $GoodsId = $request->NewGoods['GoodsId'];
            $GoodsName = $final->GoodsName;
            $GoodsNumber = $final->GoodsNumber;
            $GoodsPrice = $final->GoodsPrice;
            $GoodsDiscount = $final->GoodsDiscount;


        }
        if (!empty($request->NewGoods[ 'Barcode' ]))//TODO:Add goods buy barcode
        {
            $final = Goods::where('GoodsBarcode', '=', $request->NewGoods[ 'Barcode' ])->select('GoodsId', 'GoodsNumber', 'GoodsName', 'GoodsNumber', 'GoodsPrice','GoodsDiscount')->first();
            if (empty($final))
            {
                return $Response[ 'Success' ] = 'False';
            }
            $GoodsId = $final->GoodsId;
            $GoodsName = $final->GoodsName;
            $GoodsNumber = $final->GoodsNumber;
            $GoodsPrice = $final->GoodsPrice;
            $GoodsDiscount = $final->GoodsDiscount;

        }

        if ($GoodsNumber == -1 || $GoodsNumber >= 1)
        {

//            Debugbar::info($request->JarGoods);
            if (!empty($request->JarGoods))
            {

                $data[ 'JarGoods' ] = $request->JarGoods;
//                Debugbar::info($request->JarGoods);
                for ($i = 0; $i < sizeof($data[ 'JarGoods' ]); $i++)//TODO:when goods is available in jar
                {

                    if ($data[ 'JarGoods' ][ $i ][ 'Id' ] == $GoodsId)
                    {
                        $data[ 'JarGoods' ][ $i ][ 'Number' ] += 1;
                        Debugbar::info($data[ 'JarGoods' ][ $i ][ 'Number' ]);
//                        Goods::where('GoodsId', '=', $GoodsId)->decrement('GoodsNumber');
                        $GoodsData['GoodsPrice']=$GoodsPrice;
                        $GoodsData['GoodsNum']=$GoodsNumber;
//                        $GoodsData['GoodsTax']=$GoodsTax;
                        $GoodsData['GoodsDiscount']=$GoodsDiscount;
                        $GoodsData['GoodsId']=$GoodsId;
                        $GoodsData['FactorId']=$request->FactorId;
                        new AddEvent($GoodsData);
                        $data[ 'Success' ] = TRUE;
                        $data[ 'JarGoods' ][ $i ][ 'NewGoods' ] = "";

                        return $data;
                    }
                }
            }
            $data[ 'NewGoods' ][ 'Id' ] = $GoodsId;
            $data[ 'NewGoods' ][ 'Name' ] = $GoodsName;
            $data[ 'NewGoods' ][ 'Price' ] = $GoodsPrice;
            $data[ 'NewGoods' ][ 'Number' ] = 1;
            $data[ 'Success' ] = TRUE;
            Debugbar::info($data);
//            Goods::where('GoodsId', '=', $GoodsId)->decrement('GoodsNumber', $data[ 'NewGoods' ][ 'Number' ]);
            $GoodsData['GoodsPrice']=$GoodsPrice;
            $GoodsData['GoodsNum']=$GoodsNumber;
//            $GoodsData['GoodsTax']=$GoodsTax;
            $GoodsData['GoodsDiscount']=$GoodsDiscount;
            $GoodsData['GoodsId']=$GoodsId;
            $GoodsData['FactorId']=$request->FactorId;
            new AddEvent($GoodsData);
            $data[ 'Success' ] = TRUE;

//            $this->CustomerScreen($data);
            return $data;

        }

        else
        {
            return $data[ 'Success' ] = "false";
        }
    }
}
