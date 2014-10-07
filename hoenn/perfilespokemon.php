<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php";
      $id = $_GET['id'];
      $especie = $_GET['especie'];
      ?>
<div align="center"><h2>Perfil de <b><?php echo $especie;?></b></h2></div>

	 <table align="center" width="100%">
	 	<tr>
	 		<td>
	 			<?php
     $id = $_GET['id'];
     $data = array();
     $data = array('id_pokemon' => $id);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_pokebola1',$data);
     foreach ($catalogos as $cata){ ?>
       <td>
          <h4 align="center">Alias: <b><?php echo $cata['aliaspokemon'];?></b></h4>
          <div align="center"><img src="./images/<?php echo $cata['imagen'];?>" aling="center"></div>
       </td>
       <td>
        <h2><b>Datos de <?php echo $cata['especie'] ?></b></h2><br>
       	<b>Nivel: </b><?php echo $cata['nivel'] ?> <br>
        <b>Sexo: </b><?php echo $cata['sexo'] ?> <br>
        <b>Hits Points: </b><?php echo $cata['hit_points'] ?> <br>
        <b>Ataque: </b><?php echo $cata['ataque'] ?> <br>
        <b>Defensa: </b><?php echo $cata['defensa'] ?> <br>
        <b>Velocidad: </b><?php echo $cata['velocidad'] ?> <br>
        <b>Evasion: </b><?php echo $cata['evasion'] ?> <br>
        <b>Precision: </b><?php echo $cata['prezision'] ?> <br>
        <b>Status: </b><?php echo $cata['estatus'] ?> <br>
        <?php $inter=$cata['es_intercambiable'];
        if($inter==0){
        	$valor="No";
        }
        else{
        	$valor="Si";
        }
         ?>
         <b>Es intercambiable: </b><?php echo "$valor"; ?>
         <?php  } ?>
       </td>
       <td align="center">
       	<?php
     $id = $_GET['id'];
     $data = array();
     $data = array('id' => $id);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_entrepokemon',$data);
     foreach ($catalogos as $cata){ ?>
       	<h3>Entrenado por <b><?php echo $cata['nombre']." ".$cata['apellidos']?></b></h3>
       	<h4>Alias: <b><?php echo $cata['alias']?></b></h4>
       	<div aling="center"><img src="./images/<?php echo $cata['imagen'];?>" class="img-thumbnail"  width="250"
    height="250"></div>
       </td>
        <?php  } ?>
	 		</td>
	 	</tr>
	 </table>



<?php include "footer.php"; ?>
