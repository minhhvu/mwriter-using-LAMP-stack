<?php

namespace App\Http\Controllers;

use App\BookUser;
use App\Repositories\BookRepository;
use App\User;
use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Auth;

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
        //Read data of books for user
        $bookRes = new BookRepository();
        //Classify books into different shelves
        $books = $bookRes->getBooksOfUser(Auth::user()->id);
        $books = $bookRes->classifyBooksIntoShelves($books);

        return view('bookshelf')->with([
            'readingBooks' => $books['readingBooks'],
            'completedBooks' => $books['completedBooks'],
            'planningBooks' => $books['planningBooks'],
            'wishlistBooks' => $books['wishlistBooks'],
        ]);
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
        if ($request->has('book')){
            //Insert the book detail into the table Book
            $googleBook = json_decode($request->input('book'));
            $bookRes = new BookRepository();
            $bookRes->addBookIntoBookTable($googleBook);

            //Mark the book as the wishlist book of the user
            $bookRes->attachBookUser(Auth::user()->id, $googleBook->id);
        }

        return redirect($_SERVER['HTTP_REFERER']);
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
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->has('bookId') and $request->has('bookshelfTypeId')){
            $book_id = $request->input('bookId');
            $bookshelf_id = $request->input('bookshelfTypeId');
            $book = Book::find($book_id);
            $book->users()->updateExistingPivot(Auth::user()->id, ['bookshelf_type_id' => $bookshelf_id]);
        };

        return redirect('/bookshelf');
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
