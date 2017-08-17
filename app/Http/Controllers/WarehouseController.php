<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WarehouseController extends Controller
{
    public function AddGoods(request $request)
    {
        $this->validate($request, [

            'Code'=>'unique:goods|max:999999999999|integer',
            'Name' => 'required|max:50|string',
            'Unit'=>'required|max:100|integer',
            'Part'=>'',
            'Price' => 'required|max:999999999999|integer',
            'Discount'=>'nullable|max:100|integer',
            'VA'=>'nullable|max:100|integer',
            //'PDate'=>'nullable|max:25|string',
            // 'EDate'=>'',
            'Guarantee'=>'nullable|boolean',
            'Number'=>'nullable|max:999999999999|integer',
            'Barcode'=>'nullable|max:30|string',
        ]);
        $goods = new Goods();
        $goods->GoodsCode = $request->Code;
        $goods->GoodsName = $request->Name;
        $goods->GoodsUnit = $request->Unit;
        $goods->GoodsPart = $request->Part;
        $goods->GoodsPrice = $request->Price;
        $goods->GoodsDiscount = $request->Discount;
        $goods->GoodsPDate = $request->PDate;
        $goods->GoodsEDate = $request->EDate;
        $goods->GoodsGuarantee = $request->Guarantee;
        $goods->GoodsNumber= $request->Number;
        $goods->GoodsBarcode = $request->Barcode;
        $goods->save();
    }
}
