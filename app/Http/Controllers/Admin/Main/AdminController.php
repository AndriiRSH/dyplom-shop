<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __invoke()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $orders = Order::selectRaw('DAYOFWEEK(created_at) as day_of_week, COUNT(*) as total_orders')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->groupBy('day_of_week')
            ->get();

        $ordersData = array_fill(0, 7, 0);

        foreach ($orders as $order) {
            $dayIndex = $order->day_of_week - 1;
            $adjustedIndex = ($dayIndex + 6) % 7;
            $ordersData[$adjustedIndex] = $order->total_orders;
        }

        return view('admin.main.index', compact('ordersData'));
    }

}
