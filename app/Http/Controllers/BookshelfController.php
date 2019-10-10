<?php

namespace App\Http\Controllers;

use App\BookshelfTypes;
use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookshelfController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
//        dd(request());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = new \App\Http\Controllers\Helper\GoogleBooksApi();
        $books->setSearch('walden', 9);
        $books = $books->allBooks();
        return view('bookshelf')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $validator = Validator::make($request->all(),[
//            'googleBook' => 'required'
//        ]);
//
//        if ($validator->fails()){
//            return ;
//        }
        var_dump('not good');
        if ($request->has('book')){
            //Insert the book detail into the table Book

            $googleBook = json_decode($request->input('book'));
            $book = new Book();
            $book->googleId = $googleBook->id;
//            if (!DB::table('books')->where('googleId', '=',$book->googleId)->first()){
            if(0 == Book::where('googleId', '=',$book->googleId)->count()){
                //Only add the new book
                $book->title = $googleBook->title;
                $book->authors = implode(' ',$googleBook->authors);
                $book->publishDate = (int) $googleBook->publishDate;
                $book->coverLink = $googleBook->coverLink;
                $book->description = $googleBook->description;
                $book->previewLink = $googleBook->previewLink;
                $book->textSnippet = $googleBook->textSnippet;
                $book->save();
                var_dump('Good');
            };

            //Add the book into the wishlist bookshelf of the user
            $userId = Auth::user()->id;
            $bookId = Book::where('googleId', '=',$book->googleId)->first()->id;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
