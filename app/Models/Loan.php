<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'client', 'estimated_on', 'loaned_on', 'book_id', 'returned_on'
    ];

    public function book(){
        return $this->belongsTo('App\Models\Book');
    }
}
