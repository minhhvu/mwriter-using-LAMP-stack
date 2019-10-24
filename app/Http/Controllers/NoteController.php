<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookUser;
use App\Note;
use App\Repositories\BookRepository;
use App\Repositories\NoteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @param int bookId;
     * @return \Illuminate\Http\Response
     */
    public function index(int $bookUserId)
    {
        //Read all notes from table notes
        $notes = (new NoteRepository())->getNotes($bookUserId);
        $book = (new BookRepository())->getBookFromBookUserId($bookUserId);
        return view('note')->with(
            [
                'notes' => $notes,
                'book' => $book,
                'bookUserId' => $bookUserId]);
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
        //Validate the note context with 100 characters at least
//        $this->validate($request, ['noteContent' => 'required|min:100']);
        $validator = Validator::make($request->all(),['noteContent' => 'required|min:10']);

        if ($validator->fails()){
            return redirect($_SERVER['HTTP_REFERER'])->withErrors($validator)->withInput();
        };

        //When validate successfully
        $note = new Note();
        $note->imageFileName = '';
        if ($request->hasFile('noteFile')){
            $file = $request->file('noteFile');
            $newFileName = time().$file->getClientOriginalName();
            $path = $file->storeAs('public', $newFileName);
            $note->imageFileName = $newFileName;
        }

        $note->content = $request->input('noteContent');
        $note->book_user_id = $request->input('book-user-id');
        $note->save();

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
