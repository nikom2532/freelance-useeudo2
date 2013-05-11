<?php
	@session_start();

	$q=$_GET["q"];

	$id_mem = $_SESSION[sess_idmem];

	include ("../include/connect.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);	

	$sql = "select * from tb_catesub2 where subid_cate='$q' and id_mem=$id_mem order by 'name_cate'";

	$result = mysql_db_query($dbname,$sql);
	$select_catesub = "<select name='sub2_cate' style=width:200px;>";
	$select_catesub .= "<option value='0'>----- เลือกหมวดหมู่ย่อย 2 -----</option>";
	while( $r = mysql_fetch_array($result) )
	{
		$id_cate = $r[id_cate];
		$name_cate = $r[name_cate];
	
		$id_cate = sprintf("%d", $id_cate);
	
		$select_catesub .= "<option value='" . $id_cate . "'>" . $name_cate;
		$select_catesub .= "</option>";
	}
	
	$select_catesub .= "</select>";
	echo $select_catesub;
	
	mysql_close($cn);

?>