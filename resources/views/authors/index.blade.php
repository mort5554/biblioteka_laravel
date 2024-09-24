@extends('layouts.layout')

@section('title', 'Autorzy')

@section('content')
<main class="m-5">

    @session('message')
        <div class="alert alert-info m-3 text-center" role="alert">
            {{ session('message') }}
        </div>
    @endsession

    <table class="table">
        <thead>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Urodziny</th>
            <th>Gatunki</th>
            <th>Szczegóły</th>
        </thead>
        @forelse ($authorList as $author)
            <tr>
                <td>{{ $author->firstname }}</td>
                <td>{{ $author->lastname }}</td>
                <td>{{ $author->birthday }}</td>
                <td>{{ $author->genres }}</td>
                <td>
                    <a href="{{ route('authors.show', $author->id) }}" class="btn btn-primary">
                        Pokaż
                    </a>
                </td>
            </tr>
            @empty
                <h1>Brak rekordów!</h1>
        @endforelse
    </table>
</main>

@endsection
