<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function user(){
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function kantin(){
        return $this->hasMany(User::class, 'id', 'kantin_id');
    }

    public function post(){
        return $this->hasMany(Post::class, 'id', 'post_id');
    }
}
