<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the books with optional category filter and title search.
     */
    public function index(Request $request)
    {
        $q = $request->query('q');
        $category = $request->query('category');

        $query = Book::query();

        if ($category) {
            $query->where('category', $category);
        }

        if ($q) {
            $query->where('title', 'like', "%{$q}%");
        }

        $books = $query->orderBy('title')->paginate(15)->withQueryString();

        $categories = Book::whereNotNull('category')->distinct()->pluck('category');

        return view('books.index', compact('books', 'categories', 'category', 'q'));
    }

    /**
     * Display the specified book details.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show form to create a new book.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created book with server-side validation.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_year' => 'nullable|integer',
            'category' => 'nullable|string|max:255',
            'borrowed_by' => 'nullable|string|max:255',
            'expected_return_date' => 'nullable|date',
        ]);

        $book = Book::create($data);

        return redirect()->route('books.show', $book->id)->with('success', 'Livro criado com sucesso.');
    }

    //
}
