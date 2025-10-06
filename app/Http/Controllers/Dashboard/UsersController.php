<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query()->where('role', 'user');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('address')) {
            $query->where('adress', 'like', '%' . $request->address . '%');
        }

        if ($request->filled('company_category')) {
            $query->where('company_category', 'like', '%' . $request->company_category . '%');
        }

        if ($request->filled('commercial_number')) {
            $query->where('commercial_number', 'like', '%' . $request->commercial_number . '%');
        }

        if ($request->filled('representer')) {
            $query->where('representer', 'like', '%' . $request->representer . '%');
        }

        $users = $query->latest()->paginate(PAGINATION_COUNT)->appends($request->query());

        return view('dashboard.users.index', compact('users'));
    }


    public function show(User $user)
    {
        return view('dashboard.users.show', [
            'user' => $user
        ]);
    }

    public function userOrders(User $user, Request $request)
    {
        $orders = Order::with('user')
            ->where('user_id', $user->id)
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->when($request->filled('min_price'), fn($q) => $q->where('price', '>=', $request->min_price))
            ->when($request->filled('max_price'), fn($q) => $q->where('price', '<=', $request->max_price))
            ->when($request->filled('date_from'), fn($q) => $q->whereDate('created_at', '>=', $request->date_from))
            ->when($request->filled('date_to'), fn($q) => $q->whereDate('created_at', '<=', $request->date_to))
            ->latest()
            ->paginate(PAGINATION_COUNT);

        return view('dashboard.orders.index', compact('orders', 'user'));
    }
}
