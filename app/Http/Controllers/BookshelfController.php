<?php

namespace App\Http\Controllers;

use App\BookUser;
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
        $books = User::find(Auth::user()->id)->books;
        //Classify books into different shelves
        $readingBooks =[];
        $completedBooks =[];
        $planningBooks =[];
        $wishlistBooks =[];
        foreach ($books as $item){
            switch ($item->pivot->bookshelf_type_id){
                case 1:
                    $readingBooks[] = $item;
                    break;
                case 2:
                    $completedBooks[] = $item;
                    break;
                case 3:
                    $planningBooks[] = $item;
                    break;
                default:
                    $wishlistBooks[] = $item;
            }
        }
        return view('bookshelf')->with([
            'readingBooks' => $readingBooks,
            'completedBooks' => $completedBooks,
            'planningBooks' => $planningBooks,
            'wishlistBooks' => $wishlistBooks
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
//        $validator = Validator::make($request->all(),[
//            'googleBook' => 'required'
//        ]);
//
//        if ($validator->fails()){
//            return ;
//        }
//        var_dump('not good');
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
//                var_dump('Good');
            };

            //Add the book into the wishlist bookshelf of the user if it is new book for the user
            $userId = Auth::user()->id;
            $book = Book::where('googleId', '=',$book->googleId)->first();

            //In case book has been not added to the user's bookshelf
            if (0==count(BookUser::where('book_id', $book->id)->where('user_id', $userId)->get())) {
                $book->users()->attach($userId, ['bookshelf_type_id' => 4]);
            }

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
