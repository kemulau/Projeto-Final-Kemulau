<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entregador extends Model
{
    use HasFactory;
        protected $table = 'entregadores';

    protected $fillable = ['nome', 'telefone', 'veiculo', 'cpf'];
}