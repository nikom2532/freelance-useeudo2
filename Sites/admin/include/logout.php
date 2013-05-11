<?php
	@session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	//@session_start();
	unset($_SESSION['sess_sessid']);
	//unset($_SESSION['sess_username']);
	//unset($_SESSION['sess_logdate']);
	session_destroy();
	//header("Location: ../index.php");
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php\" />";

	//header('Location: http://www.example.com/');
	//exit();

?>
</body>
</html>
