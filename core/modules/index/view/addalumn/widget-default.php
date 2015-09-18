<?php

if(count($_POST)>0){
	$user = new AlumnData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];

	$user->c1_fullname = $_POST["c1_fullname"];
	$user->c1_address = $_POST["c1_address"];
	$user->c1_phone = $_POST["c1_phone"];
	$user->c1_note = $_POST["c1_note"];

	$user->user_id = $_SESSION["user_id"];


	$u = $user->add();

	$at = new AlumnTeamData();
	$at->alumn_id = $u[1];
	$at->team_id = $_POST["team_id"];
	$at->add();

print "<script>window.location='index.php?view=team&id=$_POST[team_id]';</script>";


}


?>