<?php
namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
class BookController extends Controller {
    public function index() {
    return view('books.index', ['books' => Book::with('author')->get()]);
    }
    public function create() {
    return view('books.create', ['authors' => Author::all()]);
    }
    public function store(Request $request) {
    $request->validate([
    'title' => 'required',
    'author_id' => 'required',
    'year' => 'required',
    'genre' => 'required'
    ]);


Book::create($request->all());
return redirect()->route('books.index');
}

    public function edit(Book $book) {
    return view('books.edit', ['book' => $book, 'authors' => Author::all()]);
    }


    public function update(Request $request, Book $book) {
    $request->validate([
    'title' => 'required',
    'author_id' => 'required'
    ]);


    $book->update($request->all());
    return redirect()->route('books.index');
    }


    public function destroy(Book $book) {
    $book->delete();
    return redirect()->route('books.index');
    }


}