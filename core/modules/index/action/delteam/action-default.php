<?php
$user = TeamData::getById($_GET["id"]);
$user->del();
print "<script>window.location='index.php?view=teams';</script>";

?>