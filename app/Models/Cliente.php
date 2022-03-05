<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'NomeCliente',
        'EMAIL',
        'CPF'
    ];

    public function pedido()
    {
        return $this->hasMany(Pedido::class,'ClienteId','id');
    }
}
