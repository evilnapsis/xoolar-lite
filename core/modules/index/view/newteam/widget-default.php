<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Grupo</h1>
	<br>
		<form class="form-horizontal" method="post" id="addcategory" action="index.php?view=addteam" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_favorite"> Favorito
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Grupo</button>
    </div>
  </div>
</form>
	</div>
</div>
