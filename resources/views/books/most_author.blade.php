@extends('layouts.main')

@section('content')
    <div class="container">
        <h3>Top 10 Most Famous Author</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Voter</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $book['author'] }}</td>
                        <td>{{ $book['total_voter'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
