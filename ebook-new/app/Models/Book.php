<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Slider_category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'slider_category_id',
        'title',
        'description',
        'qty',
        'price',
        'image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function slider(){
        return $this->belongsTo(Slider_category::class);
    }

    public function order(){
        return $this->belongsToMany(Order::class);
    }
}
