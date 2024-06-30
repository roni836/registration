<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes wave {

            0%,
            100% {
                transform: rotate(0deg);
            }

            50% {
                transform: rotate(20deg);
            }
        }

        .hand {
            display: inline-block;
            transform-origin: bottom center;
            animation: wave 2s infinite;
        }
    </style>
</head>

<body class="bg-gray-100">
    <header class="bg-white shadow-md px-5">
        <div class="container mx-auto px-4 py-6 flex justify-between items-center">
            <div class="text-2xl font-bold text-gray-800 capitalize">
                <h1>Hello, {{ $user->name }} </h1>
            </div>
            <nav class="space-x-6 hidden md:flex">
                <a href="#" class="text-gray-600 hover:text-indigo-600">Home</a>
                <a href="#" class="text-gray-600 hover:text-indigo-600">About</a>
                <a href="#" class="text-gray-600 hover:text-indigo-600">Services</a>
                <a href="#" class="text-gray-600 hover:text-indigo-600">Contact</a>
            </nav>
            <div class="hidden md:flex space-x-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="text-red-500 border border-red-500 px-4 py-2 rounded hover:bg-red-500 hover:text-white transition">Logout</button>
                </form>
            </div>
        </div>
    </header>
    <div class="flex items-center justify-center mt-16 sm:mt-32 px-4">
        <div class="text-3xl sm:text-5xl font-bold text-center">
            <span class="text-indigo-600 capitalize">Hi, {{ $user->name }} </span>
            <span class="hand">👋</span>
        </div>
    </div>
</body>

</html>
