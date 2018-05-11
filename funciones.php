<?php

//AcomodarFecha
date_default_timezone_set('America/Mexico_City');

//=====


                                
//=====




function CalcularFecha($tiempo){


    $fecha=explode("-",$tiempo);
    $dia_hora=$fecha[2];

    switch ($fecha[1]) {
        case '01':
            $valormes="Enero";
            break;

        case '02':
            $valormes="Febrero";
            break;

        case '03':
            $valormes="Marzo";
            break;

        case '04':
            $valormes="Abril";
            break;

        case '05':
            $valormes="Mayo";
            break;

        case '06':
            $valormes="Junio";
            break;

        case '07':
            $valormes="Julio";
            break;

        case '08':
            $valormes="Agosto";
            break;

        case '09':
            $valormes="Septiembre";
            break;

        case '10':
            $valormes="Octubre";
            break;

        case '11':
            $valormes="Noviembre";
            break;

        case '12':
            $valormes="Diciembre";
            break;
        
        default:
            $valormes="Null";
            break;
    }

    $mes=$valormes;
    $ano=$fecha[0];
    $Div_hora_dia=explode(" ",$dia_hora);
    $horaminutosegundo=$Div_hora_dia[1];
    $dia=$Div_hora_dia[0];
    $div_horas=explode(":" ,$horaminutosegundo);
    $segundo=$div_horas[2];
    $minuto=$div_horas[1];
    $hora=$div_horas[0];



$fecha_acomodada = $dia." de ".$mes." del ".$ano." a las ".$hora.":".$minuto." Hrs"; 
return $fecha_acomodada;
}

?>