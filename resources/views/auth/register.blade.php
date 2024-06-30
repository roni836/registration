<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <header class="bg-white shadow-md px-4">
        <div class="container mx-auto px-4 py-6 flex justify-end items-center">
            <div class="space-x-4">
                @guest
                    <a href="/login"
                        class="text-indigo-600 border border-indigo-600 px-4 py-2 rounded hover:bg-indigo-600 hover:text-white transition">Sign
                        In</a>
                    <a href="/register" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">Sign
                        Up</a>
                @endguest
            </div>
        </div>
    </header>
    <div class="flex justify-center mt-10 sm:mt-20 px-4">
        <form action="{{ route('register') }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm sm:max-w-md">
            @csrf
            <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent">
                @error('name')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent">
                @error('email')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password:</label>
                <input type="password" id="password" name="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent">
                @error('password')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition duration-200">Register</button>
            <div class="mt-4 text-center">
                <p class="text-gray-600">Already have an account? <a href="{{ route('login') }}"
                        class="text-indigo-600 hover:underline">Login</a></p>
            </div>
        </form>
    </div>
</body>

</html>
