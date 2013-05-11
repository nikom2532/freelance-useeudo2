<?	
	@session_start();
?>
<!--ถ้าไม่ใส่บรรทัดนี้ จะทำให้แสดงข้อความภาษาไทยแล้ว เป็นอักขระที่อ่านไม่รู้เรื่อง-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	$name_brand=$_POST["name_brand"];
//	$status_cate=$_GET["status_cate"];
	$status_cate = 0;

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

	$name_cate = urldecode($name_cate);
	
	include ("../include/connect.php");
	include ("../include/function.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);
	$err = 0;
	$sql="insert into tb_brand values('','$name_brand','','')";
	if( mysql_db_query($dbname,$sql) == true )
	{
		$err = 0;
		//get lastest row
		$lastid = mysql_insert_id();
		
		if( $dosave == 1 )
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
						$sql = "update tb_brand set pic_brand ='$newFileName' where id_brand ='$lastid' ";						
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
	
	
	

?>