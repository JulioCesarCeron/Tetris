<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemReserva extends Model
{
    protected $fillable = [
    	'nome_item', 'quantidade', 'descricao'
    ];
}
