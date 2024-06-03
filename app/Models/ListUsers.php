<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListUsers extends Model
{
    use HasFactory;
    public $table = 'list_users';
    public $fillable = [
        'name',
        'email',
        'phone',
        'genre',
        'major'
    ];
}
