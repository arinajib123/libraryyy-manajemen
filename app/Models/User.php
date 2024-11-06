<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'username',
        'email',
        'password',
    ];
    public function buku()
    {
        return $this->hasMany(Buku::class);
    }


}
