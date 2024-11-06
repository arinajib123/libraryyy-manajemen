<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku'; 
    protected $fillable = [
        'title',
        'author',
        'category',
        'published_year',
        'description',
        'available',
        'isbn',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
