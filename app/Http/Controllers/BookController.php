<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    function index()
{
    $books = Book::all(); 
    return view('books.index', ['books' => $books]);
}
function create()
    {
        $categories = Category::all();
        return view("books.create", [
            'categories' => $categories
        ]);
    }
    function store(StoreBookRequest $request)
{
    $book = Book::create([
        'name' => $request->input('name'),
        'price' => $request->input('price'),
        'description' => $request->input('description'),
        'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'cat_id'=>$request->cat_id
    ]);
    // Storing the image using image_path
$book->image_path = $request->file('image_path')->store('path/to/store/images');

    return redirect()->route('books.index');
}
function show( $book)
    {
        $book = Book::findOrFail($book);
        return view('books.show', ["book" => $book]);
    }
    function edit(Book $book)
{
    return view('books.edit', compact('book'));
}
function update(UpdateBookRequest $request, Book $book)
{
    $book->image_path = $request->file('image_path')->store('path/to/store/images');

    $book->update([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    return redirect()->route('books.index');
}

public function destroy(Book $book)
{
    $book->delete();

    return redirect()->route('books.index');
}

}
