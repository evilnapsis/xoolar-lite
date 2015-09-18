<?php 
$team = TeamData::getById($_GET["id"]);
?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Grupo</h1>
	<br>
		<form class="form-horizontal" method="post" id="addcategory" action="index.php?action=updateteam" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" required value="<?php echo $team->name; ?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_favorite" <?php if($team->is_favorite){ echo "checked"; }?>> Favorito
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="team_id" value="<?php echo $team->id; ?>">
      <button type="submit" class="btn btn-primary">Actualizar Grupo</button>
    </div>
  </div>
</form>
	</div>
</div>