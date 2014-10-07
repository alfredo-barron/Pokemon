<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php";
      $id = $_GET['id'];
      $nombre = $_GET['nombre'];
      $apellidos = $_GET['apellidos'];
      ?>
     <div align="center"><h2>Perfil de <b><?php echo $nombre;?> <?php echo $apellidos; ?></b></h2></div>
     <table align="center" width="100%">
       <tr>
          <td><div aling="right"><img src="./images/enfermerajoy.jpg" class="img-thumbnail"  width="350"
    height="350"></div></td>

         <?php
     $id = $_GET['id'];
     $data = array();
     $data = array('id' => $id);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_enfermeras',$data); ?>
     <?php foreach ($catalogos as $cata){ ?>
          <td>
          <h3>Nombre: <b><?php echo $cata['nombre']." ".$cata['apellidos'];?></b></h3>
          <h3>Fecha de Nacimiento: <b><?php echo $cata['fecha_nacimiento'];?></b></h3>
          <?php
           $birthday = $cata['fecha_nacimiento'];
           function CalculaEdad( $fecha ) {
           list($Y,$m,$d) = explode("-",$fecha);
           $edad =( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
           return $edad;
           } ?>
          <h3>Edad: <b><?php echo CalculaEdad($birthday)?></b></h3>
          <h3>Cedula Profesional: <b><?php echo $cata['cedula'];?></b></h3>
          <h3>Centro Pokemon: <b><?php echo $cata['centro'];?></b></h3>
          </td>
           <?php } ?>
           <td align="center">
            <?php
            $id = $_GET['id'];
            $data = array();
            $data = array('id' => $id);
            $db = new DB("root","root","localhost","centrospokemon");
            $catalogos = $db->findAll('vista_enfeayu',$data);
             foreach ($catalogos as $cata){ ?>
             Ayudante Pokemon
             <h4><b><?php echo $cata['especie'];?></b></h4><br>
             <div aling="right"><img src="./images/<?php echo $cata['imagen'];?>" class="img-thumbnail"  width="300"
    height="300"></div>
             <?php } ?>
           </td>
     </tr>
     </table>
<?php include "footer.php"; ?>
