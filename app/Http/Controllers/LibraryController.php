<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Helper\GoogleBooksApi;
use Illuminate\View\View;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index')->with('background_color','none');
    }

    /**
     * Display the search request
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $books=[];
        $keywords='';
        if ($request->input('search') !== null){
            $keywords = $request->input('search');

            //Retrieve data from Google Book API request
            $query = new GoogleBooksApi;
            $query->setSearch($keywords);
            $books = $query->allBooks();


        };
        return view('search')->with(['keywords' =>$keywords, 'books' => $books]);
    }

    /**
     * Display the book detail
     * @param string
     * @return
     */

    public function book($id){
        //Retrieve data from Google Book Api
        $query = new GoogleBooksApi();
        $book = $query->getBook($id);

        return view('book_detail')->with('book',$book);
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
        //
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
