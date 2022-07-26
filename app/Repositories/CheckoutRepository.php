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

        $uid = auth()->user()->id;
        $cdata = new DateTime();
        $checkout = new Checkout;
        $checkout->user_id  = $uid;
        $checkout->book_id  = $request->id;
        $checkout->checkin_date = $cdata;
        $checkout->save();
        return 'done';
    }

    public function returned($request)
    {
        return Checkout::findOrFail($request->id)->delete();
    }

}
