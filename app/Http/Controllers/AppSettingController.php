<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;
use App\Services\AdminProfileServices;

class AppSettingController extends Controller
{
    public function index()
    {
        $pageTitle = 'App Settings';
        $profile = Profile::first();
        return view('admin.appsetting.index', compact('profile', 'pageTitle'));
    }

    public function update(Request $request, AdminProfileServices $service)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'password' => 'nullable|confirmed|min:8',
        ]);

        $user = Auth::user();

        $updated = [];

        // update photo jika ada
        if ($request->hasFile('photo')) {
            $service->updatePhoto($user, $request->file('photo'));
            $updated[] = 'photo';
        }

        // update password jika diisi
        if ($request->filled('password')) {
            $service->updatePassword($user, $request->password);
            $updated[] = 'password';
        }

        // kalau tidak ada yang diupdate
        if (empty($updated)) {
            return response()->json([
                'message' => 'Tidak ada data yang diubah'
            ], 422);
        }

        return response()->json([
            'message' => 'Berhasil update: ' . implode(', ', $updated)
        ]);
    }
}
