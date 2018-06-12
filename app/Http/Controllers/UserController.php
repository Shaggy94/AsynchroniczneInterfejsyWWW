<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Auth;
use App\User;
use App\Http\Requests\SupportRequest;
use App\Message;
use Illuminate\Support\Facades\DB;



class UserController extends Controller
{
    public function index(){
        $user = User::where('id',Auth::user()->id)->get();
        return view('account.index',compact('user'));
    }


    public function userbooks(){        
        $list = Order::join('books','books.id','=','orders.book_id')
                ->select('orders.id','books.id as book_id','books.title','orders.order_date','orders.return_date')
                ->where('orders.user_id','=',Auth::user()->id)
                ->where('return_date','=',null)
                ->orderBy('orders.order_date')->get();
        // echo $list;
        return view('account.books',compact('list'));
    }
    
    public function userhistory(){        
        $list = Order::join('books','books.id','=','orders.book_id')
                ->select('orders.id','books.id as book_id','books.title','orders.order_date','orders.return_date')
                ->where('orders.user_id','=',Auth::user()->id)
                ->orderBy('orders.order_date')->get();
        
        return view('account.history',compact('list'));
    }
    public function create(){
        return view('account.create');
    }
    public function store(SupportRequest $request)
    {
        $message = new Message();
        $message->message_id=null;
        $message->message_author_id=Auth::user()->id;
        $message->message_receiver_id=1;
        $message->message=$request->message;
        $message->topic=$request->topic;
        $message->status=0;
        $message->save();
        return redirect()->route('home');
    }
    public function answer(Request $request)
    {
        $message = new Message();
        $message->message_id=$request->message_id;
        $message->message_author_id=Auth::user()->id;
        $message->message_receiver_id=1;
        $message->message=$request->message;
        $message->status=0;
        $message->save();
        DB::table('messages')->where('id',$request->message_id)->update(['status'=>0]);

        return redirect()->route('home');
    }


    public function messages(){
        $messages = Message::where('message_author_id',Auth::user()->id)
                            ->where('message_id',null)
                            ->orderBy('updated_at')
                            ->get();
        return view('account.mymessages',compact('messages'));
    }
    public function messagestree(Message $message){
        $messages = Message::where('message_id',$message->id)->get();

        return view('account.messagestree',compact('messages','message'));
    }
}
