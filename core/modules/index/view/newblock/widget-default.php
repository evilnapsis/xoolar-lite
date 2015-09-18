<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Bloque</h1>
	<br>
		<form class="form-horizontal" method="post" id="addcategory" action="index.php?action=addblock" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Numero*</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Numero">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="team_id" value="<?php echo $_GET["team_id"];?>">
      <button type="submit" class="btn btn-primary">Agregar Bloque</button>
    </div>
  </div>
</form>
	</div>
</div>