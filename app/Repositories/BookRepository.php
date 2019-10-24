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

    public function classifyBooksIntoShelves($books){
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
        return $result;
    }

    //Insert the googleBook object into Book table database
    public function addBookIntoBookTable($googleBook){
        $book = new Book();
        $book->googleId = $googleBook->id;
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
        };

    }

    //Insert a new record of BookUser table
    public function attachBookUser($userId, $googleBookId){
        //Add the book into the wishlist bookshelf of the user if it is new book for the user
        $book = Book::where('googleId', '=',$googleBookId)->first();

        if (0==count(BookUser::where('book_id', $book->id)->where('user_id', $userId)->get())) {
            $book->users()->attach($userId, ['bookshelf_type_id' => 4]);
        }
    }

}