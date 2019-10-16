<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function index(int $bookId)
    {
        //Read all notes from table notes
        $userId = Auth::user()->id;
        $notes = Note::where('book_id', $bookId)->where('user_id', $userId)->get();
        return view('note')->with(
            [
                'notes' => $notes,
                'bookId' => $bookId]);
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
//        $this->validate($request, ['note-content' => 'required|min:100']);
        $validator = Validator::make($request->all(),['note-content' => 'required|min:10']);

        if ($validator->fails()){
            return redirect($_SERVER['HTTP_REFERER'])->withErrors($validator)->withInput();
        };

        $note = new Note();
        //When validate successfully
        $note->content = $request->input('note-content');
        $note->book_id = $request->input('book-id');
        $note->user_id = Auth::user()->id;
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
