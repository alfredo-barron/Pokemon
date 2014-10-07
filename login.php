<?php include "header.php" ?>
  <br><br><br>
  <div class="form-group">
	<h1 align="center">Bienvenido a Hoenn</h1>
	<form method="POST" action="validar.php" role="form" >
    <label for="inputPassword3" class="col-sm-2 control-label">Centro Pokemon</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Centro Pokemon" required>
    </div>
  </div
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Recuerdame
        </label>
      </div>
    </div>
  </div>
	<div align="center"><button class="btn btn-primary btn-lg">Ingresar</button></div> 
  </form>
  </div>
  <HR SIZE=5 NOSHADE>
  <div align="center">
  <img src="./hoenn/images/entrada.png" width="500px">
  </div>
<?php include "footer.php"; ?>