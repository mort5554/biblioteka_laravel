@extends('layouts.layout')

@section('title', 'Wypożyczenia')

@section('content')
<main class="m-5">
    @session('message')
        <div class="alert alert-info m-3 text-center" role="alert">
            {{ session('message') }}
        </div>
    @endsession
    <table class="table">
        <thead>
            <th>Nazwa książki</th>
            <th>Klient</th>
            <th>Data wypożyczenia</th>
            <th>Przewidywana data zwrotu</th>
            <th>Data zwrotu</th>
            <th>Szczegóły</th>
        </thead>
        @forelse ($loansList as $loan)
            <tr>
                <td>{{ $loan->book->name }}</td>
                <td>{{ $loan->client }}</td>
                <td>{{ $loan->loaned_on }}</td>
                <td>{{ $loan->estimated_on }}</td>
                <td>{{ $loan->returned_on }}</td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">
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
