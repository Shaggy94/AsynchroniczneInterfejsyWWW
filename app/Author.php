<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    protected $fillable = [
        'first_name','last_name','description'
    ];

    public function books(){
        return $this->belongsToMany(Book::class,'authors_books','author_id','book_id')->withTimestamps();
    }
}
