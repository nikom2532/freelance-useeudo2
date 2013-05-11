<?	
	@session_start();

	$id_mem = $_SESSION[sess_idmem];
	
	$delall = $_GET["del"];

	$delid = explode(",", $delall);

	include ("../include/connect.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);

	$x = 0;
	while( $delid[$x] != "" )
	{
		//echo $delid[$x];
		$sql="delete from tb_banner where id_banner='$delid[$x]'";
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