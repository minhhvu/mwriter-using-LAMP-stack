<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Book;
use App\BookUser;

/**
 * Class BookRepository.
 */
class BookRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Book::class;
    }

    public function getBookByBookUserId($bookUserId){
        $book = BookUser::find($bookUserId);
        $book = Book::find($book->book_id);

        return $book;
    }
}
