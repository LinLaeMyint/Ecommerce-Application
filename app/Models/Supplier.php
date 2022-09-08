<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable=['name','phone','image','description'];

    public function product(){
        return $this->hasMany(Product::class);
    }
}
