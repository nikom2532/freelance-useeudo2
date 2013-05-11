<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$newtype[1]="ข่าวประชาสัมพันธ์";
$newtype[]="ข่าวเกี่ยวกับอุ่นใจ";
$newtype[]="ข่าวรับสมัครงาน";
$newtype[]="ข่าวปัญหาสังคม";

function displaydate($x)
{
	$date_m = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย","ก.ค.","ส.ค.",				   					"ก.ย.","ต.ค.","พ.ย.","ธ.ค.");

	$time_array=explode(" ",$x);

	$date = $time_array[0];
	$time = $time_array[1];

	$date_array=explode("-",$date);
	
	$y = $date_array[0]+543;
	$m = $date_array[1]-1;
	$d = $date_array[2];

	$m=$date_m[$m];
	$displaydate= "$d$m$y";
	return $displaydate;
}

function displaytime($x)
{
	$time_array=explode(" ",$x);
	$date = $time_array[0];
	$time = $time_array[1];

	//$date_array=explode("-",$date);
	
	/*$y = $date_array[0]+543;
	$m = $date_array[1]-1;
	$d = $date_array[2];

	$m=$date_m[$m];*/
	$displaytime= "$time";
	return $displaytime;
}
?>
</body>
</html>
