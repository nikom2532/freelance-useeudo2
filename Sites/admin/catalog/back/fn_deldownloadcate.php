<?	
	$id=$_GET["id"];
	

	include_once ("../include/connect.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);

	//ลบไฟล์ออกจากอัลบัม
	$sqlfind = "SELECT * FROM tb_catemain WHERE id_cate='$id' ";
	$resfind = mysql_db_query($dbname,$sqlfind);
	$rfind=mysql_fetch_array($resfind);

	//ลบชื่อไฟล์
	

	$sql = "UPDATE tb_catemain SET download_pdf='' WHERE id_cate ='$id' ";
	$delfile = "../../album/$downloadfolder/$rfind[download_pdf]";

	
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