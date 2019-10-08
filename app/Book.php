<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=['googleID', 'title', 'description', 'coverLink', 'previewLink', 'publishDate', 'authors', 'textSnippet'];
}
