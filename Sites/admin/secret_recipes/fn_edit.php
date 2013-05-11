<?	
	@session_start();
?>

<!--ถ้าไม่ใส่บรรทัดนี้ จะทำให้แสดงข้อความภาษาไทยแล้ว เป็นอักขระที่อ่านไม่รู้เรื่อง-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?
	$id_mem = $_SESSION[sess_idmem];

	$edit_id=$_POST["edit_id"];
	$sub_idArr=$_POST["sub_id"];
	
	$name=$_POST["name_service"];
	$subnameArr=$_POST["name_sub"];
	$youtubesubArr=$_POST["youtube_sub"];


	include ("../include/connect.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);

		$err = 0;
	
		//get lastest row
		$lastid = $edit_id;
		$subid = $sub_id;
		
		//update each field
		$sql = "update tb_catesecret set";
		$sql .= " name_cate='$name' ";
		$sql .= " where id_cate ='$lastid' ";
	
	//exit ($sql); 
	if( mysql_db_query($dbname,$sql) == true )
	{
			if (sizeof($subnameArr) > 0)
			{
				foreach( $subnameArr as $key => $n )
				 {
					$youtube_url = $youtubesubArr[$key];
					
					 	if ($youtube_url != "")
						{
							
									if( strncmp($youtube_url, "http:", 5) == 0 ||
										strncmp($youtube_url, "https:", 6) == 0 ||
										strncmp($youtube_url, "www.", 4) == 0 )
									{
										$id_youtube = getYouTubeIdFromURL($youtube_url); 
										echo getYouTubeIdFromURL($youtube_url);
									}
									else
									{
										$id_youtube = $youtube_url;
									}
						}	
					 
					 
					$sub_idArr[$key];
					$sql_sub = "update tb_catesecretsub1 set";
					$sql_sub .= " name_cate='$n',";
					$sql_sub .= " youtube='$id_youtube' ";
					$sql_sub .= " where id_cate ='$sub_idArr[$key]' ";
					if( mysql_db_query($dbname,$sql_sub) == true )
						{
							
						}
				 }
	 		}
	}

	mysql_close($cn);

	//respond
	if( $err == 0 )
	{
		echo "<script language='javascript'>alert('บันทึกลงฐานข้อมูลเรียบร้อยแล้วค่ะ');</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=secret_edit.php?id=$edit_id\" />";
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