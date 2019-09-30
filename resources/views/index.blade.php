@extends('layouts.index')

@section('main')
    <div>TRACK YOUR JOURNEY OF READING BOOKS</div>
    <div>Choose any book from Libray and then add, edit or write notes on your digital bookshelf.</div>
    <form action="search" method="GET">
        <input placeholder="Search a book">
    </form>
@endsection