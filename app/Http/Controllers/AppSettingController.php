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
        $user = Auth::user();

        // validasi gabungan
        $validated = $request->validate([
            // profile
            'full_name' => 'nullable|string|max:255',
            'profession' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'email_contact' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'github_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',

            // file
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            // password
            'password' => 'nullable|confirmed|min:8',
        ]);

        $updated = [];

        // ✅ 1. update profile detail
        if ($request->hasAny([
            'full_name',
            'profession',
            'bio',
            'location',
            'email_contact',
            'phone',
            'github_url',
            'linkedin_url',
            'instagram_url'
        ])) {
            $service->updateProfileDetail(
                $user,
                $validated['full_name'] ?? null,
                $validated['profession'] ?? null,
                $validated['bio'] ?? null,
                $validated['location'] ?? null,
                $validated['email_contact'] ?? null,
                $validated['phone'] ?? null,
                $validated['github_url'] ?? null,
                $validated['linkedin_url'] ?? null,
                $validated['instagram_url'] ?? null,
            );

            $updated[] = 'profile';
        }

        // ✅ 2. update photo
        if ($request->hasFile('photo')) {
            $service->updatePhoto($user, $request->file('photo'));
            $updated[] = 'photo';
        }

        // ✅ 3. update background
        if ($request->hasFile('background_image')) {
            $service->updateBackgroundImage($user, $request->file('background_image'));
            $updated[] = 'background';
        }

        // ✅ 4. update password
        if ($request->filled('password')) {
            $service->updatePassword($user, $request->password);
            $updated[] = 'password';
        }

        // ❌ tidak ada perubahan
        if (empty($updated)) {
            return response()->json([
                'message' => 'Tidak ada data yang diubah'
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => 'Berhasil update: ' . implode(', ', $updated)
        ]);
    }
}
