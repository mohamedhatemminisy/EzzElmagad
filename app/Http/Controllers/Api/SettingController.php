<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $setting = Setting::first();
        $setting ['site_logo'] = asset($setting->site_logo) ;
        return response()->json([
            'data' => $setting,
        ]);
    }
}
