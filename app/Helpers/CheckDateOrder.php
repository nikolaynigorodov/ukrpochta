<?php
namespace App\Helpers;

use App\Models\Order;
use DateTime;

class CheckDateOrder
{
    public function checking()
    {
        $userId = auth()->user()->id;
        $dt = new DateTime();
        $now = $dt->modify('- 24 hour');

        $orders = Order::where('user_id', $userId)->where('created_at', '>=', $now)->first();
        if($orders) {
            $checkTime = \Carbon\Carbon::parse($now);
            $orderTime = \Carbon\Carbon::parse($orders->created_at);
            return gmdate('H:i:s', $checkTime->diffInSeconds($orderTime, false));
        }

        return false;
    }
}
