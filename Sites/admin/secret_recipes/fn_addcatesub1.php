<?	
	@session_start();
?>
<!--ถ้าไม่ใส่บรรทัดนี้ จะทำให้แสดงข้อความภาษาไทยแล้ว เป็นอักขระที่อ่านไม่รู้เรื่อง-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <?

	$id_mem = $_SESSION[sess_idmem];

	$name_cate  = $_POST["name_cate"];
	$catemainid = $_POST["catemainid"];
	
	$max = $_POST["hdnMaxLine"];
	//$youtube_url=$_POST["hdnMaxLineYou"];

	$name_cate = urldecode($name_cate);

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
	
	


	include ("../include/connect.php");
	include ("../include/function.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);

		
		for($i=1;$i<=(int)($max);$i++)

					{
						
						$name = $_POST["name$i"];
						$youtube_url = $_POST["youtube$i"];
						
						echo $youtube_url;
						
						
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
						
					$sql="insert into tb_catesecretsub1 values('','$name','$catemainid','1','','$id_youtube','')";
					$err = 0;
					if( mysql_db_query($dbname,$sql) == true )
					{
						
					}
		
	}
		

		/*if( $dosave == 1 )
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
						$sql = "update tb_catesub1 set pic_cate ='$newFileName' where id_cate ='$lastid' ";						
						if( mysql_db_query($dbname,$sql) == true )
						{
							
						    if ($size[0] > 300) //ถ้ากวางมากกว่า 300 ถึง รีไซต์ 
							$imgsmall = resize($new_img,$new_img,'300',$ext);*/
							//ลบ buffer
							//if( file_exists($img)==TRUE )
//							unlink($img);
							
					/*	}
						else
						{
							$err = 1;
						}
					}
					
				}
			
		}*/
		
	
	/*if ($err == 0)
	{
		echo "<script language='javascript'>alert('บันทึกลงฐานข้อมูลเรียบร้อยแล้วค่ะ');</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=secret_edit.php?id=$catemainid\" />";
	}
	else
	{
		echo "<script language='javascript'>alert('เกิดความผิดพลาดบางประการเกี่ยวกับการบันทึกลงฐานข้อมูล #$err');
		javascript:history.back();</script>";
	}*/
		mysql_close($cn);
		
		  function getYouTubeIdFromURL($url)
	{
	  $url_string = parse_url($url, PHP_URL_QUERY);
	  parse_str($url_string, $args);
	  return isset($args['v']) ? $args['v'] : false;
	}
	

?>