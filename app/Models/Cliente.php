<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'NomeCliente',
        'EMAIL',
        'CPF',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class,'ClienteId');
    }
}
