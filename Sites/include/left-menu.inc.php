<?
if( $_SERVER['HTTP_HOST'] == 'localhost' )
	{
		$server_name = "http://localhost/baanwebsite/customer/useeudo";
	}
	else
	{
		$server_name =  "http://www.useeudo.com";
	}



?>
<center><!--<img src="<?=$server_name?>/images/menuleft.png">--></center>
<?

 /* echo"<ul>";
  
  				$cate_left_menu = $_GET[cate];
				
					$sqll = "SELECT * FROM  tb_product WHERE show_pd='1' ORDER BY sort_pd";
					$resultt = mysql_db_query($dbname,$sqll);
								
							while($rr=mysql_fetch_array($resultt))
								{
									$mainidsub = sprintf("%d", $rr[id_pd]);
									$catenamesub = $rr[name_pd];
									
									if ($mainidsub == $cate_left_menu)
											$current = "class='current'";
									else 
											$current = "class=''"	;
                 					
                   echo" <li $current> <a href='$server_name/products/view.php?id=$mainidsub'>$catenamesub</a>  </li>";
                    
							}
            		
                echo"</ul>"; */
?>

							<a href="<?=$server_name?>/secret-recipes/index.php"><img src="<?=$server_name?>/images/bg-update.png" border="0"></a><br>
                            <img src="<?=$server_name?>/images/lemon.png" border="0">