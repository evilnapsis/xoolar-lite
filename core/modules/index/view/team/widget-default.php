<?php
$team =  TeamData::getById($_GET["id"]);
$alumns = AlumnTeamData::getAllByTeamId($_GET["id"]);
?>
<div class="row">
	<div class="col-md-12">
		<h1>Alumnos <small><?php echo $team->name;?></small></h1>
	<a href="index.php?view=newalumn&team_id=<?php echo $_GET["id"]; ?>" class="btn btn-default"><i class='fa fa-asterisk'></i> Nuevo Alumno</a>
	<?php if(count($alumns)>0):?>
	<a href="index.php?view=assistance&team_id=<?php echo $_GET["id"]; ?>" class="btn btn-default"><i class='fa fa-check'></i> Asistencia</a>
	<a href="index.php?view=behavior&team_id=<?php echo $_GET["id"]; ?>" class="btn btn-default"><i class='fa fa-smile-o'></i> Comportamiento</a>
	<a href="index.php?view=califications&team_id=<?php echo $_GET["id"]; ?>" class="btn btn-default"><i class='fa fa-tasks'></i> Calificaciones</a>
	<a href="index.php?view=blocks&team_id=<?php echo $_GET["id"]; ?>" class="btn btn-default"><i class='fa fa-th-large'></i> Bloques</a>
<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class='fa fa-th-list'></i> Listas <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="index.php?view=list&team_id=<?php echo $_GET["id"]; ?>">Asistencia</a></li>
    <li><a href="index.php?view=behaviorlist&team_id=<?php echo $_GET["id"]; ?>">Comportamiento</a></li>
    <li><a href="index.php?view=calificationlist&team_id=<?php echo $_GET["id"]; ?>">Calificaciones</a></li>
  </ul>
</div>
	<a href="report/team-word.php?team_id=<?php echo $_GET["id"]; ?>" class="btn btn-default"><i class='fa fa-download'></i> Descargar</a>
<?php endif; ?>
<!--	<a href="index.php?view=list&team_id=<?php echo $_GET["id"]; ?>" class="btn btn-default"><i class='fa fa-area-chart'></i> Estadisticas</a> -->


<br><br>
		<?php

		if(count($alumns)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th></th>
			</thead>
			<?php
			foreach($alumns as $al){
				$alumn = $al->getAlumn();
				?>
				<tr>
				<td><?php echo $alumn->name." ".$alumn->lastname; ?></td>
				<td style="width:160px;"><a href="index.php?view=openalumn&id=<?php echo $alumn->id;?>&tid=<?php echo $team->id;?>" class="btn btn-default btn-xs">Ver</a> <a href="index.php?view=editalumn&id=<?php echo $alumn->id;?>&tid=<?php echo $team->id;?>" class="btn btn-warning btn-xs">Editar</a> <a href="index.php?action=delalumn&id=<?php echo $alumn->id;?>&tid=<?php echo $team->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
				<?php

			}

echo "</table>";

		}else{
			echo "<p class='alert alert-danger'>No hay Alumnos</p>";
		}


		?>


	</div>
</div>