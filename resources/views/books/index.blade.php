@extends('layouts.layout')

@section('title', 'Książki')

@section('content')
<main class="m-5">
    @session('message')
        <div class="alert alert-info m-3 text-center" role="alert">
            {{ session('message') }}
        </div>
    @endsession
    <table class="table">
        <thead>
            <th>Nazwa</th>
            <th>Rok wydania</th>
            <th>Miejsce wydania</th>
            <th>Podgląd</th>
            <th>Edycja</th>
            <th>Usuwanie</th>
        </thead>
        @forelse ($bookList as $book)
            <tr>
                <td>{{ $book->name }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->publication_place }}</td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">
                        Pokaż
                    </a>
                </td>
                <td>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-secondary">
                        Edytuj
                    </a>
                </td>
                <td class="text-start">
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" name="delete" class="btn btn-danger" value="Usuń">
                    </form>
                </td>
            </tr>
            @empty
                <h1>Brak rekordów!</h1>
        @endforelse
    </table>
</main>

@endsection
