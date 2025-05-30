<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompraItem extends Model
{
    use HasFactory;

    protected $table = 'compra_itens'; // <- ESSA LINHA É ESSENCIAL

    protected $fillable = ['compra_id', 'produto_id', 'quantidade', 'preco_unitario'];

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
