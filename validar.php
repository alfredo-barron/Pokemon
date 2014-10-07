<<!DOCTYPE html>
<html>
<head>
    <title></title>
      <script language="JavaScript">
        function ventana(){
    alert("Contraseña Incorrecta"); 
}
       </script>
</head>
<body>

<?php
		include "DB.php";
     	$nombre = $_POST['nombre'];
     	$password = $_POST['password'];
     	$data=array();
     	$data = array('nombre' => $nombre );
     	$db = new DB("root","110992","localhost","centrospokemon");
        $centros = $db->findAll('centros_pokemon',$data);
        foreach ($centros as $cen){
        	if($cen['password']==$password){
        		session_start();
        		$_SESSION['nombre'] = $nombre; 
        		header("Location:hoenn/index.php");
        	}
            else{ ?>      
                <script language='JavaScript'> 
                ventana();
                </script>"
             <?php   header("Location:login.php");
            }}
         
        ?>

        </body>
</html>