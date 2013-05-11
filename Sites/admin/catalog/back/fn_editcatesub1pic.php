<?	
	@session_start();
?>
<!--ถ้าไม่ใส่บรรทัดนี้ จะทำให้แสดงข้อความภาษาไทยแล้ว เป็นอักขระที่อ่านไม่รู้เรื่อง-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <?

	$id_mem = $_SESSION[sess_idmem];

	/*$name_cate  = $_POST["name_cate"];*/
	$idedit = $_POST["catesub1_id"];

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


	$err = 0;
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
					
					//อ่านชื่อไฟล์เก่า ถ้าไม่ตรงกันจึงลบ
						$sql = "SELECT * FROM tb_catesub1 WHERE id_cate='$idedit'";
						$result = mysql_db_query($dbname,$sql);
						if($result && $r= mysql_fetch_array($result))
						{
							$filename_album 	= $r[pic_cate];
							if( $filename_album != '' )
							{
								if( stristr($newFileName, $filename_album) == FALSE )
								{
									$oldfile = "../../album/$menufolder/$filename_album";
									//echo $oldfile;
									if( file_exists($oldfile)==TRUE )
										unlink($oldfile);
								}
							}
						}
					
						$new_img= "../../album/$menufolder/$newFileName";
						
						 $size=GetimageSize($new_img);
						//echo $size[0];
						$sql = "update tb_catesub1 set pic_cate ='$newFileName' where id_cate ='$idedit' ";						
						if( mysql_db_query($dbname,$sql) == true )
						{
							
							if ($size[0] > 300) //ถ้ากวางมากกว่า 300 ถึง รีไซต์ 
							$imgsmall = resize($new_img,$new_img,'300',$ext);
							//ลบ buffer
							//if( file_exists($img)==TRUE )
							//unlink($img);
							
						
						}
						else
						{
							$err = 1;
						}
				}
				
			}
		
	}
	else
		$err == 3;
	
		
	
	
	if ($err == 0)
	{
		echo "<script language='javascript'>alert('บันทึกลงฐานข้อมูลเรียบร้อยแล้วค่ะ');</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=catesub1pic_edit.php?cateid=$idedit\" />";
	}
	else
	{
		echo "<script language='javascript'>alert('เกิดความผิดพลาดบางประการเกี่ยวกับการบันทึกลงฐานข้อมูล #$err');
		javascript:history.back();</script>";
	}
	
	
	
	mysql_close($cn);
?>