<?	
	@session_start();

	$id_mem = $_SESSION[sess_idmem];

	$name_cate  = $_GET["name_cate"];
	$catemainid = $_GET["catemainid"];

	$name_cate = urldecode($name_cate);

	include ("../include/connect.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);

	$sql="insert into tb_catesub2 values('','$name_cate','$catemainid','$id_mem')";
	if( mysql_db_query($dbname,$sql) == true )
		echo "OK";
	else
		echo "ERROR";
	mysql_close($cn);
?>