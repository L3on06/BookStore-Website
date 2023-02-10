<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{

       use HasFactory;

        protected $fillable = [
        'name',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->hasMany(Book::class);
    }
}
