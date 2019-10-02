<?php
/**
 * Created by PhpStorm.
 * User: minhh
 * Date: 2019-10-01
 * Time: 9:39 AM
 */

namespace App\Http\Controllers\Helper;

class GoogleBook{
    public $id, $title, $description, $coverLink, $previewLink, $publishDate, $authors, $textSnippet;
}


class GoogleBooksApi
{
    private $key = 'AIzaSyD4uYkk7VoLh0hxVfNxstg0wVtP3H9UiYw';
    public $maxResults;
    public $keywords;
    private $query;
    private $array;

//    private const MAX_RESULTS = 15;

    public function __construct($keywords, $maxResults= 15){
        $this->keywords = urlencode($keywords);
        $this->maxResults = $maxResults;
        $query = 'https://www.googleapis.com/books/v1/volumes?q='.$this->keywords.'&maxResults='.(string) $this->maxResults.'&key='.$this->key;
        $this->query = $query;
        $json = json_decode(file_get_contents($this->query), true);
        $this->array = $json['items'];
    }

    //Return the api request and return the array of items
    public function allBooks(){
        $result = [];
        foreach ($this->array as $item){
            //Read book information into an object
            $x = new GoogleBook();
            $x->id = $item['id'];
            $x->title = $item['volumeInfo']['title'].', '.(isset($item['volumeInfo']['subtitle'])?$item['volumeInfo']['subtitle']:'');
            $x->authors = isset($item['volumeInfo']['authors'])? $item['volumeInfo']['authors']: ['Unknown'];
            $x->publishDate = isset($item['volumeInfo']['publishedDate']) ? $item['volumeInfo']['publishedDate'] : 'Unknown';
            $x->coverLink = isset($item['volumeInfo']['imageLinks']['thumbnail'])?$item['volumeInfo']['imageLinks']['thumbnail']: 'https://www.google.com/googlebooks/images/no_cover_thumb.gif';
            $x->description = isset($item['volumeInfo']['description'])? $item['volumeInfo']['description']: '';
            $x->previewLink = isset($item['volumeInfo']['previewLink'])? $item['volumeInfo']['previewLink']: 'Not available';
            $x->textSnippet = isset($item['searchInfo']['textSnippet'])?$item['searchInfo']['textSnippet']:'';
            $result[] = $x;
        }
        return $result;
    }

    public static function getBookAsString(GoogleBook $item){
        return $item->title.'<br>'.'wrote by '.$item->authors[0].'<br>'.
            $item->textSnippet.'<br><br>';
    }

}