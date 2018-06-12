<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Message;
use Illuminate\Support\Facades\DB;
use App\Store;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->hasAnyRoles(['Admin', 'User']);
        return view('home');
    }
    public function adminindex(){
        return view('admin.index');
    }
    public function adminusers(Request $request){
        $users = User::paginate(10);
        
        if($request->ajax()){
            return view('admin.load',['users'=>$users])->render();
        }
        return view('admin.users', compact('users'));
    }
    public function ban(User $user){
        DB::table('users_roles')->where('user_id',$user->id)->update(['role_id'=>3]);
        return redirect()->route('admin.users');
    }
    public function unban(User $user){
        DB::table('users_roles')->where('user_id',$user->id)->update(['role_id'=>2]);
        return redirect()->route('admin.users');
    }
    public function adminmessages(){
        $messages = Message::where('message_receiver_id',Auth::user()->id)
                            ->where('message_id',null)
                            ->orderBy('updated_at')
                            ->get();
        return view('account.mymessages',compact('messages'));
    }
    public function messagestree(Message $message){
        $messages = Message::where('message_id',$message->id)->get();
        return view('admin.messagestree',compact('messages','message'));
    }
    public function answer(Request $request)
    {
        $message = new Message();
        $message->message_id=$request->message_id;
        $message->message_author_id=Auth::user()->id;
        $message->message_receiver_id=$request->author_id;
        $message->message=$request->message;
        $message->status=1;
        $message->save();

        DB::table('messages')->where('id',$request->message_id)->update(['status'=>1]);
        return redirect()->route('admin.messages');
    }
    public function adminstore(Request $request){
        $books = Store::join('books','books.id','=','stores.book_id')
                        ->select('books.title','stores.books_count')
                        ->orderBy('title')
                        ->paginate(10);

                        if($request->ajax()){
                            return view('admin.loadstorage',['books'=>$books])->render();
                        }
        return view('admin.storage',compact('books'));
    }
}
