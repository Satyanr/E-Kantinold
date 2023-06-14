<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tambahanitem extends Model
{
    use HasFactory;

    protected $guarded =['id'];
    public function posts(){
        return $this->hasOne(Post::class, 'id', 'food_id');
    }
}
