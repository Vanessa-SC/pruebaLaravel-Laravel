<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use BD;


class PersonaController extends Controller
{
   public function consultaPersonas1(){
        $personas = Persona::get();
        echo $personas;
   }

   public function consultaPersonas2(){
    $personas = BD::select('select * from persona');
    echo $personas;
   }
   
}




