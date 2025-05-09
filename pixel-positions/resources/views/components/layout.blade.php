<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Positions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,400,500,600;1,400,500,600&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js'])
</head>
<body class="bg-black text-white pb-20">
<div class="px-10">
    <nav class="flex justify-between items-center py-4 border-b border-white/10">
        <div>
            <a href="/">
                <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Logo">
            </a>
        </div>
        <div class="space-x-6 font-bold">
            <a href="">Jobs</a>
            <a href="">Careers</a>
            <a href="">Salaries</a>
            <a href="">Companies</a>
        </div>

        <div>
            @guest
                <div class="space-x-6 font-bold flex">
                    <a href="/register">Sign up</a>
                    <a href="/login">Log in</a>
                </div>
            @endguest
            @auth
                <div class="space-x-6 font-bold flex">
                    <a href="/job/create">Post a job</a>

                    <form method="post" action="/logout">
                        @csrf
                        @method('DELETE')
                        <button>Log out</button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>

    <main class="mt-10 max-w-[1000px] mx-auto">
        <x-flash-messages />

        {{ $slot }}
    </main>
</div>

</body>
</html>
