<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Book;
use App\Models\Author;
use App\Models\User;

class BookController extends Controller {
public function index() {
return view('books.index', ['books' => Book::with('author')->get()]);
}
public function create() {
return view('books.create', ['authors' => Author::all()]);
}

}