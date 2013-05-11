<?php
	//From baanwebsite
	if( $_SERVER['HTTP_HOST'] == 'localhost' )
	{
		$ServerName = "localhost";
		$User = "root";
		$Password = "abc123";
		$dbname = "useeudo";

		$server_name = "http://localhost/baanwebsite/customer/useeudo/admin";
		$server_file = "http://localhost/baanwebsite/customer/useeudo/album";
	}
	else
	{
		//Hosting
		$ServerName = "useeudo.com";
		$User = "shoppingcart";
		$Password = "mmmf123";
		$dbname = "useeudoc_shoppingcart";
	
		$server_name = "http://www.useeudo.com/admin";
		$server_file = "http://www.useeudo.com/album";
	}
	
	//From Arming Huang
	$ServerName = "localhost";
	$User = "iming";
	$Password = "iming";
	$dbname = "shoppingcart2";

	$server_name = "http://nikoms-ubuntu:81/20130506/admin";
	$server_file = "http://nikoms-ubuntu:81/20130506/album";
		
	
	
	$productfolder = "product";
	$webboardfolder="webboard";
	$downloadfolder = "download";
	$menufolder="menu";
	$bannerfolder="banner";
	$albumfolder="album";
	$articlefolder="article";
	$promotionfolder="promotion";
	$smallfolder = "small";
	$largefolder = "large";
	
	

	$cn = mysql_pconnect( $ServerName, $User, $Password );
	mysql_select_db($dbname, $cn);
	mysql_query("SET NAMES UTF8"); //kong
	if(!$cn)
	{
		echo "<h3>ERROR : ไม่สามารถติดต่อฐานข้อมูลได้</h3>";
		exit();
	
	}
?>
