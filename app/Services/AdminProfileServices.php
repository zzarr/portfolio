<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileServices
{
    public function updatePhoto($user, $photo): void
    {
        if (!$photo) {
            return;
        }

        $profile = $user->profile;

        // hapus foto lama jika ada
        if ($profile && $profile->photo && Storage::disk('public')->exists($profile->photo)) {
            Storage::disk('public')->delete($profile->photo);
        }

        $fileName = 'admin_' . $user->id . '_' . time() . '.' . $photo->extension();

        $path = $photo->storeAs(
            'asset/img',
            $fileName,
            'public'
        );

        // kalau profile belum ada → buat
        if (!$profile) {
            $user->profile()->create([
                'photo' => $path,
            ]);
        } else {
            // kalau sudah ada → update
            $profile->update([
                'photo' => $path,
            ]);
        }
    }

    public function updatePassword($user, ?string $password): void
    {
        if (!$password) {
            return;
        }

        $user->update([
            'password' => Hash::make($password)
        ]);
    }
}
