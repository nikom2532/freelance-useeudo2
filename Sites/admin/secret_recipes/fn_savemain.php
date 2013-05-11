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

		$sql = "update tb_catesecret set name_cate='$arr[1]', show_cate='$arr[2]'  where id_cate ='$arr[0]' ";
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