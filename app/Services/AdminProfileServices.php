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

    public function updateProfile($user, ?string $fullName, ?string $email, ?string $phone, ?string $profession): void
    {
        $data = [];

        if ($fullName) {
            $data['name'] = $fullName;
        }

        if ($email) {
            $data['email'] = $email;
        }

        if (!empty($data)) {
            $user->update($data);
        }
    }

    public function updateProfileDetail(
        $user,
        ?string $fullName,
        ?string $profession,
        ?string $bio,
        ?string $location,
        ?string $emailContact,
        ?string $phone,
        ?string $githubUrl,
        ?string $linkedinUrl,
        ?string $instagramUrl
    ): void {
        // ambil profile atau buat baru jika belum ada
        $profile = $user->profile ?? $user->profile()->create([]);

        // update data (hindari overwrite null jika tidak dikirim)
        $profile->update(array_filter([
            'full_name' => $fullName,
            'profession' => $profession,
            'bio' => $bio,
            'location' => $location,
            'email_contact' => $emailContact,
            'phone' => $phone,
            'github_url' => $githubUrl,
            'linkedin_url' => $linkedinUrl,
            'instagram_url' => $instagramUrl,
        ], fn($value) => !is_null($value)));
    }

    public function updateBackgroundImage($user, $backgroundImage): void
    {
        if (!$backgroundImage) {
            return;
        }

        $profile = $user->profile;

        // hapus background image lama jika ada
        if ($profile && $profile->background_image && Storage::disk('public')->exists($profile->background_image)) {
            Storage::disk('public')->delete($profile->background_image);
        }

        $fileName = 'admin_bg_' . $user->id . '_' . time() . '.' . $backgroundImage->extension();

        $path = $backgroundImage->storeAs(
            'asset/img',
            $fileName,
            'public'
        );

        // kalau profile belum ada → buat
        if (!$profile) {
            $user->profile()->create([
                'background_image' => $path,
            ]);
        } else {
            // kalau sudah ada → update
            $profile->update([
                'background_image' => $path,
            ]);
        }
    }
}
