<?php

namespace App\Listeners\Store\Sell;

use App\Events\Store\Sell\AddEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\TempFacGoods;
use App\TempFactors;
class AddEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Handle the event.
     *
     * @param  AddEvent  $event
     * @return void
     */
    public function handle(AddEvent $event)
    {
        $good=new TempFacGoods();
        $good->TempFacGoodsPrice=$event->GoodsData['GoodsPrice'];
        $good->TempFacGoodsDiscount=$event->GoodsData['GoodsDiscount'];
        $good->TempFacGoodsTax=$event->GoodsData['GoodsTax'];
        $good->TempFacGoodsNum=$event->GoodsData['GoodsNum'];
        $good->TempFacGoodsId=$event->GoodsData['GoodsId'];
        TempFactors::where('TempFactorsCode',$event->GoodsData['Code'])->TempGoods()->save($good);
    }
}
