<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{

    public function index()
    {
        // General counts
        $usersCount = User::count();
        $ordersCount = Order::count();

        // Status counts
        $pendingCount = Order::where('status', 'pending')->count();
        $underReviewCount = Order::where('status', 'under_review')->count();
        $acceptedCount = Order::where('status', 'accepted')->count();
        $rejectedCount = Order::where('status', 'rejected')->count();

        // Total received money (sum of accepted prices)
        $totalReceived = Order::where('status', 'accepted')->sum('price');

        // Latest 5 orders
        $latestOrders = Order::with('user')->latest()->take(5)->get();

        return view('dashboard.index', compact(
            'usersCount',
            'ordersCount',
            'pendingCount',
            'underReviewCount',
            'acceptedCount',
            'rejectedCount',
            'totalReceived',
            'latestOrders'
        ));
    }
}
