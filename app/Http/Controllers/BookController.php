<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Book;
use App\Category;
use App\Author;
use App\Order;
use App\Store;
use Auth;
// use App\DB;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    // protected $books;
    // public function __construct(){
    //     $this->books = $books;
    // }
    public function index(Request $request)
    {
        $books = Book::orderBy('title')->paginate(10);
        
        if($request->ajax()){
            return view('book.load',['books'=>$books])->render();
        }
        return view('book.index', compact('books'));
    }
    public function show(Book $book)
    {
        $categories = Category::join('categories_books','categories_books.category_id','=','categories.id')
                        ->join('books','books.id','=','categories_books.book_id')
                        ->select('categories.name')->where('books.id','=',$book->id)
                        ->get();

        // echo $categories;
        $authors = Author::join('authors_books','authors_books.author_id','=','authors.id')
                        ->join('books','books.id','=','authors_books.book_id')
                        ->select('authors.first_name','authors.last_name')->where('books.id','=',$book->id)->get();
        return view('book.show',compact('book','categories','authors'));
    }
    public function create()
    {
        $categories = Category::pluck('name','id');
        $categories->all();

        $authors = Author::select(
            DB::raw("CONCAT(first_name,' ',last_name) AS name"),'id')
            ->pluck('name', 'id');

        return view('book/create',compact('authors','categories'));
    }
    public function store(BookRequest $request)
    {
        $book= new Book();
        $book->title=$request->title;
        $book->isbn=$request->isbn;
        $book->publ_date=$request->publ_date;
        $book->publ_house=$request->publ_house;
        $book->description=$request->description;
        $book->save();

        $authors_id = $request->get('authors_id');
        foreach($authors_id as $author_id){
            $book->authors()->attach($author_id);
        }

        $categories_id = $request->get('categories_id');
        foreach($categories_id as $category_id){
            $book->categories()->attach($category_id);
        }

        return redirect()->route('books.index');
    }
    public function edit(Book $book)
    {
        $authors = Author::select(
            DB::raw("CONCAT(first_name,' ',last_name) AS name"),'id')
            ->pluck('name', 'id');

        $categories = Category::pluck('name','id');
        $categories->all();
        return view('book.edit',compact('book','categories','authors'));
    }
    public function update(Request $request, Book $book)
    {

        //do poprawy
        $book->update($request->all());
        return redirect()->route('books.index');
    }
    public function destroy(Book $book)
    {
        $book->authors()->detach($book->id);
        $book->categories()->detach($book->id);
        $book->delete();
        return redirect()->route('books.index');
    }
    public function take(Book $book){
        $store = Store::where('book_id','=',$book->id)->first();
        return view('book.order',compact('book','store'));

    }
    public function takeit(Book $book){
        $order = new Order();
        $order->user_id=Auth::user()->id;
        $order->book_id=$book->id;
        $order->order_date=date('y-m-d');
        $order->save();
        Store::where('book_id','=',$book->id)->decrement('books_count');

        return view('book.ordersuccess');
    }
    public function returnbook($book,$order){
    echo $book.'<br>'.$order;
        Order::where('id',$order)->update(['return_date'=>date('y-m-d')]);
        Store::where('book_id','=',$book)->increment('books_count');
        return redirect()->route('account.orders');

    }
    
}
