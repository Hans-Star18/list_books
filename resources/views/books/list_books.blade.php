@extends('layouts.main')

@section('content')
    <div class="container">
        <span>List Shown :</span>
        <div class="dropdown d-inline mb-2">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ request('shown') ? request('shown') : 10 }}
            </button>
            <ul class="dropdown-menu">
                @if (request('search'))
                    <li><a class="dropdown-item" href="?shown=10&&search={{ request('search') }}">10</a></li>
                    <li><a class="dropdown-item" href="?shown=25&&search={{ request('search') }}">25</a></li>
                    <li><a class="dropdown-item" href="?shown=50&&search={{ request('search') }}">50</a></li>
                    <li><a class="dropdown-item" href="?shown=75&&search={{ request('search') }}">75</a></li>
                    <li><a class="dropdown-item" href="?shown=100&&search={{ request('search') }}">100</a></li>
                @else
                    <li><a class="dropdown-item" href="?shown=10">10</a></li>
                    <li><a class="dropdown-item" href="?shown=25">25</a></li>
                    <li><a class="dropdown-item" href="?shown=50">50</a></li>
                    <li><a class="dropdown-item" href="?shown=75">75</a></li>
                    <li><a class="dropdown-item" href="?shown=100">100</a></li>
                @endif
            </ul>
        </div>
        @if (request('shown'))
            <form onsubmit="location.href=`/?shown={{ request('shown') }}&&search=${$('.search').val()}`;return false"
                class="search_form">
            @else
                <form onsubmit="location.href=`/?search=${$('.search').val()}`;return false" class="search_form">
        @endif
        <span>Search : </span> <input type="text" name="search" placeholder="search..." value="{{ request('search') }}"
            class="search">
        <input type="submit" value="Submit">

        <p class="mt-2">result : {{ $books->count() }}</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Average Rating</th>
                    <th scope="col">Voter</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $book['title'] }}</td>
                        <td>{{ $book['category'] }}</td>
                        <td>{{ $book['author'] }}</td>
                        <td>{{ $book['average_rating'] }}</td>
                        <td>{{ $book['total_voter'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
