<?php
$alumn =  AlumnData::getById($_GET["id"]);
$teams = AlumnTeamData::getAllByAlumnId($_GET["id"]);
$allteams = TeamData::getAllByUserId($_SESSION["user_id"]);
$found = false;
  $txs = array();
  foreach($allteams as $t){ $txs[] = $t->id; }
  $tys = array();
  foreach($teams as $t){ $tys[] = $t->team_id; }
  $tzs = array_diff($txs,$tys);
  if(empty($tzs)){ $found= false; }else { $found=true; }

  ?>
<div class="row">
	<div class="col-md-12">
		<h1><?php echo $alumn->name." ".$alumn->lastname; ?></h1>
<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    Agregar al Grupo <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
  <?php if($found):
  $txs = array();
  foreach($allteams as $t){ $txs[] = $t->id; }
  $tys = array();
  foreach($teams as $t){ $tys[] = $t->team_id; }
  $tzs = array_diff($txs,$tys);


  	foreach ($tzs as $t) {
  		$te = null;
  		foreach ($allteams as $ate) {
  			if($ate->id==$t){ $te= $ate; }
  		}
		echo "<li><a href='./?action=addalumntoteam&al_id=$alumn->id&t_id=$t'>".$te->name."</a></li>";
	}
?>
  <?php else:?>
    <li><a href="javascript:void()">No hay Grupos</a></li>
<?php endif;?>
  </ul>
</div>
<!--	<a href="index.php?view=list&team_id=<?php echo $_GET["id"]; ?>" class="btn btn-default"><i class='fa fa-area-chart'></i> Estadisticas</a> -->


<br><br>
		<?php

		if(count($teams)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th></th>
			</thead>
			<?php
			foreach($teams as $al){
				$alumn = $al->getTeam();
				?>
				<tr>
				<td><?php echo $alumn->name; ?></td>
				<td style="width:160px;"><a href="index.php?view=team&id=<?php echo $alumn->id;?>" class="btn btn-default btn-xs">Ver Grupo</a></td>
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