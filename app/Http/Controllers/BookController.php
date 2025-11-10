<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:6|max:255',
            'author' => 'required|string|min:6|max:255',
            'published_year' => 'required|integer|min:1900|max:2099',
        ]);

        Book::create($validated);
        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }
    
    /**
     * Display the specified resource.
    */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        $books = Book::all();
        $bookDetail = Book::findOrFail($id);
        return view('books.index', compact('books', 'bookDetail'));
    }
    
    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|min:6|max:255',
            'author' => 'required|string|min:6|max:255',
            'published_year' => 'required|integer|min:1900|max:2099',
        ]);
    
        $book->update($validated);
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
