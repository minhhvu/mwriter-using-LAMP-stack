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
        $result =[];
        $result['readingBooks'] =[];
        $result['completedBooks'] =[];
        $result['planningBooks'] =[];
        $result['wishlistBooks'] =[];
        foreach ($books as $item){
            switch ($item->pivot->bookshelf_type_id){
                case 1:
                    $result['readingBooks'][] = $item;
                    break;
                case 2:
                    $result['completedBooks'][] = $item;
                    break;
                case 3:
                    $result['planningBooks'][] = $item;
                    break;
                default:
                    $result['wishlistBooks'][] = $item;
            }
        }

        return view('bookshelf')->with([
            'readingBooks' => $result['readingBooks'],
            'completedBooks' => $result['completedBooks'],
            'planningBooks' => $result['planningBooks'],
            'wishlistBooks' => $result['wishlistBooks'],
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
            $userId = Auth::user()->id;
            $googleBook = json_decode($request->input('book'));

            //Insert the book detail into the table Book
            $bookRes = new BookRepository();
            $book = $bookRes->getBookByGoogleBookId($googleBook->id);
            if (!isset($book)) //Only add the non-existing book on Book table
                $bookRes->addBookIntoBookTable($googleBook);

            //Add the book as the wishlist book of the user if not existing
            $book = $bookRes->getBookByGoogleBookId($googleBook->id);
            if (!$bookRes->hasBookUser($book, $userId)){
                $bookRes->insertRecordIntoBookUser($book, $userId, 4);
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
