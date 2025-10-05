<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
     public function index()
    {
        $setting = Setting::first();
        return view('dashboard.settings.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'               => 'required|string|max:255',
            'email'              => 'nullable|email|max:255',
            'phone'              => 'nullable|string|max:20',
            'address'            => 'nullable|string|max:255',
            'company_category'   => 'nullable|string|max:255',
            'commercial_number'  => 'nullable|string|max:100',
            'representer'        => 'nullable|string|max:255',
            'site_logo'          => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }

        $setting->fill($validated);

        if ($request->hasFile('site_logo')) {
            $file = $request->file('site_logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            $setting->site_logo = 'uploads/settings/' . $filename;
        }

        $setting->save();

        return redirect()->back()->with('success', 'تم حفظ إعدادات الموقع بنجاح.');
    }
}
