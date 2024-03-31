<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    protected $table = 'bukus';

    protected $fillable = ['name', 'slug', 'genre_id', 'author', 'sinopsis'];

    use HasFactory;

    public function genre(){
        return $this->belongsTo(genre::class);
    }
}
