<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'name', 'qty', 'amount', 'total'];

    public function orders()
    {
        return $this->belongsToMany(Order::class)
                    ->withPivot('quantity', 'amount')
                    ->withTimestamps();
    }
}
