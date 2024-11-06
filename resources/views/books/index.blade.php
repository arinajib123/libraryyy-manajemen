<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1542346490-b1b10e7b92f4'); /* Gambar latar belakang gaming */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-gray-900 bg-opacity-90">

    <div class="bg-gray-800 bg-opacity-75 rounded-lg shadow-lg p-6 w-full max-w-xl">
        <h1 class="text-4xl font-bold text-yellow-400 mb-4 text-center">Daftar Buku</h1>

        @if(Auth::check())
            <p class="text-white mb-4 text-center">Selamat datang, <span class="font-semibold">{{ Auth::user()->username }}</span>!</p>
            <form action="{{ route('auth.logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition">Logout</button>
            </form>
        @endif

        <div class="text-center mb-4">
            <a href="{{ route('books.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Tambah Buku</a>
        </div>

        @if($books->isEmpty())
            <p class="text-white text-center">Tidak ada buku</p>
        @else
            <ul class="bg-gray-900 bg-opacity-80 rounded-lg p-4 shadow-md">
                @foreach($books as $book)
                <li class="border-b border-gray-700 py-2">
                    <h3 class="text-xl font-semibold text-yellow-300">{{ $book->title }} ({{ $book->published_year }})</h3>
                    <p class="text-gray-400"><strong>Penulis:</strong> {{ $book->author }}</p>
                    <p class="text-gray-400"><strong>Kategori:</strong> {{ $book->category }}</p>
                    <p class="text-gray-400"><strong>ISBN:</strong> {{ $book->isbn }}</p>
                    <p class="text-gray-400"><strong>Ketersediaan:</strong> {{ $book->available ? 'Tersedia' : 'Tidak Tersedia' }}</p>
                    <div class="flex space-x-2">
                        <a href="{{ route('books.edit', $book->id) }}" class="text-blue-400 hover:underline">Edit</a>

                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:underline">Hapus</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        @endif
    </div>

</body>
</html>
