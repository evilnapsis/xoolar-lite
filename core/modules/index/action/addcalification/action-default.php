<?php

if(!empty($_POST)){
	$found = CalificationData::getByBA($_POST["block_id"],$_POST["alumn_id"]);
	if($found==null && $_POST["val"]!=""){
	$assis = new CalificationData();
	$assis->alumn_id = $_POST["alumn_id"];
	$assis->block_id = $_POST["block_id"];
	$assis->val = $_POST["val"];
	$assis->add();
	}else if($found=!null&&$_POST["val"]!=""){
	$found = CalificationData::getByBA($_POST["block_id"],$_POST["alumn_id"]);
	$found->val = $_POST["val"];
	$found->update();

	}else if($_POST["val"]==""){
		//$found = CalificationData::getByBA($_POST["alumn_id"],$_POST["block_id"]);
		//$found->del();
	}
}

?>