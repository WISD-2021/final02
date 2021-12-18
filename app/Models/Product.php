<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'type' ,
        'price' ,
        'quan' ,
        'content'  ,
        'pic' ,
        'status' ,
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
