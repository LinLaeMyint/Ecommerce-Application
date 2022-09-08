<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAdd extends Model
{
    use HasFactory;
    protected $fillable=['product_id','supplier_id','total_quantity','description'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
