<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('admin/assets/css/icons.css') }}">
</head>

<body class="bg-gray-950 text-white">

    <div x-data="{ tab: 'projects' }" class="min-h-screen pb-20">

        <div x-data="navbarScroll" :class="showNavbar ? 'translate-y-0' : '-translate-y-full'"
            class="fixed top-0 w-full z-50 bg-gray-950/80 backdrop-blur border-b border-gray-800
           transition-transform duration-300 ease-in-out">
            <div class="flex items-center justify-between px-4 h-14">
                <div class="font-semibold">Azhar</div>
                <a href="#contact" class="text-sm bg-white text-black px-3 py-1 rounded-full">
                    Contact Me
                </a>
            </div>
        </div>

        <!-- SPACER -->
        <div class="h-14"></div>

        <!-- 🖼️ COVER -->
        <div class="h-36 bg-gray-800">
            <!-- nanti bisa pakai image -->
        </div>

        <!-- 👤 PROFILE -->
        <div class="px-4">
            <!-- FOTO -->
            <div class="-mt-12">
                <img src="{{ asset('assets/profile2.png') }}" alt="Profile"
                    class="w-24 h-24 rounded-full border-4 border-gray-950 object-cover 
               transition-all duration-300 ease-out
               md:hover:scale-105 md:hover:shadow-xl
               active:scale-95">
            </div>

            <!-- INFO -->
            <div class="mt-2">
                <h1 class="text-lg font-semibold">Azhar</h1>
                <p class="text-gray-400 text-sm">@azhar.dev</p>

                <p class="text-sm mt-2 text-gray-300">
                    Web Developer Laravel & JavaScript. Membangun aplikasi web modern.
                </p>

                <!-- CTA SOCIAL -->
                <div class="flex gap-2 mt-3">
                    <a href="#" class="border border-gray-700 px-3 py-1 rounded-full text-sm">
                        <i class="ri-github-fill"></i>
                    </a>
                    <a href="#" class="border border-gray-700 px-3 py-1 rounded-full text-sm">
                        <i class="ri-linkedin-fill"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- 💼 EXPERIENCE -->
        <section id="experience" class="px-4 py-6">
            <h2 class="text-lg font-semibold mb-4">Experience</h2>

            <div class="space-y-4">
                <div class="border border-gray-800 rounded-xl p-4 bg-gray-950">
                    <h3 class="text-lg font-semibold text-white">B-One Corp</h3>

                    <p class="mt-1 text-sm font-medium text-gray-300">
                        Oct 2024 - Present
                    </p>

                    <p class="mt-3 text-sm font-semibold text-gray-200">
                        User Support
                    </p>

                    <ul class="mt-3 list-disc pl-5 space-y-3 text-sm leading-7 text-gray-300 marker:text-gray-500">
                        <li>Melayani dan menyelesaikan keluhan pengguna</li>
                        <li>Memberikan bantuan teknis terkait aplikasi yang digunakan</li>
                        <li>Berkomunikasi dengan tim pengembang untuk menyampaikan feedback pengguna</li>
                        <li>Memastikan kepuasan pengguna dengan solusi yang cepat dan efektif</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 📂 PROJECT -->
        <section id="project" class="px-4 py-6">
            <h2 class="text-lg font-semibold mb-4">Projects</h2>

            <div class="space-y-4">
                <div class="border border-gray-800 rounded-xl p-4">
                    <div class="h-40 bg-gray-800 rounded-lg mb-3"></div>

                    <h3 class="font-semibold">REMIND App</h3>
                    <p class="text-sm text-gray-400 mt-1">
                        Sistem pengukuran tingkat stres remaja berbasis kuisioner.
                    </p>

                    <p class="text-xs text-gray-500 mt-2">
                        Laravel • Livewire • Tailwind
                    </p>

                    <div class="flex gap-2 mt-3">
                        <a href="#" class="text-sm underline">Github</a>
                        <a href="#" class="text-sm underline">Demo</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 🛠 SKILLS -->
        <section id="skill" class="px-4 py-6">
            <h2 class="text-lg font-semibold mb-4">Skills</h2>

            <div class="grid grid-cols-2 gap-3 text-sm">
                <div class="border border-gray-800 p-3 rounded-lg">Laravel</div>
                <div class="border border-gray-800 p-3 rounded-lg">JavaScript</div>
                <div class="border border-gray-800 p-3 rounded-lg">MySQL</div>
                <div class="border border-gray-800 p-3 rounded-lg">Tailwind</div>
            </div>
        </section>

        <!-- 📬 CONTACT -->
        <section id="contact" class="px-4 py-6 pb-24">
            <h2 class="text-lg font-semibold mb-4">Contact</h2>

            <div class="space-y-3 text-sm">
                <a href="#" class="block border border-gray-800 rounded-lg p-3">
                    Email
                </a>
                <a href="#" class="block border border-gray-800 rounded-lg p-3">
                    LinkedIn
                </a>
                <a href="#" class="block border border-gray-800 rounded-lg p-3">
                    Github
                </a>
            </div>
        </section>

    </div>

    <!-- 🔻 BOTTOM NAVBAR -->
    <div class="fixed bottom-0 w-full bg-gray-950 border-t border-gray-800">
        <div class="flex justify-around text-xs py-2">
            <button class="flex flex-col items-center">
                <i class="ri-briefcase-line"></i>
                <span>Experience</span>
            </button>

            <button class="flex flex-col items-center">
                <i class="ri-folder-line"></i>
                <span>Project</span>
            </button>
            <button class="flex flex-col items-center">
                <i class="ri-home-6-line"></i>
                <span>Home</span>
            </button>
            <button class="flex flex-col items-center">
                <i class="ri-code-s-slash-line"></i>
                <span>Skill</span>
            </button>
            <button class="flex flex-col items-center">
                <i class="ri-mail-line"></i>
                <span>Contact</span>
            </button>
        </div>
    </div>

</body>

</html>
