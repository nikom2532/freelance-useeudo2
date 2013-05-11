
<?
if( $_SERVER['HTTP_HOST'] == 'localhost' )
	{
		$server_name = "http://localhost/baanwebsite/customer/useeudo";
	}
	else
	{
		$server_name =  "http://www.useeudo.com";
	}


							$sql_m = "SELECT * FROM  tb_banner WHERE show_bn='1' ";
								
								$result_m = mysql_db_query($dbname,$sql_m);
								$count=0;
								while($r_m= mysql_fetch_array($result_m) )
								{
									$id_pd = sprintf("%d", $r_m['id_banner']);
									$pic_banner = $r_m['pic_banner'];
									
						if ($pic_banner !='')
							$fileimg =$server_file  .  "/" . banner . "/" . $pic_banner;
						else
							$fileimg ="../images/nopic.jpg";
							
?>

				<p>
                		<img src="<?=$fileimg?>" >
                </p>
 <? } ?>