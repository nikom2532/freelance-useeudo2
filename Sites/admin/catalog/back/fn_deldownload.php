<?	
	$id=$_GET["id"];
	

	include_once ("../include/connect.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);

	//ลบไฟล์ออกจากอัลบัม
	$sqlfind = "SELECT * FROM tb_product WHERE id_pd='$id' ";
	$resfind = mysql_db_query($dbname,$sqlfind);
	$rfind=mysql_fetch_array($resfind);

	//ลบชื่อไฟล์
	

	$sql = "UPDATE tb_product SET download_pd='' WHERE id_pd ='$id' ";
	$delfile = "../../album/$downloadfolder/$rfind[download_pd]";

	

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