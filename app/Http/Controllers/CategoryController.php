<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

use App\Category;
use App\Book;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->paginate(10);
        
        if($request->ajax()){
            return view('category.load',['categories'=>$categories])->render();
        }
        return view('category.index', compact('categories'));
    }
    public function show(Category $category){
        return view('category.show',compact('category'));
    }
    public function create()
    {
        return view('category/create');
    }
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        return redirect()->route('categories.index');
    }
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }

    
    public function books(Request $request, Category $category){

        $books = Book::join('categories_books','categories_books.book_id','=','books.id')
                        ->join('categories','categories.id','=','categories_books.category_id')
                        ->select('books.id','books.title')
                        ->where('categories.id','=',$category->id)
                        ->orderBy('title')
                        ->paginate(10);
        if($request->ajax()){
            return view('category.booksload',['books'=>$books])->render();
        }
        return view('category.books', compact('books','category'));

    }
}
