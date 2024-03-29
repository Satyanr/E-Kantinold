<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $guarded =['id'];

    public function user(){
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function item(){
        return $this->hasMany(Tambahanitem::class);
    }

}
