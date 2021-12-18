<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $fillable = [
        'id',
        'member_id',
        'product_id',
        'quan',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
