<?	
	$id=$_GET["id"];
	$picno=$_GET["picno"];

	include_once ("../include/connect.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);

	//ลบไฟล์ออกจากอัลบัม
	$sqlfind = "SELECT * FROM tb_product WHERE id_pd='$id' ";
	$resfind = mysql_db_query($dbname,$sqlfind);
	$rfind=mysql_fetch_array($resfind);

	//ลบชื่อไฟล์
	$err = 0;
	switch( $picno )
	{
		case 1:
			$sql = "UPDATE tb_product SET pic1_pd='' WHERE id_pd ='$id' ";
			$delfile = "../../album/$productfolder/$smallfolder/$rfind[pic1_pd]";
			$delfile = "../../album/$productfolder/$largefolder/$rfind[pic1_pd]";
			break;
		case 2:
			$sql = "UPDATE tb_product SET pic2_pd='' WHERE id_pd ='$id' ";
			$delfile = "../../album/$productfolder/$smallfolder/$rfind[pic2_pd]";
			$delfile2 = "../../album/$productfolder/$largefolder/$rfind[pic2_pd]";
			break;
		case 3:
			$sql = "UPDATE tb_product SET pic3_pd='' WHERE id_pd ='$id' ";
			$delfile = "../../album/$productfolder/$smallfolder/$rfind[pic3_pd]";
			$delfile2 = "../../album/$productfolder/$largefolder/$rfind[pic3_pd]";
			break;
		case 4:
			$sql = "UPDATE tb_product SET pic4_pd='' WHERE id_pd ='$id' ";
			$delfile = "../../album/$productfolder/$smallfolder/$rfind[pic4_pd]";
			$delfile2 = "../../album/$productfolder/$largefolder/$rfind[pic4_pd]";
			break;
		case 5:
			$sql = "UPDATE tb_product SET pic5_pd='' WHERE id_pd ='$id' ";
			$delfile = "../../album/$productfolder/$smallfolder/$rfind[pic5_pd]";
			$delfile2 = "../../album/$productfolder/$largefolder/$rfind[pic5_pd]";
			break;
	   case 6:
			$sql = "UPDATE tb_product SET pic6_pd='' WHERE id_pd ='$id' ";
			$delfile = "../../album/$productfolder/$smallfolder/$rfind[pic6_pd]";
			$delfile2 = "../../album/$productfolder/$largefolder/$rfind[pic6_pd]";
			break;
			
	}

	if( mysql_db_query($dbname,$sql) == true )
	{
		if( file_exists($delfile)==true )
			unlink($delfile);
			
		if( file_exists($delfile2)==true )
			unlink($delfile2);	
			
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