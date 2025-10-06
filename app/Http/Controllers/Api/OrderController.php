<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Get user by ID
        $user = User::findOrFail($request->user_id);

        // Create order with status pending
        $order = Order::create([
            'user_id' => $user->id,
            'user_email' => $user->email,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Order created successfully',
            'order' => $order,
        ], 201);
    }


    public function userOrders(User $user, Request $request)
    {
        $orders = $user->orders()
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->when($request->filled('date_from'), fn($q) => $q->whereDate('created_at', '>=', $request->date_from))
            ->when($request->filled('date_to'), fn($q) => $q->whereDate('created_at', '<=', $request->date_to))
            ->when($request->filled('min_price'), fn($q) => $q->where('price', '>=', $request->min_price))
            ->when($request->filled('max_price'), fn($q) => $q->where('price', '<=', $request->max_price))
            ->latest()
            ->paginate(10);

        return response()->json([
            'status' => true,
            'message' => 'User orders retrieved successfully',
            'orders' => $orders,
        ]);
    }

    public function orderDetails(User $user, Order $order)
    {
        return response()->json([
            'status' => true,
            'message' => 'User orders retrieved successfully',
            'orders' => $order,
        ]);
    }
    public function updateStatus(Request $request, Order $order)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);

        // Update the order status
        $order->update([
            'status' => $validated['status'],
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Order status updated successfully.',
            'order' => $order
        ]);
    }
}
