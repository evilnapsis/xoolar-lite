<?php
$blocks = BlockData::getAllByTeamId($_GET["team_id"]);
?>
<div class="row">
	<div class="col-md-12">
		<h1>Calificaciones</h1>
		<?php if(count($blocks)>0):?>
			<a href="./report/califications-word.php?team_id=<?php echo $_GET["team_id"]; ?>" class="btn btn-default"><i class="fa fa-download"></i> Descargar</a>
		<?php endif; ?>
		<br><br>
		<?php

		$alumns = AlumnTeamData::getAllByTeamId($_GET["team_id"]);
		if(count($alumns)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<?php foreach($blocks as $block):?>
				<th><?php echo $block->name; ?></th>
			<?php endforeach; ?>

			</thead>
			<?php
			foreach($alumns as $al){
				$alumn = $al->getAlumn();
				?>
				<tr>
				<td><?php echo $alumn->name." ".$alumn->lastname; ?></td>
			<?php foreach($blocks as $block):
			$val = CalificationData::getByBA($block->id, $alumn->id);
			?>
				<td><?php if($val!=null ){ echo $val->val; }  ?></td>
			<?php endforeach; ?>

				</tr>
				<?php

			}
			echo "</table>";

		}else{
			echo "<p class='alert alert-danger'>No hay Grupos</p>";
		}


		?>


	</div>
</div>