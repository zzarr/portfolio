<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'user_id' => 1,
            'full_name' => 'Mohamad Azhar Syah',
            'profession' => 'Fullstack Web Developer',
            'bio' => 'Saya adalah seorang Fullstack Web Developer yang memiliki pengalaman dalam membangun aplikasi web modern menggunakan Laravel, Livewire, JavaScript, dan Tailwind CSS.',
            'photo' => 'profiles/default-photo.jpg',
            'background_image' => 'profiles/default-bg.jpg',
            'cv_file' => 'cv/mohamad-azhar-syah-cv.pdf',
            'location' => 'Cirebon, Jawa Barat, Indonesia',
            'email_contact' => 'azhar@example.com',
            'phone' => '081234567890',
            'github_url' => 'https://github.com/azharsyah',
            'linkedin_url' => 'https://linkedin.com/in/azharsyah',
            'instagram_url' => 'https://instagram.com/azharsyah',
        ]);
    }
}
