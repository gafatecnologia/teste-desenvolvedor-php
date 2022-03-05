<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'CodBarras',
        'NomeProduto',
        'ValorUnitario',
        'Quantidade'
    ];

    public function pedido()
    {
        return $this->hasOne(Pedido::class,'ProdutoId','id');
    }
}
