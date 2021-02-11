<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'fk_order_id',
        'fk_book_id',
    ];
}
