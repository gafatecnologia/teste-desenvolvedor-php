<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'NumeroPedido',
        'DtPedido',
        'Status',
        'ClienteId',
        'ProdutoId'
    ];
    public function cliente()
    {
        return $this->hasOne(Cliente::class,'id','ClienteId');
    }
    public function produto()
    {
        return $this->hasMany(Produto::class,'id','ProdutoId');
    }

}
