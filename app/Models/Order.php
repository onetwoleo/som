<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'basket_id',
        'amount',
        'name',
        'phone',
        'address',
        'comment',
        'delivery',
        'payment',
        'updated_at',
    ];
    public function basket()
    {
        return $this->belongsTo(Basket::class);
    }
}
