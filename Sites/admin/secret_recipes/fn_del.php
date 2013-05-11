<?	
	@session_start();

	$id_mem = $_SESSION[sess_idmem];
	
	$delall = $_GET["del"];

	$delid = explode(",", $delall);
	//echo $delall;
	include ("../include/connect.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);
	
    $x = 0;
	while( $delid[$x] != "" )
	{
		
		//อ่านชื่อไฟล์เก่า เพื่อลบไฟล์ด้วย
	/*	$sql = "SELECT * FROM tb_catesecret WHERE id_cate='$delid[$x]'";
		$result = mysql_db_query($dbname,$sql);
		if($result && $r= mysql_fetch_array($result))
		{
			
				for( $i=0 ; $i < 1 ; $i++ )
				{
						
						$filename_album = $r[pic_tm];
						if( $filename_album != '' )
						{
								$oldfile = "../../album/promotion/$filename_album";
								//echo $oldfile;
								if( file_exists($oldfile)==TRUE )
								unlink($oldfile);
							
						}
				}
		}*/
		
		//echo $delid[$x];
		$sql="delete from tb_catesecret where id_cate ='$delid[$x]'";
		if( mysql_db_query($dbname,$sql) == false )
		{
			echo "ERROR";
			mysql_close($cn);
			exit();
		}
		$x++;
		
	$sql_sub="delete from tb_catesecretsub1 where mainid_cate ='$delid[$x]'";
		if( mysql_db_query($dbname,$sql_sub) == false )
		{
			echo "ERROR";
			mysql_close($cn);
			exit();
		}
		$x++;
}
	echo "OK";
	mysql_close($cn); 
	
?>