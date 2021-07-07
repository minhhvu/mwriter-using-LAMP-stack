<?php
/**
 * Created by PhpStorm.
 * User: minhh
 * Date: 2019-10-23
 * Time: 10:48 PM
 */

namespace App\Repositories;

use App\Note;


class NoteRepository
{
    //Get all notes from book_user_id
    public function getNotes($bookUserId){
        return Note::where('book_user_id', $bookUserId)->get();
    }
}