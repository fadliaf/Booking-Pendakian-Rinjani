<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Background</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased">
    <div class="relative w-full h-screen bg-cover bg-center"
        style="background-image: url('images/gunungrinjanilombok21.jpg');">
        <header class="absolute top-0 right-0 z-20 py-10 px-6">
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        @if(auth()->user()->role === 'Admin')
                            <a href="{{ url('/admin/pendaki') }}"
                                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Admin Dashboard
                            </a>
                        @else
                            <a href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Dashboard
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Overlay untuk teks dan konten -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Konten di atas latar belakang -->
        <div class="relative z-10 flex items-center justify-center w-full h-full text-white">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">Selamat Datang</h1>
                <p class="text-lg md:text-2xl"></p>
            </div>
        </div>
    </div>

</body>

</html>