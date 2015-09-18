<?php

if(!empty($_GET)){
	$at = AlumnTeamData::getByAT($_GET["al_id"],$_GET["t_id"]);
	if($at==null){
		$at = new AlumnTeamData();
		$at->team_id = $_GET["t_id"];
		$at->alumn_id = $_GET["al_id"];
		$at->add();
		Core::alert("Asignacion de grupo exitosa!");
		Core::redir("./?view=openalumn&id=".$_GET["al_id"]);
	}
}


?>