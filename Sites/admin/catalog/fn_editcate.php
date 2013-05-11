<?	
	@session_start();

?>
<!--ถ้าไม่ใส่บรรทัดนี้ จะทำให้แสดงข้อความภาษาไทยแล้ว เป็นอักขระที่อ่านไม่รู้เรื่อง-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	 $name_cate=$_POST["name_cate"];
	$id_edit=$_POST["idedit"];
	$inpContent2 = $_POST["inpContent2"];
	/*$youtube_url = $_POST["youtube"];
	$more = $_POST["more"];
	$downloadlink = $_POST["downloadlink"];*/
	
	$status_cate = 0;
			
/*			
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
	} */
	
	$name_cate = urldecode($name_cate);
	
	//ตัด \r\n
	$needcut = array("\r\n", "\n", "\r");
	$inpContent = str_replace($needcut, "", $inpContent);
	$inpContent2 = str_replace($needcut, "", $inpContent2);

	
	if ($youtube_url != "")
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
	}
	
	
	include ("../include/connect.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);
	$err = 0;
	//update each field
		$sql = "update tb_catemain set";
		$sql .= " name_cate='$name_cate',";
		$sql .= " detail_cate='$inpContent2' ";
		/*$sql .= " youtube='$id_youtube',";
		$sql .= " download_pdf='$downloadlink',";
		$sql .= " more='$more'";*/
		
		$sql .= " where id_cate ='$id_edit' ";
		//echo $sql;
	if( mysql_db_query($dbname,$sql) == true )
	{
		$err = 0;
		//get lastest row
		$lastid = $id_edit;
		
		
/*		if( $docsave == 1 )
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
								$sqll = "update tb_catemain set download_pdf ='$newFileName' where id_cate ='$lastid' ";						
								if( mysql_db_query($dbname,$sqll) == false )
								$err = 2;				
							}
						}
						
				}
			}
		} */
	}
	
	if ($err == 0)
	{
		echo "<script language='javascript'>alert('บันทึกลงฐานข้อมูลเรียบร้อยแล้วค่ะ');</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=cate_edit.php?cateid=$id_edit\" />";
	}
	else
	{
		echo "<script language='javascript'>alert('เกิดความผิดพลาดบางประการเกี่ยวกับการบันทึกลงฐานข้อมูล #$err');
		javascript:history.back();</script>";
	}
		

			  function getYouTubeIdFromURL($url)
	{
	  $url_string = parse_url($url, PHP_URL_QUERY);
	  parse_str($url_string, $args);
	  return isset($args['v']) ? $args['v'] : false;
	}
?>