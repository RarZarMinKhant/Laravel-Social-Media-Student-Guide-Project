<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'user_id'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }

    function category(){
        return $this->belongsTo(Category::class);
    }
}
