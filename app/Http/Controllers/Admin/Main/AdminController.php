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

        $ordersData = [];
        foreach ($orders as $order) {
            $ordersData[] = $order->total_orders;
        }

        return view('admin.main.index', compact('ordersData'));
    }
}
