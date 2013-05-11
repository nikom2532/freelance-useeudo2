<?	
	@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<?
	$id_mem = $_SESSION[sess_idmem];
	$name_cate = $_POST["name_cate"];
	$detail_cate = $_POST["inpContent2"];
	$catemainid =$_POST['id_edit'];


$dosave = 0;
	for( $x=0 ; $x < 1 ; $x++ )
	{
		$fileid = $x+1;
		$newfile = sprintf("file_array%d", ($x+1));
		if( $_FILES[$newfile]['name'] != '' )
		{
			$fileidArr[$x] = $fileid;
			$filenameArr[$x] = $_FILES[$newfile]['name'];
			$filecontentArr[$x] = $_FILES[$newfile]['tmp_name'];
			$dosave = 1;
		}
	}
	$docsave = 0;
		for( $i=0 ; $i < 1 ; $i++ )
		{
			$docfileid = $i+1;
			$docnewfile = sprintf("file_arrayload%d", ($i+1));
			if( $_FILES[$docnewfile]['name'] != '' )
			{
				$docfileidArr[$i] = $docfileid;
				$docfilenameArr[$i] = $_FILES[$docnewfile]['name'];
				$docfilecontentArr[$i] = $_FILES[$docnewfile]['tmp_name'];
				$docsave = 1;
			}
		}
	$name = urldecode($name);


	//ตัด \r\n
	$needcut = array("\r\n", "\n", "\r");
	$detail_cate = str_replace($needcut, "", $detail_cate);
	
	include ("../include/connect.php");
	include ("../include/function.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);

	$err = 0;
	$lastid = $edit_id;
	$sql = "update tb_catemain set";
	$sql .= " name_cate='$name_cate',";
	$sql .= " detail_cate='$detail_cate'";
	$sql .="where id_cate ='$catemainid'";
	
	if( mysql_db_query($dbname,$sql) == false )
	$err= 2;
	
if ($err == 0)
	{
		echo "<script language='javascript'>alert('บันทึกลงฐานข้อมูลเรียบร้อยแล้วค่ะ');</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=catesub1_edit1.php?cateid=$catemainid\" />";
	}
	else
	{
		echo "<script language='javascript'>alert('เกิดความผิดพลาดบางประการเกี่ยวกับการบันทึกลงฐานข้อมูล #$err');
		javascript:history.back();</script>";
	}
	
	mysql_close($cn);





?>