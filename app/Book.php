<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        'title','isbn','publ_date','publ_house','description'
    ];

    public function authors(){
        return $this->belongsToMany(Author::class,'authors_books','book_id','author_id')->withTimestamps();
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'categories_books','book_id','category_id')->withTimestamps();
    }

    // public function store(){
    //     return $this->belongsToMany(Store::class,'book_id','id');
    // }

    // public function delete(){

    // }
}
