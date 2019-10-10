<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=['googleID', 'title', 'description', 'coverLink', 'previewLink', 'publishDate', 'authors', 'textSnippet'];
    public function users(){
        return $this->belongsToMany('App\User', 'book_user', 'book_id', 'user_id')->withPivot('bookshelf_type_id');
    }
}
