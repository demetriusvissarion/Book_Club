<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function author() // Laravel will assume here the foreign key is 'author_id' but it's not so we overwrite it to 'user-id'
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
