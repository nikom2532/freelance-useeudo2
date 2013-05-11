<?	
	@session_start();

	$id_mem = $_SESSION[sess_idmem];

	$save=$_GET["save"];
	$save = urldecode($save);

	$rec = explode("||", $save);

	include ("../include/connect.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);

	$err = 0;
	$i = 0;
	while( $rec[$i] )
	{
		$each = $rec[$i];
		$arr = explode(";;", $each);

		$sql = "update tb_banner set ord_bn='$arr[2]',show_bn='$arr[1]' where id_banner ='$arr[0]' ";
		if( mysql_db_query($dbname,$sql) == false )
			$err = 1;

		$i++;
	}
	mysql_close($cn);

	//respond
	if( $err )
		echo "ERROR";
	else
		echo "OK";
?>