<?php

namespace App\Http\Controllers\Api;

use App\Reserva;
use App\Http\Controllers\Controller;

class AgendaController extends Controller {
    
    public function index(){
    	

    	$teste = Reserva::all();

    	$arrayName = array();
    	$var = 0;

    	$arrayName['success'] = 1;
    	foreach ($teste as $key => $value) {
				$arrayName['result'][$var]['id']    = $value->id;
				$arrayName['result'][$var]['title'] = $value->title;
				$arrayName['result'][$var]['url']   = $value->url;
				$arrayName['result'][$var]['class'] = $value->class;
				$arrayName['result'][$var]['start'] = $value->start;
				$arrayName['result'][$var]['end']   = $value->end;
			   $var++; 		
    	}
    	return $arrayName;
    }
}
