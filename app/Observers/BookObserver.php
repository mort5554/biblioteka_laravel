<?php

namespace App\Observers;

use App\Models\Book;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookCreated;

class BookObserver
{
    public function created(Book $book)
    {
        // Wysyłanie e-maila
        Mail::to('kuniewiczigor@gmail.com')->send(new BookCreated($book));
    }
}
