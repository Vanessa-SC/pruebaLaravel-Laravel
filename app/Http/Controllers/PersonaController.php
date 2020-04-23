<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use DB;


class PersonaController extends Controller
{
   public function consultaPersonas1(){
        $personas = Persona::get();
        echo $personas;
   }

   public function consultaPersonas2(){
    $personas = DB::select('select * from persona');
    echo json_encode($personas);
   }

   //Funcion recibe dos parámetros
   public function insertar($nombre,$edad){ 
      try {
            // Inserción almacenada en una variable, en la cual
            // se almacenará un 1 si la inserción fue exitosa
            $persona = Persona::insert(['nombre'=>$nombre,'edad'=>$edad]);

            //Si fue insertada nos regresa el mensaje "insertado"
            if($persona == 1){
               $arr = array('resultado' => "insertado");
               echo json_encode($arr);
            } else {
               $arr = array('resultado' => "no insertado");
               echo json_encode($arr);
            }          
      } catch(\Illuminate\Database\QueryException $e){
          $errorCode = $e->getMessage();
          $arr = array('estado' => $errorCode);
          echo json_encode($arr);
      }
  }

  //Funcion para modificar nombre
  public function updateNombre($id,$nombre){
      try{
         // Busca un registro a través de su ID
         // y lo almacena en una varibale
         $Persona = Persona::find($id);
         
         // Realiza el reemplazo del dato guardado
         // en el atributo "nombre" por el valor que 
         // estamos pasandole en el parámetro $nombre
            $Persona->nombre = $nombre;
            $Persona->save();
            
            // Verificamos que el registro no esté
            // vacío, es decir, exista.
            if (empty($Persona)){
                  $arr = array('nombre'=>'error');
                  echo json_encode($arr);
            } else {
                  echo $Persona;
            }
      } catch(\Illuminate\Database\QueryException $e){
         $errorCore = $e->getMessage();
         $arr = array('estado' => $errorCore);
         echo json_encode($arr);
      }
   }

   public function updateEdad($id,$edad){
      try{
         $Persona = Persona::find($id);
         
              $Persona->edad = $edad;
              $Persona->save();
              
              if (empty($Persona)){
                  $arr = array('nombre'=>'error');
                  echo json_encode($arr);
              } else {
                  echo $Persona;
              }
      } catch(\Illuminate\Database\QueryException $e){
          $errorCore = $e->getMessage();
          $arr = array('estado' => $errorCore);
          echo json_encode($arr);
      }
   }
         
   //Funcion para modificar nombre y edad
   public function update($id,$nombre,$edad){
      try{
         $Persona = Persona::find($id);
         // Busca un registro a través de su ID
         // y lo almacena en una varibale
              $Persona->nombre = $nombre;
              $Persona->edad = $edad;
              $Persona->save();
              // Realiza el reemplazo del dato guardado
              // en los atributos por el valor que 
              // estamos pasandole en los parámetros 
              
              // Verificamos que el registro no esté
              // vacío, es decir, exista.
              if (empty($Persona)){
                  $arr = array('nombre'=>'error');
                  echo json_encode($arr);
              } else {
                  echo $Persona;
              }
      } catch(\Illuminate\Database\QueryException $e){
          $errorCore = $e->getMessage();
          $arr = array('estado' => $errorCore);
          echo json_encode($arr);
      }
   }

   // Funcion para eliminar que recibe el ID
   public function eliminar($id){
      
      try{
         // Se realiza la consulta y se almacena el resultado en una variable
         $Persona = DB::delete('delete from persona where idPersona = ?', [$id]);

         //Si no se obtuvo resultado imprime mensaje
         if (empty($Persona)){
            $arr = array(''=>'No se pudo eliminar');
            echo json_encode($arr);
        } else {
            echo json_encode($Persona);
         }
      } catch(\Illuminate\Database\QueryException $e){
          $errorCore = $e->getMessage();
          $arr = array('estado' => $errorCore);
          echo json_encode($arr);
      }
   }

   
}




