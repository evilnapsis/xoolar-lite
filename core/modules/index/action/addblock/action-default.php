<?php
if(isset($_POST)){
	print_r($_POST);
$p = new BlockData();
$p->name = $_POST['name'];
$p->team_id = $_POST['team_id'];
$p->add();
Core::redir("./?view=blocks&team_id=".$_POST["team_id"]);
}
?>