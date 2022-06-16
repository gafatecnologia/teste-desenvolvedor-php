<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryRequest extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = [
        'user_id','product_id','amount','status'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function scopeRequest($query){
        return $query->join('users', 'requests.user_id', '=', 'users.id')
        ->join('products', 'requests.product_id', '=', 'products.id')
        ->select('requests.*','users.name','products.name as product_name', 'products.unitary_value');
    }

}
