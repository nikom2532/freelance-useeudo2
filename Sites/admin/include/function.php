<?php

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


function checkemail($checkemail)
{
	if(ereg("^[^@ ]+@([a-zA-Z0-9\-]+\.)+([a-zA-Z0-9\-]{2}
		|net|com|gov|mil|org|edu|int|co.th)$",$checkemail))
	{
		return true;
	}
	else
	{
		return false;
	}

}

 function statuspd($statid){
			
		 include ("../include/connect.php");
		 mysql_query("SET NAMES UTF8");
		//อ่านสถานะจากฐานข้อมูล
		$sqlst = "SELECT * FROM tb_pdstatus ORDER BY id_ps";
		$resultst = mysql_db_query($dbname,$sqlst);
		$sel_catemain = "<option value='0'>-----ไม่ระบุ -----</option>";
		while($rst=mysql_fetch_array($resultst))
		{
			$id_ps = sprintf("%d", $rst[id_ps]);
			$name_ps = $rst[name_ps];
											
			if( $statid== $id_ps )
				$sel_catemain .= "<option value='$id_ps' selected='selected' >";
			else
				$sel_catemain .= "<option  style='background-color:#ffffff' value='$id_ps'>";

			$sel_catemain .= $name_ps;
			$sel_catemain .= "</option>";
		}
	return $sel_catemain;
 } 
 
 function brand($brandid){
			
		 include ("../include/connect.php");
		 mysql_query("SET NAMES UTF8");
		//อ่านสถานะจากฐานข้อมูล
		$sqlst = "SELECT * FROM tb_brand ORDER BY id_brand";
		$resultst = mysql_db_query($dbname,$sqlst);
		$sel_catemain = "<option value='0'>-----ไม่ระบุ -----</option>";
		while($rst=mysql_fetch_array($resultst))
		{
			$id_brand = sprintf("%d", $rst[id_brand]);
			$name_brand = $rst[name_brand];
											
			if( $brandid== $id_brand )
				$sel_catemain .= "<option value='$id_brand' selected='selected' >";
			else
				$sel_catemain .= "<option  style='background-color:#ffffff' value='$id_brand'>";

			$sel_catemain .= $name_brand;
			$sel_catemain .= "</option>";
		}
	return $sel_catemain;
 } 
 
 function resize($images , $new_images , $width ,$ext)
	{
		               $re_value= false;
						$size=GetimageSize($images);
						$height=round($width*$size[1]/$size[0]);
						//$images_orig = ImageCreateFromJPEG($images);
						
					    $valid_exts = array("jpg","jpeg","gif","png");
						
						
						   // ตรวจสอบนามสกุล
							if(in_array($ext,$valid_exts))
							{
								
								if($ext == "jpg" || $ext == "jpeg")
								{
								$images_orig =ImageCreateFromJPEG($images);
								}
								else if($ext == "gif")
								{
								$images_orig = ImageCreateFromGIF($images);
								}
								else if($ext == "png")
								{
								$images_orig = ImageCreateFromPNG($images);
								}
								
								$photoX = ImagesX($images_orig);
								$photoY = ImagesY($images_orig);
								$images_fin = ImageCreateTrueColor($width, $height);
								ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
								ImageJPEG($images_fin,$new_images);
								ImageDestroy($images_orig);
								ImageDestroy($images_fin);	
								
								$re_value = true;
					         }
							 else
						  return  $re_value;
					 
					
	 }
	

?>