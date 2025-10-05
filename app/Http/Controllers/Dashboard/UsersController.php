<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query()->where('role','user');

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

        $users = $query->latest()->paginate(10)->appends($request->query());

        return view('dashboard.users.index', compact('users'));
    }


    public function show(User $user)
    {
        return view('dashboard.users.show', [
            'user' => $user
        ]);
    }
}
