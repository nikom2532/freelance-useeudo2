<?
	@session_start();

	include_once("wb_config.php");

	echo"<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";

	$user=$_POST[user];
	$pass=$_POST[pass];
	if($user==$userlogin_name and $pass == $passlogin_name)
	{
		//@session_start();
		$_SESSION[sess_userid] = session_id();
		$_SESSION[sess_idmem] = 1;
		//header("Location: news_main.php");
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../main_admin.php\" />";	
	}
	else
	{
		echo "<script language='javascript'>alert('Username หรือ Password ไม่ถูกต้องค่ะ');
		</script>";
		$server = "http://" . $_SERVER['HTTP_HOST'];
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=$server \" />";
		//header("location:../index.php");
		exit();
	}
?>
