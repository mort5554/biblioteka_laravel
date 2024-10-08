@extends('layouts.layout')

@section('title', 'Dodaj autora')

@section('content')
<main class="m-5">
    <h1>Dodaj autora</h1>

    <x-alert-errors />

    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Imię</label>
            <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}" required>
        </div>
        <div class="form-group">
            <label for="">Nazwisko</label>
            <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}" required>
        </div>
        <div class="form-group">
            <label for="">Data urodzenia</label>
            <input type="date" name="birthday" class="form-control" value="{{ old('birthday') }}" required>
        </div>
        <div class="form-group">
            <label for="">Gatunki</label>
            <input type="text" name="genres" class="form-control" value="{{ old('genres') }}" required>
        </div>
        <div class="form-group">
            <label for="">Książki</label>
            <select name="book_id[]" class="form-control" multiple>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">
                        {{ $book->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <input type="submit" class="btn btn-primary mt-5" value="Dodaj" name="create">
    </form>

</main>

@endsection
