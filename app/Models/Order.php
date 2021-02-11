<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'fk_user_id',
    ];

    public function books() {
        return $this->belongsToMany(Book::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
