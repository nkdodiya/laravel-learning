<?php

namespace App\Repositories;

use App\Checkout;
use App\Repositories\Interfaces\CheckoutRepositoryInterface;
use Auth;
use \Datetime;
class CheckoutRepository  implements CheckoutRepositoryInterface
{

    public function giveissue($request)
    {
        return Checkout::create($request->all());
    }

    public function returned($request)
    {
        return Checkout::where('id',$request->id)->delete();
    }

}
