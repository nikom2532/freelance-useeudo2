<?
if($_SERVER['HTTP_HOST'] == 'localhost' )
	{
		$server_name = "http://localhost/baanwebsite/customer/useeudo";
	}
	else
	{
		$server_name =  "http://www.useeudo.com";
	}


?>

<a href="#" title="useesdo.com"> <img src="<?=$server_name?>/images/logo.png" border="0" alt="UseeUdo" height="98"></a>