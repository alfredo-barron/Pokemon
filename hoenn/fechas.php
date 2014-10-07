<?php
      include "DB.php";
      $id=1;
      $data = array();
      $data = array('id' => $id);
      $db = new DB("root","root","localhost","centrospokemon");
     $regis = $db->findAll('vista_registroestatus',$data);
     foreach ($regis as $r){
            echo $r['fecha_entrada'];
            $hit_points=$r['hit_points'];
            $estatus=$r['estatus'];
            $tiempo=$r['tiempo'];
            $desaparece=$r['desaparece_a'];


function dateadd($date, $dd=0, $mm=0, $yy=0, $hh=0, $mn=0, $ss=0){
      $date_r = getdate(strtotime($date));
      $date_result = date("Y-m-d",

                    mktime(($date_r["hours"]+$hh),
                           ($date_r["minutes"]+$mn),
                           ($date_r["seconds"]+$ss),
                           ($date_r["mon"]+$mm),
                           ($date_r["mday"]+$dd),
                           ($date_r["year"]+$yy)));
                       return $date_result;
      }

      $fecha_estimada=dateadd($r['fecha_entrada'],8,0,0,0,0,$segundos);
      $hit_points=100-$hit_points;
      $minutos=($hit_points/10)*2.5;
      $segundos=$minutos*60;

      if($estatus==1){
            $segundos+=$tiempo;
            for($i=0; $i>=$segundos; $i++){
            if($i==$segundos){
                $suspendido=0;
            }
          }
        }
          else if($estatus==7 or $estatus==8){
            $segundos+=$tiempo;
            for($i=0; $i>=$segundos; $i++){
            if($i==$segundos){
                $suspendido=0;
            }
          }
        }
          else if($estatus==2 or $estatus==3){
            $segundos+=$tiempo;
            for($i=0; $i>=$segundos; $i++){
            if($i==$segundos){
                $suspendido=0;
            }
          }
        }
          else if($estatus==4 or $estatus==5){
            $segundos+=$tiempo;
            for($i=0; $i>=$segundos; $i++){
            if($i==$segundos){
                $suspendido=0;
            }
          }
        }
          else if($estatus==6){
            $segundos+=$tiempo;
            for($i=0; $i>=$segundos; $i++){
            if($i==$segundos){
                $suspendido=0;
            }
          }
        }



      echo $fecha_estimada." - ";
      echo $hit_points." - ";
      echo $estatus." - ";
      echo $tiempo." - ";
      echo $desaparece." - ";
      echo $minutos." - ";
      echo $segundos." - ";
      echo $suspendido." - ";
    }
?>
