<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable=['googleID', 'title', 'description', 'coverLink', 'previewLink', 'publishDate', 'authors', 'textSnippet'];
}
