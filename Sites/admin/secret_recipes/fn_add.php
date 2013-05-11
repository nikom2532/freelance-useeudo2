<?	
	@session_start();
?>

<!--ถ้าไม่ใส่บรรทัดนี้ จะทำให้แสดงข้อความภาษาไทยแล้ว เป็นอักขระที่อ่านไม่รู้เรื่อง-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?
	$id_mem = $_SESSION[sess_idmem];

	date_default_timezone_set('Asia/Bangkok');
	$name=$_POST["name_service"];
	$inpContent=$_POST["inpContent"];
	//$credit = $_POST["credit_service"];
	//$mainid=$_POST["main_cate"];
	//$code=$_POST["code_promotion"];
	//$price=$_POST["price"];
	//$start_datetrip = $_POST["start_date"];
	//$end_datetrip = $_POST["end_date"];
	
	
	$dosave = 0;
	for( $x=0 ; $x < 1 ; $x++ )
	{
		//echo $x;
		$fileid = $x;
		$newfile = sprintf("file_array%d", ($x));
		if( $_FILES[$newfile]['name'] != '' )
		{
			$fileidArr[$x] = $fileid;
			$filenameArr[$x] = $_FILES[$newfile]['name'];
			$filecontentArr[$x] = $_FILES[$newfile]['tmp_name'];
			$dosave = 1;
		}
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
	
	//$name = urldecode($name);

	//ตัด \r\n
	$needcut = array("\r\n", "\n", "\r");
	$inpContent = str_replace($needcut, "", $inpContent);
	
	

	include ("../include/connect.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);

	$err = 0;
	//insert 1 row
	$sql="insert into tb_catesecret (id_cate,id_mem) value('','1')";
	if( mysql_db_query($dbname,$sql) == true )
	{
		//get lastest row
		$lastid = mysql_insert_id();
		

		//update each field
		$sql = "update tb_catesecret set";
		$sql .= " name_cate='$name',";
		/*$sql .= " detail_service='$inpContent',";*/
		$sql .= " show_cate='1'";
		$sql .= " where id_cate ='$lastid' ";
		//$sql .= " price_pm='$price',";
	
		//exit( $sql);
		if( mysql_db_query($dbname,$sql) == false )
			$err = 1;
		
		if( $dosave == 1 )
		{
			for( $x=0 ; $x < 1 ; $x++ )
			{
				$id = $fileidArr[$x];
				$file_data = "";
		
				if($filecontentArr[$x] != '')
				{
					$ext = pathinfo($filenameArr[$x], PATHINFO_EXTENSION);
					$newFileName = md5($filecontentArr[$x].date("d-m-Y H:i:s")).'.'.$ext;
					
					if( move_uploaded_file($filecontentArr[$x], "../../album/promotion/$newFileName") == TRUE )
					{
						
						switch( $x )
						{
							case 0;
								$sql = "update tb_promotion set pic_service ='$newFileName' where id_service ='$lastid' ";						
								break;	
							/*case 1;
								$sql = "update tb_product set pic2_pd ='$newFileName' where id_pd ='$lastid' ";						
								break;		
							case 2;
								$sql = "update tb_product set pic3_pd ='$newFileName' where id_pd ='$lastid' ";						
								break;	
							case 3;
								$sql = "update tb_product set pic4_pd ='$newFileName' where id_pd ='$lastid' ";						
								break;	
							case 4;
								$sql = "update tb_product set pic5_pd ='$newFileName' where id_pd ='$lastid' ";						
								break;	*/
						}
						if( mysql_db_query($dbname,$sql) == false )
							$err = 2;				
					}
				}
			}
		}
		
		if( $docsave == 1 )
		{
			for( $x=0 ; $x < 1 ; $x++ )
			{
				$id = $fileidArrload[$x];
				$file_data = "";
		
				if($filecontentArrload[$x] != '')
				{
					$ext = pathinfo($filenameArrload[$x], PATHINFO_EXTENSION);
					$ext = strtolower($ext);
					$newFileName = md5($filecontentArrload[$x].date("d-m-Y H:i:s")).'.'.$ext;
					
						if($ext == "pdf") //ตรวจสอบนามสกุล
						{
							if( move_uploaded_file($filecontentArrload[$x], "../../album/$downloadfolder/$newFileName") == TRUE )
							{
								$sql = "update tb_promotion set download_pd ='$newFileName' where id_pm ='$lastid' ";						
								if( mysql_db_query($dbname,$sql) == false )
								$err = 2;				
							}
						}
						
				}
			}
		}	

	}
	else
	{
		$err = 3;
	}

	mysql_close($cn);

	//respond
	if( $err == 0 )
	{
		echo "<script language='javascript'>alert('บันทึกลงฐานข้อมูลเรียบร้อยแล้วค่ะ');</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=secret_add.php\" />";
	}
	else
	{
		echo "<script language='javascript'>alert('เกิดความผิดพลาดบางประการเกี่ยวกับการบันทึกลงฐานข้อมูล #$err');
		javascript:history.back();</script>";
	}

?>