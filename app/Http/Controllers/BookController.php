<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Display the list of books
   public function index(Request $request)
    {
        $query = Book::query();

        // 1. Search by Title or Author
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('author', 'like', '%' . $request->search . '%');
            });
        }

        // 2. Filter by Genre
        if ($request->has('genre') && $request->genre != '') {
            $query->where('genre', $request->genre);
        }

        $books = $query->get();

        // 3. Check if the request is AJAX (for the live search)
        if ($request->ajax()) {
            // This returns ONLY the table rows found in our partial file
            return view('books.partials.book_list', compact('books'))->render();
        }

        // Normal page load
        return view('books.index', compact('books'));
    }

    // Show the form to create a new book
    public function create()
    {
        return view('books.create');
    }

    // Store the new book in the database
    public function store(Request $request)
    {
        // This matches the validation rules from your prof's screenshot
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required',
            'genre' => 'required',
            'published_year' => 'required|integer',
            'isbn' => 'required|unique:books,isbn',
            'pages' => 'required|integer',
            'language' => 'required',
            'publisher' => 'required',
            'price' => 'required|numeric',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle File Upload for the cover image
        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        // Handle the checkbox (is_available)
        $validated['is_available'] = $request->has('is_available');

        Book::create($validated);
        

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    // 1. To view a single book
public function show(Book $book)
{
    return view('books.show', compact('book'));
}

// 2. To show the edit form
public function edit(Book $book)
{
    return view('books.edit', compact('book'));
}

// 3. To handle the deletion
public function destroy(Book $book)
{
    $book->delete();
    return redirect()->route('books.index')->with('success', 'Book deleted successfully');

}
// 4. To handle the update request from the edit form
public function update(Request $request, Book $book)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'description' => 'required',
        'genre' => 'required',
        'published_year' => 'required|integer',
        'isbn' => 'required|unique:books,isbn,' . $book->id, // Ignore current book's ISBN
        'pages' => 'required|integer',
        'language' => 'required',
        'publisher' => 'required',
        'price' => 'required|numeric|max:9999999.99', // Matches your decimal fix
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Handle new Cover Image upload if provided
    if ($request->hasFile('cover_image')) {
        $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
    }

    // Update availability checkbox
    $validated['is_available'] = $request->has('is_available');

    // Perform the update
    $book->update($validated);

    return redirect()->route('books.index')->with('success', 'Book updated successfully!');
}

}