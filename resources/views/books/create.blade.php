@extends('layouts.layout')

@section('title', 'Książki')

@section('content')
<main class="m-5">
    <h1>Dodaj książkę</h1>

    <x-alert-errors />

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Nazwa książki</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="">Rok wydania</label>
            <input type="text" name="year" class="form-control" value="{{ old('year') }}" required>
        </div>
        <div class="form-group">
            <label for="">Miejsce publikacji</label>
            <input type="text" name="publication_place" class="form-control" value="{{ old('publication_place') }}" required>
        </div>
        <div class="form-group">
            <label for="">Ilość stron</label>
            <input type="number" name="pages" class="form-control" value="{{ old('pages') }}" required>
        </div>
        <div class="form-group">
            <label for="">Autor</label>
            <select class="form-control" name="author_id[]" multiple>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">
                        {{ $author->firstname}} {{ $author->lastname }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Cena</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price') }}" required>
        </div>

        <input type="submit" class="btn btn-primary mt-5" value="Dodaj" name="create">
    </form>

</main>

@endsection
