<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;


class AppSettingController extends Controller
{
    public function index()
    {
        $pageTitle = 'App Settings';
        $profile = Profile::first();
        return view('admin.appsetting.index', compact('profile', 'pageTitle'));
    }

    public function update(Request $request)
    {
        $profile = Profile::first();
        $profile->update($request->all());
        return redirect()->back()->with('success', 'App settings updated successfully.');
    }
}
