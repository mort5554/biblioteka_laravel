<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Isbn;
use App\Models\Author;
use DB;
use App\Repositories\BookRepository;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BookRepository $bookRepo,Book $book)
    {
        //$books = Book::all();
        /*$bookList = Book::all();
        return view('books.index')->with('bookList', $bookList);*/

        $bookList = $bookRepo->getAll();
        return view('books.index')->with('bookList', $bookList);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(BookRepository $bookRepo)
    {
        $authors = Author::all();
        return view('books.create',['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRepository $bookRepo, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:1024',
            'year' => 'required|max:255',
            'publication_place' => 'required|string|min:3|max:255',
            'pages' => 'required',
            'price' => 'required'
        ]);

        //Book::create($data);
        $bookList = $bookRepo->create($data);

        return redirect()->route('books.index')->with('message', 'Udało się dodać książkę');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookRepository $bookRepo, $id)
    {
        //$book = Book::findOrFail($id);
        $book = $bookRepo->find($id);

        return view('books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit')->with('book',$book);
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
    public function destroy(BookRepository $bookRepo, $id)
    {
        //$book->delete();
        $book = $bookRepo->delete($id);
        return redirect()->route('books.index')->with('message', 'Udało się usunąć książkę');
    }

    public function cheapest(BookRepository $bookRepo){
        //$bookList = DB::table('books')->orderBy('price', 'asc')->limit(3)->get();
        $bookList = $bookRepo->cheapest();
        return view('books.index')->with('bookList',$bookList);
    }

    public function longest(BookRepository $bookRepo){
        //$bookList = DB::table('books')->orderBy('pages', 'desc')->limit(3)->get();
        $bookList = $bookRepo->longest();
        return view('books.index')->with('bookList', $bookList);
    }

    public function search(BookRepository $bookRepo, Request $request){
        /*$bookList = DB::table('books')
        //->leftJoin('isbns', 'isbns.book_id', '=', 'books.id')
        ->where('name', 'like', "%". $q . "%")
        //->select("books.*", "isbns.*")
        ->get();*/
        $q = $request->input('q', "");
        $bookList = $bookRepo->search($q);

        return view('books.index')->with('bookList', $bookList);
    }
}
