<?php 
   
 function validarCampo($variable){
    if(trim($variable) == ''){
       return false;
    }else{
       return true;
    }
 } 
 

 //Valida el documento con un rango de 1.000.000 a 99.999.999.
   
 
 ?>
  <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";
       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
    </script>

    