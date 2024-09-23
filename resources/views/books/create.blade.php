@extends('layouts.layout')

@section('title', 'Książki')

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
        </thead>
        <tr>
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                @method('POST')
                <td><input type="text" name="name" class="p-1" value="{{ old('name') }}" required></td>
                <td><input type="text" name="year" class="p-1" value="{{ old('year') }}" required></td>
                <td><input type="text" name="publication_place" class="p-1" value="{{ old('publication_place') }}" required></td>
                <td><input type="number" name="pages" class="p-1" value="{{ old('pages') }}" required></td>
                <td><input type="number" name="price" class="p-1" step="0.01" value="{{ old('price') }}" required></td>


                <input type="submit" class="btn btn-primary" value="Dodaj" name="create">
            </form>
        </tr>
    </table>
</main>

@endsection
