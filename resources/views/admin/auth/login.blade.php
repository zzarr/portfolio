<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center bg-black relative overflow-hidden">

    <!-- Background Gradient -->
    <!-- Background Grid Pattern -->
    <div
        class="absolute inset-0 bg-[linear-gradient(to_right,#1f2937_1px,transparent_1px),linear-gradient(to_bottom,#1f2937_1px,transparent_1px)] bg-[size:40px_40px] opacity-40">
    </div>
    <div class="relative z-10 w-full max-w-md px-6">
        <!-- Login Form Container -->
        <div <div class="w-full max-w-md px-6">
            <div class="bg-gray-950 border border-gray-800 rounded-2xl shadow-xl p-8">

                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-2xl font-bold text-white">Admin Dashboard</h1>
                    <p class="text-sm text-gray-400 mt-2">
                        Silakan login untuk masuk ke dashboard
                    </p>
                </div>
                @if ($errors->any())
                    <div class="mb-4 rounded-lg bg-red-500/10 border border-red-500/20 p-3 text-sm text-red-400">
                        {{ $errors->first() }}
                    </div>
                @endif
                <!-- Form -->
                <form action="{{ route('admin.login') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label class="block text-sm text-gray-300 mb-2">
                            Email
                        </label>
                        <input type="email" name="email" placeholder="Masukkan email"
                            class="w-full h-10 rounded-lg border border-gray-700 bg-gray-900 px-3 text-sm text-white placeholder-white/30 focus:ring-3 focus:ring-blue-500/10 focus:border-blue-500 outline-none"
                            required>
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm text-gray-300 mb-2">
                            Password
                        </label>
                        <input type="password" name="password" placeholder="Masukkan password"
                            class="w-full h-10 rounded-lg border border-gray-700 bg-gray-900 px-3 text-sm text-white placeholder-white/30 focus:ring-3 focus:ring-blue-500/10 focus:border-blue-500 outline-none"
                            required>
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full h-10 rounded-lg bg-white text-black font-medium hover:bg-gray-700 hover:text-white transition-ease-in-out duration-300">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
