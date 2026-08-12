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

    //
}
