<?php

namespace App\Http\Controllers\Api;

use App\Repositories\BookRepository;
use Illuminate\Http\Request;
use DB;
use App\Models\Book;
use App\Models\Isbn;
use App\Models\Author;
use App\Providers\OpenLibraryProvider;
use App\Http\Requests\StoreBook;
use App\Mail\BookCreated;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Resources\Book as BookResource;
use App\Http\Controllers\Resources\BookCollection;

class BookApiController extends Controller
{
    public function find(BookRepository $bookRepo, $id){
        $book = $bookRepo->find($id);
        return new BookResource($book);
    }

    public function store(StoreBook $request, BookRepository $bookRepo){
        $data = $request->all();
        $book = $bookRepo->create($data);
        event(new BookCreated($book));
        return new BookResource($book);
    }

    public function list(BookRepository $bookRepo){
        return new BookCollection($bookRepo->getAll());
    }

    public function update(Request $request, BookRepository $bookRepo, $id){
        $data = $request->all();
        $book = $bookRepo->update($data, $id);
        return new BookResource($book);
    }

    public function destroy(BookRepository $bookRepo, $id){
        $bookList = $bookRepo->delete($id);
        return array('message', 'success');
    }
}
