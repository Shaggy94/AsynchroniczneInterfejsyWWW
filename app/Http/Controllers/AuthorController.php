<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use App\Author;
use App\Book;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $authors = Author::orderBy('last_name')->paginate(10);
        
        if($request->ajax()){
            return view('author.load',['authors'=>$authors])->render();
        }
        return view('author.index', compact('authors'));
    }
    public function show(Author $author){
        return view('author.show',compact('author'));
    }

    public function create()
    {
        return view('author/create');
    }
    public function store(AuthorRequest $request)
    {
        Author::create($request->all());

        return redirect()->route('authors.index');
    }
    public function edit(Author $author)
    {
        return view('author.edit',compact('author'));
    }
    public function update(Request $request, Author $author)
    {
        $author->update($request->all());
        return redirect()->route('authors.index');
    }
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index');
    }

    public function books(Request $request, Author $author){

        $books = Book::join('authors_books','authors_books.book_id','=','books.id')
                        ->join('authors','authors.id','=','authors_books.author_id')
                        ->select('books.id','books.title')
                        ->where('authors.id','=',$author->id)
                        ->orderBy('title')
                        ->paginate(10);
        if($request->ajax()){
            return view('author.booksload',['books'=>$books])->render();
        }
        return view('author.books', compact('books','author'));

    }
}
