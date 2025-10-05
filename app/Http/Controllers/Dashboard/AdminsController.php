<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\Dashboard\StoreUserRequest;
use App\Http\Requests\Dashboard\UpdateUserRequest;
use App\Models\Address;

class AdminsController extends Controller
{
    public function index()
    {
        $users = User::where('role','admin')->latest()->paginate(PAGINATION_COUNT);

        return view('dashboard.admin.index', compact('users'));
    }

    /**
     * Show form for creating user
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::latest()->get();

        return view('dashboard.admin.create',compact('roles'));
    }

    /**
     * Store a newly created user
     * 
     * @param User $user
     * @param StoreUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request)
    {
        $request_data = $request->except(['password', 'password_confirmation', 'permissions']);
        $request_data['role'] = 'admin';
        $request_data['password'] = bcrypt($request->password);
        $user = User::create($request_data);

        return redirect()->route('admin.index')
            ->withSuccess(trans('admin.added'));
    }

    /**
     * Show user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.admin.show', [
            'user' => $user
        ]);
    }

    /**
     * Edit user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $user = User::find($user);
        return view('dashboard.admin.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update user data
     * 
     * @param User $user
     * @param UpdateUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        $user->update($request->validated());
        return redirect()->route('admin.index')
            ->withSuccess(trans('admin.updated'));
    }

    /**
     * Delete user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.index')
            ->withSuccess(trans('admin.detelted_sucess'));
    }

   
    
}
