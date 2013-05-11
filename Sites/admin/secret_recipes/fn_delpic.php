<?	
	$id=$_GET["id"];
	$picno=$_GET["picno"];

	include_once ("../include/connect.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);

	//ลบไฟล์ออกจากอัลบัม
	$sqlfind = "SELECT * FROM tb_promotion WHERE id_service='$id' ";
	$resfind = mysql_db_query($dbname,$sqlfind);
	$rfind=mysql_fetch_array($resfind);

	//ลบชื่อไฟล์
		$sql = "UPDATE tb_promotion SET pic_service='' WHERE id_service ='$id' ";
		$delfile = "../../album/promotion/$rfind[pic_service]";
		
	if( mysql_db_query($dbname,$sql) == true )
	{
		if( file_exists($delfile)==true )
			unlink($delfile);
	}
	else
	{
		$err = 1;
	}

	//respond
	if( $err )
		echo "ERROR";
	else
		echo "OK";
?>