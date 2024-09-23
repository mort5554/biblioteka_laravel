@extends('layouts.layout')

@section('title', 'Edytuj Książkę')

@section('content')
<main class="m-5">
    <h1>Dodaj książkę</h1>
    @if($errors->all())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <table class="table mt-5">
        <thead>
            <th>Nazwa</th>
            <th>Rok wydania</th>
            <th>Miejsce wydania</th>
            <th>Liczba stron</th>
            <th>Cena</th>
            @isset($book->isbn)
                <th>Numer Isbn</th>
                <th>Numer Isbn wydany przez</th>
                <th>Data wydania</th>
            @endisset
        </thead>
        <tr>
            <form action="{{ route('books.update', $book) }}" method="POST">
                @csrf
                @method('PUT')
                <td><input type="text" name="name" class="p-1" value="{{ $book->name }}" required></td>
                <td><input type="text" name="year" class="p-1" value="{{ $book->year }}" required></td>
                <td><input type="text" name="publication_place" class="p-1" value="{{ $book->publication_place }}" required></td>
                <td><input type="number" name="pages" class="p-1" value="{{ $book->pages }}" required></td>
                <td><input type="number" name="price" class="p-1" step="0.01" value="{{ $book->price }}" required></td>

                @isset($book->isbn)
                    <td><input type="number" name="number" class="p-1" value="{{ $book->isbn->number }}" required></td>
                    <td><input type="text" name="issued_by" class="p-1" value="{{ $book->isbn->issued_by }}" required></td>
                    <td><input type="date" name="issued_on" class="p-1" value="{{ $book->isbn->issued_on }}" required></td>
                @endisset

                <input type="submit" class="btn btn-primary" value="Dodaj" name="create">
            </form>
        </tr>
    </table>
</main>

@endsection
