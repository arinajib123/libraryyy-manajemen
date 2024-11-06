<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku - Hacker Style</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #0d0d0d;
            color: #00ff00;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #000;
            border: 1px solid #00ff00;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.5);
        }

        h1 {
            text-align: center;
            color: #00ff00;
            margin-bottom: 20px;
            text-shadow: 0 0 10px #00ff00;
            font-size: 24px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
        }

        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            background-color: #0d0d0d;
            border: 1px solid #00ff00;
            color: #00ff00;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 16px;
        }

        input[type="text"]:focus, input[type="number"]:focus, textarea:focus {
            outline: none;
            border-color: #00ff00;
            box-shadow: 0 0 10px #00ff00;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .checkbox-group input[type="checkbox"] {
            transform: scale(1.5);
            margin-right: 10px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #00ff00;
            color: #0d0d0d;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #009900;
        }

        button:active {
            background-color: #00ff00;
            box-shadow: 0 0 15px #00ff00;
        }

        @media (max-width: 500px) {
            .form-container {
                width: 90%;
                padding: 15px;
            }

            h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Edit Buku</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Judul Buku:</label>
        <input type="text" id="title" name="title" value="{{ $book->title }}" required>

        <label for="author">Penulis:</label>
        <input type="text" id="author" name="author" value="{{ $book->author }}" required>

        <label for="category">Kategori:</label>
        <input type="text" id="category" name="category" value="{{ $book->category }}" required>

        <label for="published_year">Tahun Terbit:</label>
        <input type="number" id="published_year" name="published_year" value="{{ $book->published_year }}" required>

        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description">{{ $book->description }}</textarea>

        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn" value="{{ $book->isbn }}">

        <div class="checkbox-group">
            <input type="checkbox" id="available" name="available" value="1" {{ $book->available ? 'checked' : '' }}>
            <label for="available">Tersedia</label>
        </div>

        <button type="submit">Simpan</button>
    </form>
</div>

</body>
</html>
