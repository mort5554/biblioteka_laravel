<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Repositories\BookRepository;
use DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BookRepository $bookRepo, Author $author)
    {
        $authorList = Author::all();

        if ($authorList->isEmpty()) {
            return redirect()->route('authors.index')->with('message', 'Brak autorów w bazie danych.');
        }

        //return view('authors.index')->with('authorList', $authorList);
        //$authorList = $bookRepo->getAll();
        return view('authors.index')->with('authorList', $authorList);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        return view('authors.create', ['books' => $books]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|min:3|max:255',
            'lastname' => 'required|string|min:3|max:255',
            'birthday' => 'required|date_format:Y-m-d',
            'genres' => 'required|string|max:255',
            'book_id' => 'nullable|array',
            'book_id.*' => 'exists:books,id',
        ]);

        $author = Author::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'birthday' => $validatedData['birthday'],
            'genres' => $validatedData['genres'],
        ]);

        if (!empty($validatedData['book_id'])) {
            $author->books()->attach($validatedData['book_id']); // Powiązanie autora z książkami w tabeli pivot
        }

        return redirect()->route('authors.index')->with('message', 'Udało się dodać autora');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $author = Author::findOrFail($id);
        //return view('authors.show')->with('author', $author);

        //$author = $bookRepo->find($id);
        return view('authors.show', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request){
        $q = $request->input('q', "");

        $authorList = Author::where('firstname', 'like', "%" . $q . "%")
            ->orWhere('lastname', 'like', "%" . $q . "%")
            ->paginate(10);


        return view('authors.index')->with('authorList', $authorList);
    }
}
