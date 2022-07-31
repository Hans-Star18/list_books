@extends('layouts.main')

@section('content')
    <div class="container">
        <form action="" method="get">
            <input type="hidden" name="author" value="{{ request('author') }}">
            <input type="hidden" name="title" value="{{ request('title') }}">
            <input type="hidden" name="rating" value="{{ request('rating') }}">
            <input type="hidden" name="book_id" value="{{ request('book_id') }}">
            <span>Book Author : </span>
            <div class="dropdown d-inline">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ request('author') ? request('author') : 'Select Authors' }}
                </button>
                <ul class="dropdown-menu">
                    @foreach ($authors as $author)
                        @if (request('title') && request('rating'))
                            <li>
                                <a class="dropdown-item"
                                    href="?author={{ $author->author_name }}&title={{ request('title') }}&book_id={{ request('book_id') }}&rating={{ request('rating') }}">{{ $author->author_name }}</a>
                            </li>
                        @elseif (request('title'))
                            <li><a class="dropdown-item"
                                    href="?author={{ $author->author_name }}&title={{ request('title') }}&book_id={{ request('book_id') }}">{{ $author->author_name }}</a>
                            </li>
                        @elseif (request('rating'))
                            <li><a class="dropdown-item"
                                    href="?author={{ $author->author_name }}&rating={{ request('rating') }}">{{ $author->author_name }}</a>
                            </li>
                        @else
                            <li><a class="dropdown-item"
                                    href="?author={{ $author->author_name }}">{{ $author->author_name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div><br><br>
            <span>Book Name : </span>
            <div class="dropdown d-inline">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ request('title') ? request('title') : 'Select Books' }}
                </button>
                <ul class="dropdown-menu">
                    @foreach ($books as $book)
                        @if (request('author') && request('rating'))
                            <li>
                                <a class="dropdown-item"
                                    href="?author={{ request('author') }}&title={{ $book->title }}&book_id={{ $book->id }}&rating={{ request('rating') }}">{{ $book->title }}</a>
                            </li>
                        @elseif (request('author'))
                            <li><a class="dropdown-item"
                                    href="?author={{ request('author') }}&title={{ $book->title }}&book_id={{ $book->id }}">{{ $book->title }}</a>
                            </li>
                        @elseif (request('rating'))
                            <li><a class="dropdown-item"
                                    href="?title={{ $book->title }}&book_id={{ $book->id }}&rating={{ request('rating') }}">{{ $book->title }}</a>
                            </li>
                        @else
                            <li><a class="dropdown-item"
                                    href="?title={{ $book->title }}&book_id={{ $book->id }}">{{ $book->title }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div><br><br>
            <span>Rating : </span>
            <div class="dropdown d-inline">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ request('rating') ? request('rating') : 'Select Ratings' }}
                </button>
                <ul class="dropdown-menu">
                    @foreach ($ratings as $rating)
                        @if (request('author') && request('title'))
                            <li>
                                <a class="dropdown-item"
                                    href="?author={{ request('author') }}&title={{ request('title') }}&book_id={{ request('book_id') }}&rating={{ $rating }}">{{ $rating }}</a>
                            </li>
                        @elseif (request('author'))
                            <li><a class="dropdown-item"
                                    href="?author={{ request('author') }}&rating={{ $rating }}">{{ $rating }}</a>
                            </li>
                        @elseif (request('title'))
                            <li><a class="dropdown-item"
                                    href="?title={{ request('title') }}&book_id={{ request('book_id') }}&rating={{ $rating }}">{{ $rating }}</a>
                            </li>
                        @else
                            <li><a class="dropdown-item" href="?rating={{ $rating }}">{{ $rating }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div><br><br>
            <input type="submit" value="Submit" name="button_submit">
        </form>
    </div>
@endsection
