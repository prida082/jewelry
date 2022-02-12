<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'image',
    ];
    public function owner(){
        return $this->belongsTo(\App\Models\User::class);
    }
}
