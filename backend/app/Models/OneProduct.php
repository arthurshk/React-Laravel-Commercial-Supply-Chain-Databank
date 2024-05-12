<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OneProduct extends Model
{
    use HasFactory;
    protected $table = 'oneProduct';
    protected $fillable = [
        'name',
        'quanitity',
        'price',
    ];
}
