<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Fisher's Haven</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://www.example.com/tuf-gaming-background.jpg'); /* Ganti dengan URL background yang sesuai */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

    <div class="bg-gray-900 bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-sm">
        <h1 class="text-3xl font-bold text-center mb-6 text-yellow-400">Login Dulu, Enggh!</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 border border-green-300 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <ul class="bg-red-100 text-red-700 border border-red-300 p-2 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-white">Email:</label>
                <input type="email" name="email" required class="mt-1 block w-full p-2 border border-gray-700 rounded-md focus:outline-none focus:ring focus:ring-yellow-500 bg-gray-800 text-white">
            </div>
            
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-white">Password:</label>
                <input type="password" name="password" required class="mt-1 block w-full p-2 border border-gray-700 rounded-md focus:outline-none focus:ring focus:ring-yellow-500 bg-gray-800 text-white">
            </div>
            
            <button type="submit" class="w-full bg-yellow-500 text-gray-900 font-semibold py-2 rounded-md hover:bg-yellow-600 transition">Login</button>
        </form>

        <p class="mt-4 text-center text-white">Belum punya akun? <a href="{{ route('auth.register') }}" class="text-yellow-400 hover:underline">Daftar di sini, Enggh!</a></p>
    </div>
</body>
</html>
