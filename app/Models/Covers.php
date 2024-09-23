<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function loans(){
        return $this->hasManyThrough('App\Models\Loan', 'App\Models\Book',
        'cover_id', 'book_id');
    }
}
