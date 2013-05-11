<?	
	@session_start();

	$id_mem = $_SESSION[sess_idmem];
	
	$delall = $_GET["del"];

	$delid = explode(",", $delall);

	include ("../include/connect.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);
	
	$fieldnamearr[0]="download_pd"; //เก็บค่าชื่อฟิล
	$picarr[0]="pic1_pd" ;
	$picarr[1]="pic2_pd" ;
	$picarr[2]="pic3_pd" ;
	$picarr[3]="pic4_pd" ;
	$picarr[4]="pic5_pd" ;
	$picarr[5]="pic6_pd" ;
	$picarr[6]="pic7_pd" ;

	$x = 0;
	while( $delid[$x] != "" )
	{
			//อ่านชื่อไฟล์เก่า เพื่อลบไฟล์ด้วย
			$sql = "SELECT * FROM tb_product WHERE id_pd='$delid[$x]'";
			$result = mysql_db_query($dbname,$sql);
			if($result && $r= mysql_fetch_array($result))
			{
				
					for( $i=0 ; $i < 1 ; $i++ )
					{
							$filename_album = $r[$fieldnamearr[$i]];
							if( $filename_album != '' )
							{
									$oldfile = "../../album/$downloadfolder/$filename_album";
									//echo $oldfile;
									if( file_exists($oldfile)==TRUE )
									unlink($oldfile);
								
							}
							$filename_album = $r[$picarr[$i]];
							if( $filename_album != '' )
							{
									$oldfile = "../../album/$productfolder/$smallfolder/$filename_album";
									//echo $oldfile;
									if( file_exists($oldfile)==TRUE )
									unlink($oldfile);
									
									$oldfile2 = "../../album/$productfolder/$largefolder/$filename_album";
									//echo $oldfile;
									if( file_exists($oldfile2)==TRUE )
									unlink($oldfile2);
								
							}
					}
					
			}
	
		$sql="delete from tb_product where id_pd ='$delid[$x]'";
		if( mysql_db_query($dbname,$sql) == false )
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