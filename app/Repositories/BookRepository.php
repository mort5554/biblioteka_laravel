<?php
namespace App\Repositories;

use DB;
use App\Models\Book;
use App\Models\Isbn;


class BookRepository extends BaseRepository{
    public function __construct(Book $model){
        $this->model = $model;
    }

    public function create(array $data){
        $book = Book::create($data);

        if(isset($data['author_id'])){
            $book->authors()->sync($data['author_id']);
        }
        return $book;
    }

    public function update(array $data, $id){
        $book = Book::find($id);
        $book->update($data);
        $book->save();

        if(isset($data['author_id'])){
            $book->authors()->sync($data['author_id']);
        }
        return $book;
    }

    public function cheapest(){
        $BookList = $this->model->orderBy('price','asc')
            ->limit(3)->get();
        return $BookList;
    }

    public function longest(){
        $BookList = $this->model->orderBy('pages','desc')
            ->limit(3)->get();
        return $BookList;
    }

    public function search(String $q){
        $BookList = $this->model
            ->where('name', 'like', '%'.$q.'%')
            ->paginate(10);
        return $BookList;
    }
}
