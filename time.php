<?


date_default_timezone_set('America/Mexico_City');

//Version 2.0

 
function TimeSince($timeFrom, $timeTo){
    if( $timeTo < $timeFrom || $timeTo == $timeFrom){
        return 'Error el tiempo actual es igual o menos del tiempo de la base de datos';
    } else {
        $timeTo     = $timeTo;
        $timeFrom     = $timeFrom;
        $diff        = ($timeTo - $timeFrom);
        if( $diff <= 60 ){
            $count = $diff;
            if( $count == 0 ){
                $suffix      = 'un momento';
            } elseif ( $count == 1 ) {
                $suffix     = 'un segundo';
            } else {
                $suffix    = 'Segundos';
            }

         } else if( $diff > 60 && $diff < 3600) {
            $count = floor($diff/60);
            if ( $count == 1 ) {
                $suffix     = 'Minuto';
            } else {
                $suffix    = 'Minutos';
            }
        } else if( $diff > 3600 && $diff < 86400) {
            $count = floor($diff / 3600);
            if ( $count == 1 ) {
                $suffix     = 'Hora';
            } else {
                $suffix    = 'Horas';
            }
        } else if( $diff > 86400 && $diff < 2629743) {
            $count = floor($diff/86400);
            if ( $count == 1 ) {
                $suffix     = 'Día';
            } else {
                $suffix    = 'Días';
            }
        } else if( $diff > 2629743 && $diff < 31556926) {
            $count = floor($diff / 2629743);
            if ( $count == 1 ) {
                $suffix     = 'Mes';
            } else {
                $suffix    = 'Mes';
            }
        } else if( $diff > 31556926) {
            $count = floor($diff / 31556926);
            if ( $count == 1 ) {
                $suffix     = 'Año';
            } else {
                $suffix    = 'Años';
            }
        }
        return "$count $suffix";
    }
}
// ejemplo echo TimeSince($row[time], time()); 

//====================================================

//Version 1.0

// function dateDiff($from,$to) {

//           $diff = $to - $from;
//           $info = array();

//           if($diff>315569260) {
//             // Decadas

//             $info['decadas'] = ($diff - ($diff&37315569260))/315569260;
//             $diff = $diff%315569260;
//           }

//           elseif($diff>31556926) {
//             // Años
//             $info['años'] = ($diff - ($diff%31556926))/31556926;
//             $diff = $diff%31556926;
//           }

//            elseif($diff>2629743) {
//             // Meses
//             $info['meses'] = ($diff - ($diff%2629743))/2629743;
//             $diff = $diff%2629743;
//           }

//           elseif($diff>604800) {
//             // Semanas
//             $info['semanas'] = ($diff - ($diff%604800))/604800;
//             $diff = $diff%604800;
//           }

//           elseif($diff>86400) {
//             // Dias
//             $info['dias'] = ($diff - ($diff%86400))/86400;
//             $diff = $diff%86400;
//           }

//           elseif($diff>3600) {
//             // Horas
//             $info['horas'] = ($diff - ($diff%3600))/3600;
//             $diff = $diff%3600;
//           }

//           elseif($diff>60) {
//             // Minutos
//             $info['minutos'] = ($diff - ($diff%60))/60;
//             $diff = $diff%60;
//           }

//           elseif($diff>0) {
//           // Segundos
//             $info['segundos'] = $diff;
//           }

//           $f = '';
//           foreach($info as $k=>$v) {
//             if($v>0) $f .= "$v $k, ";
//           }

//           return substr($f,0,-2);
// }





// // $date = "2017-2-16 13:25:30"; // aca va la fecha de cuando se inserto los registros
// // $fecha = preg_replace('/:[0-9][0-9][0-9]/','',$date);
// // $time = strtotime($fecha);

// // echo "Hace ";
// // echo dateDiff($time,time());
// ?>