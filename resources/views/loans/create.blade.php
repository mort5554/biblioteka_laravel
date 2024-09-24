@extends('layouts.layout')

@section('title', 'Stwórz wypożyczenie')

@section('content')
<main class="m-5">

    <x-alert-errors />

    <div class="container">
        <h2>Dodawanie wypożyczenia</h2>
        <form action="{{ route('loans.store') }}" method="POST" role="form">
            @csrf
            <div class="form-group">
                <label for="name">Tytuł książki</label>
                <select type="text" name="book_id">
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Dane wypożyczającego</label>
                <input type="text" class="form-control" name="client" value="{{ old('client') }}" required>
            </div>

            <div class="form-group">
                <label for="name">Data wypożyczenia</label>
                <input type="date" class="form-control" name="loaned_on" value="{{ $currentDate->format('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="name">Przewidywany zwrot</label>
                <input type="date" class="form-control" name="estimated_on" value="{{ old('estimated_on') }}" required>
            </div>

            <input type="submit" value="Dodaj" class="btn btn-primary mt-5">
        </form>
</main>

@endsection
