<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemReserva extends Model {
    
    protected $fillable = [
    	'item', 'quantidade', 'descricao'
    ];
}
