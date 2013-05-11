<?	
	//@session_start();

	//$id_mem = $_SESSION[sess_idmem];
?>

<!--ถ้าไม่ใส่บรรทัดนี้ จะทำให้แสดงข้อความภาษาไทยแล้ว เป็นอักขระที่อ่านไม่รู้เรื่อง-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?
	$recid=$_POST[recid];
	$showpm=$_POST[showpm];
	$name=$_POST[name];
	$inpContent=$_POST[inpContent];

	//ตัด \r\n
	$needcut = array("\r\n", "\n", "\r");
	$inpContent = str_replace($needcut, "", $inpContent);

	include ("../include/connect.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);

	$sql = "update tb_promotion set showst_pm='$showpm', namest_pm='$name', detailst_pm='$inpContent' where id_pm ='$recid' ";

	$err = 0;
	if( mysql_db_query($dbname,$sql) == false )
		$err = 1;

	mysql_close($cn);

	//respond
	if( $err == 1 )
	{
		echo "<script language='javascript'>alert('ไม่สามารถบันทึกลงฐานข้อมูลได้');
		javascript:history.back();</script>";
	}
	else
	{
		echo "<script language='javascript'>alert('บันทึกลงฐานข้อมูลเรียบร้อยแล้วค่ะ');</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=promfirst_edit.php\" />";
	}

?>