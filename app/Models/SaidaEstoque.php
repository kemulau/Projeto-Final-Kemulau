<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaidaEstoque extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantidade', 
        'id_cliente', 
        'id_produto', 
        'data_saida_estoque', 
        'valor_total'
    ];

    // Relacionamento com Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // Relacionamento com Produto
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'id_produto')->with('unidade');
    }

    // Relacionamento com Categoria através do Produto
    public function categoria()
    {
        return $this->hasOneThrough(Categoria::class, Produto::class, 'id', 'id', 'id_produto', 'id_categoria');
    }
}
