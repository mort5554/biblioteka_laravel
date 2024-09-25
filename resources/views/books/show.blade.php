@extends('layouts.layout')

@section('title', 'Książki')

@section('content')
<main class="m-5">
    <table class="table w-50">
        <a href="{{ route('books.index') }}">Powrót</a>

        @if ($book)
            <tr>
                <th>Nazwa Książki</th>
                <td>{{ $book->name }}</td>
            </tr>
            <tr>
                <th>Rok Wydania</th>
                <td>{{ $book->year }}</td>
            </tr>
            <tr>
                <th>Miejsce Wydania</th>
                <td>{{ $book->publication_place }}</td>
            </tr>
            <tr>
                <th>Liczba Stron</th>
                <td>{{ $book->pages }}</td>
            </tr>
            <tr>
                <th>Cena</th>
                <td>{{ $book->price }}</td>
            </tr>
        @endif

        @if ($book->isbn)
            <tr>
                <th>Numer Isbn</th>
                <td>{{ $book->isbn->number }}</td>
            </tr>
            <tr>
                <th>Numer Isbn wydany przez</th>
                <td>{{ $book->isbn->issued_by }}</td>
            </tr>
            <tr>
                <th>Data wydania numeru Isbn</th>
                <td>{{ $book->isbn->issued_on }}</td>
            </tr>
        @endif

        @isset($book->authors)
            <tr>
                <th>Autorzy</th>
                <td>
                    <ul>
                        @foreach ($book->authors as $author)
                            <li>
                                {{ $author->firstname }}
                                {{ $author->lastname }}
                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endisset
    </table>

    <h2 class="mt-5 mb-2">Znalezione pozycje z Open Library</h2>
    @isset($ol)
        <table class="table">
        @foreach ($ol->docs as $doc)
            <tr>
                <td>Tytuł</td>
                <td>{{ $doc->title }}</td>
            </tr>

            @isset($doc->author_name)
                <tr>
                    <td>Autor</td>
                    <td>{{ $doc->author_name[0] }}</td>
                </tr>
            @endisset

            @isset($doc->first_publish_year)
                <tr>
                    <td>Data pierwszego wydania</td>
                <td>{{ $doc->first_publish_year }}</td>
                </tr>
            @endisset

            @isset($doc->publisher)
                <tr>
                    <td>Wydawca</td>
                    <td>{{ $doc->publisher[0] }}</td>
                </tr>
            @endisset
                <tr>
                    <td colspan="2" style="background-color: lightgray"></td>
                </tr>
        @endforeach
        </table>

    @endisset
</main>




@endsection
