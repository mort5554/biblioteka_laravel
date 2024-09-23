@extends('layouts.layout')

@section('title', 'Autorzy')

@section('content')
<main class="m-5">
    <table class="table w-50">
        <a href="{{ route('authors.index') }}">Powrót</a>

        @if ($author)
            <tr>
                <th>Imię</th>
                <td>{{ $author->firstname }}</td>
            </tr>
            <tr>
                <th>Nazwisko</th>
                <td>{{ $author->lastname }}</td>
            </tr>
            <tr>
                <th>Urodziny</th>
                <td>{{ $author->birthday }}</td>
            </tr>
            <tr>
                <th>Gatunek</th>
                <td>{{ $author->genres }}</td>
            </tr>
        @endif

        @isset ($author->books)
            <tr>
                <th>Stworzone książki</th>
                <td>
                    <ul>
                        @foreach ($author->books as $author_books)
                            <li>
                                <a href="{{ route('books.show', $author_books->id) }}">
                                    {{ $author_books->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endisset
    </table>
</main>




@endsection
