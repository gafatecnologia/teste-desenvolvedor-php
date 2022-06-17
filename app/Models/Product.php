<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','bar_code','unitary_value'
    ];

    public function scopeProduct($query){
        return $query->select('products.*',DB::raw("DATE_FORMAT(products.created_at, '%d/%m/%Y') as formatted_date"));
    }
}
