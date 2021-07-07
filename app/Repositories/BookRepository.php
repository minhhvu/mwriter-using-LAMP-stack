<?php
/**
 * Created by PhpStorm.
 * User: minhh
 * Date: 2019-10-23
 * Time: 10:14 PM
 */

namespace App\Repositories;


use App\Book;
use App\User;
use App\BookUser;

class BookRepository
{
    public function getBooksOfUser($userId){
        $books = User::find($userId)->books;
        return $books;
    }


    public function getBookFromBookUserId($bookUserId){
        $book = BookUser::find($bookUserId);
        $book = Book::find($book->book_id);
        return $book;
    }

    //Insert the googleBook object into Book table database
    public function addBookIntoBookTable($googleBook){
        $book = new Book();
        $book->googleId = $googleBook->id;
        $book->title = $googleBook->title;
        $book->authors = implode(' ',$googleBook->authors);
        $book->publishDate = (int) $googleBook->publishDate;
        $book->coverLink = $googleBook->coverLink;
        $book->description = $googleBook->description;
        $book->previewLink = $googleBook->previewLink;
        $book->textSnippet = $googleBook->textSnippet;

        return $book->save();

    }

    public function getBookByGoogleBookId($googleBookId){
        return Book::where('googleId', '=',$googleBookId)->first();
    }

    public function hasBookUser($bookId, $userId){
        if (0 == count(BookUser::where('book_id', $bookId)->where('user_id', $userId)->get()))
            return false;
        else
            return true;
    }

    public function insertRecordIntoBookUser($book, $userId, $bookShelfTypeId){
        return $book->users()->attach($userId, ['bookshelf_type_id' => $bookShelfTypeId]);
    }

}