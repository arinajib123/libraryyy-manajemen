<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1542346490-b1b10e7b92f4'); /* Gambar latar belakang gaming */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-900 bg-opacity-90">

    <div class="bg-gray-800 bg-opacity-75 rounded-lg shadow-lg p-8 w-full max-w-md">
        <h1 class="text-3xl font-bold text-yellow-400 mb-6 text-center">Tambah Buku Baru</h1>

        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-white">Judul Buku:</label>
                <input type="text" name="title" required class="mt-1 block w-full p-2 border border-gray-600 rounded-md bg-gray-700 text-white focus:outline-none focus:ring focus:ring-yellow-500">
            </div>

            <div class="mb-4">
                <label class="block text-white">Penulis:</label>
                <input type="text" name="author" required class="mt-1 block w-full p-2 border border-gray-600 rounded-md bg-gray-700 text-white focus:outline-none focus:ring focus:ring-yellow-500">
            </div>

            <div class="mb-4">
                <label class="block text-white">Kategori:</label>
                <input type="text" name="category" required class="mt-1 block w-full p-2 border border-gray-600 rounded-md bg-gray-700 text-white focus:outline-none focus:ring focus:ring-yellow-500">
            </div>

            <div class="mb-4">
                <label class="block text-white">Tahun Terbit:</label>
                <input type="number" name="published_year" required class="mt-1 block w-full p-2 border border-gray-600 rounded-md bg-gray-700 text-white focus:outline-none focus:ring focus:ring-yellow-500">
            </div>

            <div class="mb-4">
                <label class="block text-white">Deskripsi:</label>
                <textarea name="description" class="mt-1 block w-full p-2 border border-gray-600 rounded-md bg-gray-700 text-white focus:outline-none focus:ring focus:ring-yellow-500"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-white">ISBN:</label>
                <input type="text" name="isbn" class="mt-1 block w-full p-2 border border-gray-600 rounded-md bg-gray-700 text-white focus:outline-none focus:ring focus:ring-yellow-500">
            </div>

            <div class="mb-4">
                <label class="inline-flex items-center text-white">
                    <input type="checkbox" name="available" value="1" checked class="form-checkbox h-5 w-5 text-yellow-500">
                    <span class="ml-2">Tersedia</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-yellow-500 text-gray-900 font-semibold py-2 rounded-md hover:bg-yellow-600 transition">Simpan</button>
        </form>
    </div>

</body>
</html>
