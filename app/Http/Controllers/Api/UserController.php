<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUserRequest;
use App\Http\Requests\Api\UpdateDeviceTokenRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser(StoreUserRequest $request)
    {
        $input = $request->validated();
        $input['role'] = 'user';
        // Create user with validated data
        $user = User::create( $input);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully.',
            'data'    => $user
        ], 201);
    }
    public function show($id)
    {
        $user = User::where('app_id',$id)->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'user not exist',
            ],422);
        }
        return response()->json([
            'success' => true,
            'data'    => $user
        ], 201);
    }

    public function updateDeviceToken(UpdateDeviceTokenRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'user not exist',
            ],422);
        }
        // Save the device token
        $user->device_token = $request->device_token;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Device token updated successfully',
            'data'    => [
                'user' => $user
            ]
        ]);
    }
}
