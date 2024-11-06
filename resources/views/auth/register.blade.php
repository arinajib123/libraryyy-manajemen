<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-100 flex items-center justify-center min-h-screen" style="background-image: url('https://www.example.com/fishing-background.jpg'); background-size: cover; background-position: center;">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-3xl font-semibold text-center text-blue-700 mb-6">Daftar Baru</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 border border-red-300 p-2 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('auth.register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-blue-700">Nama:</label>
                <input type="text" name="username" placeholder="Masukkan nama" required class="mt-1 block w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-blue-700">Email:</label>
                <input type="email" name="email" placeholder="Masukkan email" required class="mt-1 block w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            </div>
            
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-blue-700">Password:</label>
                <input type="password" name="password" placeholder="Masukkan password" required class="mt-1 block w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            </div>
            
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-blue-700">Konfirmasi Password:</label>
                <input type="password" name="password_confirmation" placeholder="Ulangi password" required class="mt-1 block w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md hover:bg-blue-600 transition">Daftar</button>
        </form>

        <p class="mt-4 text-center text-blue-700">Sudah punya akun? <a href="{{ route('auth.login') }}" class="text-green-600 hover:underline">Masuk di sini!</a></p>
    </div>
</body>
</html>