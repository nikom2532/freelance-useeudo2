<link href="../style/style.css" rel="stylesheet" type="text/css" />
<?
if( $_SERVER['HTTP_HOST'] == 'localhost' )
	{
		$server_name = "http://localhost/baanwebsite/customer/useeudo";
	}
	else
	{
		$server_name =  "http://www.useeudo.com";
	}

$current_class = "class='current'";

	for( $x=1 ; $x <= 4 ; $x++ )
	{
		if( $current_page == $x )
			$menu_current[$x] = $current_class;
		else
			$menu_current[$x] = "";
	}

				
				/*$sql_m = "SELECT * FROM  tb_product WHERE show_pd='1' ORDER BY sort_pd ";
								
								$result_m = mysql_db_query($dbname,$sql_m);
								$count=0;
								while($r_m= mysql_fetch_array($result_m) )
								{
									$id_pd[$count] = sprintf("%d", $r_m['id_pd']);
									$name_pd[$count] = $r_m['name_pd'];
									
									$count++;
								}*/



 echo" <ul>
                                        <li><a href='$server_name/index.php' $menu_current[1]>หน้าหลัก</a></li>
                                        <li><a href='$server_name/secret-recipes/' $menu_current[2]>สูตรอาหาร</a></li>
                                        <li><a href='$server_name/product/' $menu_current[3]>ข้อมูลสินค้า</a></li>
                                        <li><a href='$server_name/contact-us/' $menu_current[4]>ติดต่อเรา</a></li>
          </ul> "; 
?>