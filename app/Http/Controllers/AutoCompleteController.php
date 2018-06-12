<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    public function sampleForm(){
        return view('autocomplete');
     }
    public function typeahead(Request $request){
            $query = $request->get('term','');        
            $books=Product::where('title','LIKE','%'.$query.'%')->get();        
            return response()->json($books);
    }
}
