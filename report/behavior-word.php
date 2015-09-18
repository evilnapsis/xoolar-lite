<?php
include "../core/autoload.php";
include "../core/modules/index/model/TeamData.php";
include "../core/modules/index/model/AlumnTeamData.php";
include "../core/modules/index/model/AlumnData.php";
include "../core/modules/index/model/BehaviorData.php";

require_once '../PhpWord/Autoloader.php';
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

Autoloader::register();

$word = new  PhpOffice\PhpWord\PhpWord();

$team =  TeamData::getById($_GET["team_id"]);
$alumns = AlumnTeamData::getAllByTeamId($_GET["team_id"]);
$range= ((strtotime($_GET["finish_at"])-strtotime($_GET["start_at"]))+(24*60*60)) /(24*60*60);

$section1 = $word->AddSection();
$section1->addText("LISTA DE COMPORTAMIENTO - ".strtoupper($team->name),array("size"=>22,"bold"=>true,"align"=>"right"));


$styleTable = array('borderSize' => 6, 'borderColor' => '888888', 'cellMargin' => 40);
$styleFirstRow = array('borderBottomColor' => '0000FF', 'bgColor' => 'AAAAAA');

$table1 = $section1->addTable("table1");
$table1->addRow();
$table1->addCell()->addText("Nombre Completo");
for($i=0;$i<$range;$i++){ 
$table1->addCell()->addText(date("d-M",strtotime($_GET["start_at"])+($i*(24*60*60))));
}

foreach($alumns as $al){
$alumn = $al->getAlumn();
$table1->addRow();
$table1->addCell(3000)->addText($alumn->name." ".$alumn->lastname);
for($i=0;$i<$range;$i++){ 
	$date_at= date("Y-m-d",strtotime($_GET["start_at"])+($i*(24*60*60)));
	$asist = BehaviorData::getByATD($alumn->id,$_GET["team_id"],$date_at);
$v = "";
if($asist!=null){
						if($asist->kind_id==1){ $v="B"; }
						else if($asist->kind_id==2){ $v="E"; }
						else if($asist->kind_id==3){ $v="M"; }
						else if($asist->kind_id==4){ $v= "MM"; }
						
					}else{
						$v="N";
					}
$table1->addCell()->addText($v);
}

}

$word->addTableStyle('table1', $styleTable,$styleFirstRow);
/// datos bancarios
$section1->addText("");
$section1->addText("");
$section1->addText("");
$section1->addText("Generado por Xoolar Lite v1.0");
$filename = "behavior-".time().".docx";
#$word->setReadDataOnly(true);
$word->save($filename,"Word2007");
//chmod($filename,0444);
header("Content-Disposition: attachment; filename='$filename'");
readfile($filename); // or echo file_get_contents($filename);
unlink($filename);  // remove temp file



?>