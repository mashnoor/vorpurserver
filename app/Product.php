<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }
}
