<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>You See You Do:::www.UseeUdo.com</title>
<meta name="distribution" content="Thailand" />
<meta name="revisit-after" content="7 days" />

<meta name="keywords" content="UseeUdo" />
<meta name="description" content="UseeUdo" />

<meta name="copyright" content="&copy; 2013 http://www.UseeUdo.asia" />
<meta name="robots" content="index,follow" />
<link href="../style/style.css" rel="stylesheet" type="text/css" />

<!--slide-->
	<link rel="stylesheet" type="text/css" href="../slide/engine1/style1.css" media="screen" />
	<style type="text/css">a#vlb{display:none}</style>
	<script type="text/javascript" src="../slide/engine1/jquery.js"></script>
<!--slide-->

</head>

<body>
				<?
                   	  include("../admin/include/connect.php");
					  mysql_query("SET NAMES UTF8");
                ?>
			<div id="head">
                  <div class="headleft">
            			 	 <?
                                        include "../include/head.inc.php";
                              ?>
                   </div><!--headleft-->
                    <div class="headright">
                    		<div id="main_menu">
                               <?
                                         $current_page=2;
                                        include "../include/main-menu.inc.php";
                              ?>
                            </div><!--main_menu-->
                    </div><!--headright-->
            </div><!--head-->
            <div class="cleaner"></div>
            <div id="slides">
                    		 <!-- -----------------------------slider----------------------------------- -->
                              <?
                                        include "../include/slide.inc.php";
                              ?>
                                <!-- -----------------------------------End slider------------------------------ -->
                    
                    	</div><!--slides-->
            <div class="cleaner"></div>
	<div id="wrapper">
            
            <div id="content">
            		<div class="content-view">
                   
                    	<br>
                      <?
                      		$id = $_GET[subid];
							
							  			$sql_sub = "SELECT * FROM tb_catesecretsub1 WHERE id_cate = '$id' ";
                                        $result_sub = mysql_db_query($dbname,$sql_sub);
                                        while($r_sub= mysql_fetch_array($result_sub))
                                        {
                                            $id_sub = sprintf("%d", $r_sub[id_cate]);
                                            $subname = $r_sub[name_cate];
											$youtube = $r_sub[youtube];
										}
					  ?>
                      
                    <div class="space-bar"><div class="space-bar"><strong> <?=$subname?></strong></div></div>
                      
                      <table width="650" align="center">
                      		<tr>
                            		<td width="458">
                                         <center>
                                                <object width="290" height="300">
                                                <param name="movie" value="http://www.youtube.com/v/<?=$youtube?>&hl=en_US&fs=1&autoplay=1"></param>
                                                <param name="allowFullScreen" value="true"></param>
                                                <param name="allowscriptaccess" value="always"></param>
                                                <embed wmode="transparent" src="http://www.youtube.com/v/<?=$youtube?>&hl=en_US&fs=1&autoplay=1" type="application/x-Shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="480" height="360"></embed>
                                                </object>
                                       </center>
                                    </td>
                                    <td width="180" valign="top">
                                    		<a href="../product/index.php" ><img src="../images/read.png" /></a><br>
                                    		<a href="../contact-us/index.php?detail=<?=$id_sub?>" ><img src="../images/detail.png" /></a><br>
                                            <a href="../contact-us/index.php?ex=<?=$id_sub?>" ><img src="../images/exp.png" /></a><br>
                                            <a href="../contact-us/index.php?cart=<?=$id_sub?>" ><img src="../images/cart.png" /></a><br>
                                    </td>
                            </tr>
                      </table>
                      
                      
                     
               
               
            </div><!--content-center-->
    </div><!--content-->
    <div class="cleaner"></div>
          
    </div><!--wrapper-->
    <div class="cleaner"></div>
    <div id="wrapper-footer">
    	<div class="adsvertising">
                <?
						include "../include/footer.inc.php";
			   ?>
      	</div><!--adsvertising-->  
                      
     <!-- <div id="footer">
      	<p>&nbsp;</p>
      			<table width="980">
                	<tr>
                    	<td align="left">
                        Copyright &copy; 2013 UseeUdo.com<br>
                        43 ชั้น 3 ซอยสุขุมวิท 71 <br>
                        แขวงคลองตันเหนือ เขตวัฒนา กรุงเทพฯ 10110

                        </td>
                        <td align="right">
                         โทร. 02-662-7070  โทรสาร 02-662-7878<br>
                         E-mail : info@useeudo.com <br>
                         Powered by <a href="http://www.baanwebsite.com" target="_blank">baanwebsite.com</a>

                        </td>
                    </tr>
                </table>
         </div>-->
         
    </div><!--wrapper-footer-->        
</body>
</html>
