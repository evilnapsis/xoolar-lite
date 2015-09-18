<?php

if(count($_POST)>0){
	$user = new TeamData();
	$user->name = $_POST["name"];
	$user->is_favorite = isset($_POST["is_favorite"]) ? 1 :0;
	$user->user_id = $_SESSION["user_id"];
	
	$user->add();

print "<script>window.location='index.php?view=teams';</script>";


}


?>