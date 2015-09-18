		<?php

		$alumns = AlumnTeamData::getAllByTeamId($_GET["team_id"]);
		if(count($alumns)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>
			</th>
			</thead>
			<?php
			foreach($alumns as $al){
				$alumn = $al->getAlumn();
				$val = CalificationData::getByBA($_GET["block_id"],$alumn->id);
				?>
				<tr>
				<td style="width:250px;"><?php echo $alumn->name." ".$alumn->lastname; ?></td>
				<td >
				<form id="form-<?php echo $al->id; ?>">
				<input type="hidden" name="alumn_id" value="<?php echo $alumn->id; ?>">
				<input type="hidden" name="block_id" value="<?php echo $_GET["block_id"]; ?>">
				<input type="text" class="form-control" id="input-<?php echo $al->id; ?>" required name="val" value="<?php if($val!=null){ echo $val->val;}?>">
				</form>
				<script>
				$("#input-<?php echo $al->id; ?>").keyup(function(){
					$.post("./?action=addcalification",$("#form-<?php echo $al->id; ?>").serialize(), function(data){
						console.log(data);
					});
				});



				</script>
				</td>
				</tr>
				<?php

			}
echo "</table>";


		}else{
			echo "<p class='alert alert-danger'>No hay Grupos</p>";
		}


		?>
