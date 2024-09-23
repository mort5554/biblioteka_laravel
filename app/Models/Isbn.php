<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isbn extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id', 'number', 'issued_by', 'issued_on'
    ];

    public function book(){
        return $this->belongsTo('App\Models\Book');
    }
}
