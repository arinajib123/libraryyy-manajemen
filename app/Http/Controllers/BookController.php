<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    // Menampilkan semua buku
    public function index()
    {
        $books = Buku::where('user_id', Auth::id())->get(); // Buku milik user yang login
        return view('books.index', compact('books'));
    }

    // Menampilkan form untuk menambah buku baru
    public function create()
    {
        return view('books.create');
    }

    // Menyimpan buku baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'published_year' => 'required|integer',
            'description' => 'nullable|string',
            'isbn' => 'nullable|string|max:13',
            'available' => 'boolean',
        ]);

        Buku::create([
            'title' => $request->title,
            'author' => $request->author,
            'category' => $request->category,
            'published_year' => $request->published_year,
            'description' => $request->description,
            'isbn' => $request->isbn,
            'available' => $request->has('available'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
    }

    // Menampilkan form untuk edit buku
    public function edit(Buku $book)
    {
        $this->authorize('update', $book);
        return view('books.edit', compact('book'));
    }

    // Mengupdate buku di database
    public function update(Request $request, Buku $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'published_year' => 'required|integer',
            'description' => 'nullable|string',
            'isbn' => 'nullable|string|max:13',
            'available' => 'boolean',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Buku berhasil diupdate');
    }

    // Menghapus buku
    public function destroy(Buku $book)
    {
        $this->authorize('delete', $book);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus');
    }
}
