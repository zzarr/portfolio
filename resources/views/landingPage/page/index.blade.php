<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>Mohamad Azhar Syah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('admin/assets/css/icons.css') }}">
</head>

<body class="bg-gray-950 text-white">



    <div class="min-h-screen pb-20 px-4 md:px-6 lg:px-12 xl:px-20">

        <div x-data="navbarScroll" :class="showNavbar ? 'translate-y-0' : '-translate-y-full'"
            class="fixed top-0 left-0 right-0 z-50 bg-gray-950/80 backdrop-blur border-b border-gray-800
           transition-transform duration-300 ease-in-out lg:hidden">

            <div class="flex items-center justify-between px-5 h-14">
                <img src="{{ asset('favicon.ico') }}" alt="Logo" class="w-8 h-8 object-contain">

                <a href="#contact" class="text-sm bg-white text-black px-3 py-1 rounded-full">
                    Contact Me
                </a>
            </div>
        </div>

        <!-- SPACER -->
        <div class="h-14"></div>



        <!-- 👤 PROFILE -->
        @include('landingPage.components.profile')

        <!-- 💼 EXPERIENCE -->
        @include('landingPage.components.experience')

        <!-- 📂 PROJECT -->
        @include('landingPage.components.project')

        <!-- 🛠 SKILLS -->


        <!-- 📬 CONTACT -->
        <section id="contact" class="px-2 py-6 pb-12">
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

        <section id="copyright" class="px-2 py-6 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Azhar,.
        </section>

    </div>

    <!-- 🔻 BOTTOM NAVBAR -->
    <div class="fixed bottom-0 w-full bg-gray-950 border-t border-gray-800 lg:hidden">
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

    <!-- 🔻 DESKTOP NAVBAR -->
    <div x-data="navbarScrollDesktop"
        :class="showNavbar ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0 pointer-events-none'"
        class="hidden lg:flex fixed bottom-6 left-1/2 -translate-x-1/2 z-50
           items-center gap-6
           px-6 py-3
           rounded-full
           border border-gray-800
           bg-gray-950/80
           backdrop-blur-xl
           shadow-lg shadow-black/30
           transition-all duration-300 ease-in-out">

        <a href="#home"
            class="relative group text-gray-300 hover:text-white hover:scale-110 transition-all duration-200">
            <i class="ri-home-6-line text-lg"></i>
            <span
                class="absolute bottom-7 left-1/2 -translate-x-1/2 whitespace-nowrap rounded-md bg-gray-900 border border-gray-700 px-2 py-1 text-xs text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                Home
            </span>
        </a>

        <a href="#experience"
            class="relative group text-gray-300 hover:text-white hover:scale-110 transition-all duration-200">
            <i class="ri-briefcase-line text-lg"></i>
            <span
                class="absolute bottom-7 left-1/2 -translate-x-1/2 whitespace-nowrap rounded-md bg-gray-900 border border-gray-700 px-2 py-1 text-xs text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                Experience
            </span>
        </a>

        <a href="#project"
            class="relative group text-gray-300 hover:text-white hover:scale-110 transition-all duration-200">
            <i class="ri-folder-line text-lg"></i>
            <span
                class="absolute bottom-7 left-1/2 -translate-x-1/2 whitespace-nowrap rounded-md bg-gray-900 border border-gray-700 px-2 py-1 text-xs text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                Projects
            </span>
        </a>

        <a href="#skill"
            class="relative group text-gray-300 hover:text-white hover:scale-110 transition-all duration-200">
            <i class="ri-code-s-slash-line text-lg"></i>
            <span
                class="absolute bottom-7 left-1/2 -translate-x-1/2 whitespace-nowrap rounded-md bg-gray-900 border border-gray-700 px-2 py-1 text-xs text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                Skills
            </span>
        </a>

        <a href="#contact"
            class="relative group text-gray-300 hover:text-white hover:scale-110 transition-all duration-200">
            <i class="ri-mail-line text-lg"></i>
            <span
                class="absolute bottom-7 left-1/2 -translate-x-1/2 whitespace-nowrap rounded-md bg-gray-900 border border-gray-700 px-2 py-1 text-xs text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                Contact
            </span>
        </a>
    </div>

</body>

</html>
