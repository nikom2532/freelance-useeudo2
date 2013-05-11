<?
	//if( isset($_GET[id_view]))
	{
		$id = $_GET[id];
		$picnum = $_GET[picnum];

   		include("../include/connect.php");

		$sql = "select * from tb_product where id_pd = '$id'";
		
		//$sql = "select * from tb_product where id_prod ='1'";
		$result = mysql_db_query($dbname,$sql);
		$r=mysql_fetch_array($result);

		header("Content-Type: image/jpg");

		switch( $picnum )
		{
			case 1:
				echo $r[pic1_pd];
				break;
			case 2:
				echo $r[pic2_pd];
				break;
			case 3:
				echo $r[pic3_pd];
				break;
			case 4:
				echo $r[pic4_pd];
				break;
			case 5:
				echo $r[pic5_pd];
				break;
		}

/*		$fp = fopen("test.jpg","w");
		fwrite($fp, $r['news_photo'], strlen($r['news_photo']));
		fclose($fp);
		echo "<img src=\"test.jpg\" />";*/
		
		//mysql_close();
	}
?>
