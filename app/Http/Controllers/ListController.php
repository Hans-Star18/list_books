<?php

namespace App\Http\Controllers;

use App\Helpers\MyHelpers;
use App\Models\Author;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function books()
    {
        if (request('search')) {
            return DB::table('books')
                ->select('books.id as id', 'books.book_title as title', 'categories.category_name as category', 'authors.author_name as author')
                ->join('authors', 'authors.id', '=', 'books.author_id')
                ->join('categories', 'categories.id', '=', 'books.category_id')
                ->where('books.book_title', 'like', '%' . request('search') . '%')
                ->orWhere('authors.author_name', 'like', '%' . request('search') . '%');
        } elseif (request('author')) {
            return DB::table('books')
                ->select('books.id as id', 'books.book_title as title', 'categories.category_name as category', 'authors.author_name as author')
                ->join('authors', 'authors.id', '=', 'books.author_id')
                ->join('categories', 'categories.id', '=', 'books.category_id')
                ->where('authors.author_name', "=", request('author'));
        } else {
            return DB::table('books')
                ->select('books.id as id', 'books.book_title as title', 'categories.category_name as category', 'authors.author_name as author')
                ->join('authors', 'authors.id', '=', 'books.author_id')
                ->join('categories', 'categories.id', '=', 'books.category_id');
        }
    }

    public function index()
    {
        $books = [];
        foreach ($this->books()->get() as $book) {
            array_push($books, [
                'id' => $book->id,
                'title' => $book->title,
                'author' => $book->author,
                'category' => $book->category,
                'average_rating' => MyHelpers::get_average_rating($book->id),
                'total_voter' => MyHelpers::get_total_voter($book->id),
            ]);
        }
        request('shown') ? $shown = request('shown') : $shown = 10;
        $books = collect($books)->sortByDesc('average_rating')->take($shown);

        return view('books.list_books', [
            'books' => $books,
        ]);
    }

    public function top()
    {
        $books = [];
        foreach ($this->books()->get() as $book) {
            array_push($books, [
                'id' => $book->id,
                'title' => $book->title,
                'author' => $book->author,
                'category' => $book->category,
                'average_rating' => MyHelpers::get_average_rating($book->id),
                'total_voter' => MyHelpers::get_total_voter($book->id),
            ]);
        }
        $books = collect($books)->sortByDesc('total_voter')->where('total_voter', '>', 5)->take(10);

        return view('books.most_author', [
            'books' => $books,
        ]);
    }

    public function rating()
    {
        if (request('book_id') && request('rating') && request('button_submit')) {
            Rating::create([
                'book_id' => request('book_id'),
                'rating' => request('rating'),
            ]);

            return redirect('/');
        }
        $ratings = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        return view('books.rating', [
            'authors' => Author::all(),
            'books' => $this->books()->get(),
            'ratings' => $ratings->all(),
        ]);
    }
}