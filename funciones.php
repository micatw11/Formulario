<?php

function validarCampo($variable) {
    if (trim($variable) == '') {
        return false;
    } else {
        return true;
    }
}

 function validarEntero($valor, $opciones_doc){
    if(filter_var($valor, FILTER_VALIDATE_INT, $opciones_doc) === FALSE){
       return false;
    }else{
       return true;
    }
 }

function control($var) {
    if (!isse($var)){
echo '<h2>ERROR DE ACCESO</h2>';
die();
    }
}


function Calcular_edad($dianaz,$mesnaz, $anonaz) {
//fecha actual

    $dia = date(j);
    $mes = date(n);
    $ano = date(Y);
//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
    if (($mesnaz == $mes) && ($dianaz > $dia)) {
        $ano = ($ano - 1);
    }
//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
    if ($mesnaz > $mes) {
        $ano = ($ano - 1);
    }
    $datos['edad'] = ($ano - $anonaz);
    return ($datos['edad']);
}
?>

<script>
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = "8-37-39-46";
        tecla_especial = false
        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            return false;
        }
    }
</script>

<script>
    function soloNumeros(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " 0123456789";
        especiales = "8-37-39-46";
        tecla_especial = false
        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            return false;
        }
    }
</script>

<script language="JavaScript">
function aviso(url){
if (!confirm("ALERTA!! va a proceder a eliminar este registro, si desea eliminarlo de click en ACEPTAR\n de lo contrario de click en CANCELAR.")) {
return false;
}
else {
document.location = url;
return true;
}
}
</script>