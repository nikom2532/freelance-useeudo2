<?
	@session_start();
	$sess_sessid = $_SESSION[sess_userid];
	//echo $sess_sessid ;
	//$sess_username = $_SESSION[sess_username];
	if($sess_sessid<>session_id())
	{
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php\" />";
		exit();
	}
?>