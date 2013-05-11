<?	
	@session_start();
?>
<!--ถ้าไม่ใส่บรรทัดนี้ จะทำให้แสดงข้อความภาษาไทยแล้ว เป็นอักขระที่อ่านไม่รู้เรื่อง-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	$name_cate=$_POST["name_cate"];
	$detail_cate=$_POST["inpContent2"];
//	$youtube_url=$_POST["youtube"];
//	$more=$_POST["more"];
//	$downloadlink = $_POST["downloadlink"];
//	$status_cate=$_GET["status_cate"];
	$status_cate = 0;
/*
	$fileid = 1;
	$dosave = 0;
	$newfile = "file_name";
	if( $_FILES[$newfile]['name'] != '' )
	{
		$fileidArr = $fileid;
		$filenameArr = $_FILES[$newfile]['name'];
		$filecontentArr= $_FILES[$newfile]['tmp_name'];
		$dosave = 1;
	}
	

	$docsave = 0;
	for( $x=0 ; $x < 1 ; $x++ )
	{
		$fileloadid = $x+1;
		$newfile = sprintf("file_arrayload%d", ($x+1));
		if( $_FILES[$newfile]['name'] != '' )
		{
			$fileidArrload[$x] = $fileloadid;
			$filenameArrload[$x] = $_FILES[$newfile]['name'];
			$filecontentArrload[$x] = $_FILES[$newfile]['tmp_name'];
			$docsave = 1;
		}
	}
*/	

	$name_cate = urldecode($name_cate);
	
	
	$needcut = array("\r\n", "\n", "\r");
	$detail_cate = str_replace($needcut, "", $detail_cate);
	
	/*if ($youtube_url != "")
	{
				if( strncmp($youtube_url, "http:", 5) == 0 ||
					strncmp($youtube_url, "https:", 6) == 0 ||
					strncmp($youtube_url, "www.", 4) == 0 )
				{
					$id_youtube = getYouTubeIdFromURL($youtube_url);
				}
				else
				{
					$id_youtube = $youtube_url;
				}
	}*/
	
	
	include ("../include/connect.php");
	include ("../include/function.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);
	
	
	$err = 0;
	$sql = "insert into tb_catemain values('','$name_cate','$status_cate','1','0','','',	'$detail_cate','','','')";
	//exit($sql);
	if( mysql_db_query($dbname,$sql) == true )
	{
		$err = 0;
		//get lastest row
		$lastid = mysql_insert_id();
		
/*		if( $dosave == 1 )
		{
			
				$id = $fileidArr;
				$file_data = "";
				if($filecontentArr != '')
				{
					$ext = pathinfo($filenameArr, PATHINFO_EXTENSION);
					$newFileName = md5($filecontentArr.date("d-m-Y H:i:s")).'.'.$ext;
					
					if( move_uploaded_file($filecontentArr, "../../album/$menufolder/$newFileName") == TRUE )
					{
						
						$new_img= "../../album/$menufolder/$newFileName";
						
						 $size=GetimageSize($new_img);
						//echo $size[0];
						$sql = "update tb_catemain set pic_cate ='$newFileName' where id_cate ='$lastid' ";						
						if( mysql_db_query($dbname,$sql) == true )
						{
							
						    if ($size[0] > 300) //ถ้ากวางมากกว่า 300 ถึง รีไซต์ 
							$imgsmall = resize($new_img,$new_img,'300',$ext);
							//ลบ buffer
							//if( file_exists($img)==TRUE )
//							unlink($img);
							
							$err = 0;
						}
					}
					
				}
			
		}
		
	
	else
		if( $docsave == 1 )
		{
			for( $x=0 ; $x < 1 ; $x++ )
			{
				$id = $fileidArrload[$x];
				$file_data = "";
		
				if($filecontentArrload[$x] != '')
				{
					$ext = pathinfo($filenameArrload[$x], PATHINFO_EXTENSION);
					$ext=strtolower($ext);
					$newFileName = md5($filecontentArrload[$x].date("d-m-Y H:i:s")).'.'.$ext;
					
						if($ext == "pdf") //ตรวจสอบนามสกุล
						{
							if( move_uploaded_file($filecontentArrload[$x], "../../album/$downloadfolder/$newFileName") == TRUE )
							{
								$sql = "update tb_catemain set download_pdf ='$newFileName' where id_cate ='$lastid' ";						
								if( mysql_db_query($dbname,$sql) == false )
								$err = 2;				
							}
						}
						
				}
			}
		} */
}
	else
	$err = 1;
	
	if ($err == 0)
	{
		echo "<script language='javascript'>alert('บันทึกลงฐานข้อมูลเรียบร้อยแล้วค่ะ');</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=cate_add.php\" />";
	}
	else
	{
		echo "<script language='javascript'>alert('เกิดความผิดพลาดบางประการเกี่ยวกับการบันทึกลงฐานข้อมูล #$err');
		javascript:history.back();</script>";
	}
		
	mysql_close($cn);
	
		  function getYouTubeIdFromURL($url)
	{
	  $url_string = parse_url($url, PHP_URL_QUERY);
	  parse_str($url_string, $args);
	  return isset($args['v']) ? $args['v'] : false;
	}
	

?>