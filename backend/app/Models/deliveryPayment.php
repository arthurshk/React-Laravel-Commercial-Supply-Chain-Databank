<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deliveryPayment extends Model
{
    use HasFactory;
    protected $table = 'deliveryPayment';
    protected $fillable = [
        'speed',
        'type',
        'price',
    ];
}
