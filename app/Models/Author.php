<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname', 'lastname', 'birthday', 'genres'
    ];

    public function books(){
        return $this->belongsToMany('App\Models\Book');
    }
}
