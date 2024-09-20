<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'photo',
        'new',
        'hit',
        'amount',
        'discount',
        'weight',
        'description',
        'type_id',
    ];
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function baskets() {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }
}
