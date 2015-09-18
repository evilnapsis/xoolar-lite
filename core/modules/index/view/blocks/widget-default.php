<?php
$blocks = BlockData::getAllByTeamId($_GET["team_id"]);
?>
<div class="row">
	<div class="col-md-12">
		<h1>Bloques de calificaciones</h1>
	<a href="index.php?view=newblock&team_id=<?php echo $_GET["team_id"]; ?>" class="btn btn-default"><i class='fa fa-asterisk'></i> Nuevo Bloque</a>

<br><br>
		<?php

		if(count($blocks)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th></th>
			</thead>
			<?php
			foreach($blocks as $al){
				?>
				<tr>
				<td><?php echo $al->name; ?></td>
				<td style="width:130px;"><a href="index.php?action=delblock&id=<?php echo $al->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
				<?php

			}

echo "</table>";

		}else{
			echo "<p class='alert alert-danger'>No hay Bloques</p>";
		}


		?>


	</div>
</div>