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

		$sql = "UPDATE tb_product SET name_pd='$arr[1]', code_pd='$arr[2]',show_pd='$arr[3]',sort_pd='$arr[4]' ,statusid_pd='$arr[5]' WHERE id_pd ='$arr[0]' ";
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