<?php

if(count($_POST)>0){
	$user = TeamData::getById($_POST["team_id"]);
	$user->name = $_POST["name"];
	$user->is_favorite = isset($_POST["is_favorite"]) ? 1 :0;
	
	$user->update();

print "<script>window.location='index.php?view=teams';</script>";


}


?>