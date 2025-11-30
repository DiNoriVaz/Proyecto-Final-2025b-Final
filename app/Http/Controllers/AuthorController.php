<?php
namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;


class AuthorController extends Controller {
public function index() {
return view('authors.index', ['authors' => Author::all()]);
}


public function create() {
return view('authors.create');
}

public function store(Request $request) {
$request->validate(['name' => 'required']);
Author::create($request->all());
return redirect()->route('authors.index');
}


public function edit(Author $author) {
return view('authors.edit', compact('author'));
}


public function update(Request $request, Author $author) {
$request->validate(['name' => 'required']);
$author->update($request->all());
return redirect()->route('authors.index');
}


public function destroy(Author $author) {
$author->delete();
return redirect()->route('authors.index');
}

}