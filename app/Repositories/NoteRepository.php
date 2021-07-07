<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Note;

/**
 * Class NoteRepository.
 */
class NoteRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Note::class;
    }

    public function getNotesByBookUserId( $bookUserId ){
        return Note::where('book_user_id', $bookUserId)->get();
    }
}
