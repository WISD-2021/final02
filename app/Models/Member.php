<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = [
        'id',
        'user_id',
        'tel',
    ];
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
