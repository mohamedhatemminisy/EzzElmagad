<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query();

        if ($request->filled('user_name')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->user_name . '%');
            });
        }
        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by user_id
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Filter by user_email
        if ($request->filled('user_email')) {
            $query->where('user_email', 'like', '%' . $request->user_email . '%');
        }

        // Filter by price range
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $orders = $query->latest()->paginate(PAGINATION_COUNT);

        return view('dashboard.orders.index', compact('orders'));
    }


public function updatePrice(Request $request, Order $order)
{
    $request->validate([
        'price' => 'required|numeric|min:0',
    ]);

    $order->update([
        'price' => $request->price,
        'status' => 'under_review',
    ]);

    // ✅ Send Firebase Notification
    $user = $order->user;

    if ($user && $user->device_token) {
        $this->sendFirebaseNotification(
            $user->device_token,
            'تحديث الطلب',
            'تم تحديث سعر طلبك رقم ' . $order->id . ' إلى ' . number_format($order->price, 2) . ' ريال. حالة الطلب الآن: تحت المراجعة.'
        );
    }

    return redirect()->route('orders.index')->with('success', 'تم تحديث السعر وإرسال إشعار للمستخدم.');
}

}
