<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'id',
        'carts_id' ,
        'total' ,
        'date' ,
        'status' ,
    ];
    public function members(){
        return $this -> belongsTo(Member::class);
    }
    public function carts()
    {
        return $this->hasMany(Car::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
