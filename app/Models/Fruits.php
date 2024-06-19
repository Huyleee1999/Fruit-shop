<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruits extends Model
{
    use HasFactory;
    public $table = 'fruits';
    protected $timestamp = true;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'origin',
        'weight',
        'quality'
    ];
}
