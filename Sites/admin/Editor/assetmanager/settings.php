<?
@session_start();

$bReturnAbsolute=true;

/*
$sBaseVirtual0="/FILEMGR";  //Assuming that the path is http://yourserver/Editor/assets/ ("Relative to Root" Path is required)
$sBase0="c:/AppServ/www/FILEMGR/".$_SESSION[sess_idmem]; //The real path
//$sBase0="/home/yourserver/web/Editor/assets"; //example for Unix server
$sName0="FILEMGR";


$sBaseVirtual0="/FILEMGR";  //Assuming that the path is http://yourserver/Editor/assets/ ("Relative to Root" Path is required)
$sBase0="/home/webiokc1/domains/webiok.com/public_html/backend/FILEMGR"; //The real path
//$sBase0="/home/yourserver/web/Editor/assets"; //example for Unix server
$sName0="FILEMGR";
*/

//on Hosting
$sBaseVirtual0="/FILEMGR";
$sBase0="/home/kpjmotor/domains/kpjmotor.com/public_html/admin/FILEMGR";
$sName0="FILEMGR";

//สร้างโฟลเดอร์
if (!is_dir($sBase0))
	mkdir($sBase0, 0777);

$sBaseVirtual1="";
$sBase1="";
$sName1="";

$sBaseVirtual2="";
$sBase2="";
$sName2="";

$sBaseVirtual3="";
$sBase3="";
$sName3="";
?>