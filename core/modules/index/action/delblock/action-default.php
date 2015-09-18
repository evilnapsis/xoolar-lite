<?php
$user = BlockData::getById($_GET["id"]);
$team  =$user->team_id;
$user->del();
Core::redir("./?view=blocks&team_id=".$team);
?>