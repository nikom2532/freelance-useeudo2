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
                                         $current_page=4;
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
            		
            		<div class="content-left">
                        	
                           <img src="../images/logo1.png"/><br><br><br>
                           <center><img src="../images/cont.png"/></center><br>
                           <img src="../images/bottom.png"/>
                    </div><!--content-left-->
                    
                     <div class="content-right">
                     		
                            <table height="331">
                            	<tr>
                                	<td align="left">
                                        หสม.ยูซียูดู<br>
                                        43 ชั้น 3 ซอยสุขุมวิท 51 <br>
                                        แขวงคลองตันเหนือ เขตวัฒนา กรุงเทพฯ 10110<br>
                                        โทร. 02-662-7070  โทรสาร 02-662-7878<br>
                                        E-mail : info@useeudo.com<br>
										<img src="../images/ktb.png" width="50"/> 
                                       ธนาคารกสิกรไทย สาขาสุขุมวิท 57 บัญชีออมทรัพย์
                                        <br>  ชื่อบัญชี  "หสม.ยูซียูดู"  เลขที่ 046-2-96780-2
                                    <br>
                                        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<font color="#FF0000">*ในกรณีสั่งซื้อสินค้า เมื่อท่านโอนเงินแล้ว กรุณาส่งหลักฐานการโอนเงินพร้อมยอดเงินโอน โดยการแจ้งทางโทรศัพท์ โทรสาร หรือ e-mail และกรุณาเก็บสลิบการโอนเงินไว้เป็นหลักฐานจนกว่าจะได้รับสินค้า </font>
                                     </td>
                                     <td align="right" valign="top"><img src="../images/contact.png"/></td>
                                </tr>
                                
                            </table>
                  <form method='post' action='sendemail.php'  >
               	  <div class="contact">
                        
                        	<div class="contact-detail">
                            
                            <?
							
								$detail = $_GET[detail];
								$ex = $_GET[ex];
								$cart = $_GET[cart];
							
                        		$sql = "SELECT * FROM tb_catesecret ";
								$result = mysql_db_query($dbname,$sql);
								$count=0;
								
								while($r= mysql_fetch_array($result))
								{
									$id_cate= sprintf("%d", $r[id_cate]);
									$name_cate[$count] = $r[name_cate];
									
									
									
									 /*	$sql_sub = "SELECT * FROM tb_catesecretsub1 WHERE mainid_cate = '$id_cate' ";
                                        $result_sub = mysql_db_query($dbname,$sql_sub);
                                        if($r_sub= mysql_fetch_array($result_sub))
                                        {
                                            $id_sub[$count]  = sprintf("%d", $r_sub[id_cate]);
                                            $subname[$count]  = $r_sub[name_cate];
									
										}*/
										
										/* WHERE  mainid_cate = '$id'*/
									$count++;	
								}
								
								function selSecret($id=0){
									
									global $dbname ,$cn;
									
										$sql_sub = "SELECT * FROM tb_catesecretsub1 order by name_cate asc";
                                        $result_sub = mysql_db_query($dbname,$sql_sub);
										
										$msg =  '<option value="">กรุณาเลือกสูตรอาหาร </option>'; 
                                        while($r_sub= mysql_fetch_array($result_sub))
                                        {
                                            $id_sub  = sprintf("%d", $r_sub[id_cate]);
                                            $subname = $r_sub[name_cate];
											
											if($id_sub == $id)
											
											$msg .=  "<option value='$subname' selected='selected'>$subname </option>"; 
											
											else 
											$msg .=  "<option value='$subname'>$subname </option>"; 
									
										}
										
										return $msg;
								}
								
									
						?>
                        
                        		<table>
                                
                                	<tr>
                                    	<td>ชื่อ-สกุล : </td>
                                    	<td colspan="2"><input name="name" type="text" size="20"/><font color="#FF0000">*</font></td>
                                    </tr>
                                    <tr>
                                    	<td>เบอร์โทรศัพท์ : </td>
                                    	<td colspan="2"><input name="tel" type="text" size="20"/><font color="#FF0000">*</font></td>
                                    </tr>
                                	<tr>
                                    	<td>E-mail : </td>
                                    	<td colspan="2"><input name="email" type="text" size="40"/><font color="#FF0000">*</font></td>
                                    </tr>
                                	<tr>
                                    	<td width="199"><img src="../images/icon.png" width="15"/> ขอสูตรอาหาร </td>
                                        <td width="117"> สูตรที่ 1</td>
                                        <td width="258">
                                            <div class="scoll">	
                                                <select name="secret1">
                                                        <? echo selSecret($detail)?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                    	<td></td>
                                        <td> สูตรที่ 2</td>
                                        <td>
                                        <div class="scoll">	
                                          <select name="secret2">
                                            		<? echo selSecret()?>
                                            </select>
                                           </div> 
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                    	<td></td>
                                        <td>สูตรที่ 3</td>
                                        <td>
                                        <div class="scoll">	
											  <select name="secret3">
                                            		<? echo selSecret()?>
                                            </select>
                                          </div>                                              
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                    	<td></td>
                                        <td> สูตรที่ 4</td>
                                        <td>
                                        <div class="scoll">	
											  <select name="secret4">
                                            		<? echo selSecret()?>
                                            </select>
                                           </div> 
                                        </td>
                                    </tr>
                                    <?
                                    		$id = $_GET[id];
											
											
											$sql = "SELECT * FROM tb_catemain WHERE id_cate = '$id' ";
												$result = mysql_db_query($dbname,$sql);
												while($r= mysql_fetch_array($result))
												{
													$id_cate = sprintf("%d", $r[id_cate]);
													$name_cate = $r[name_cate];
													$detail_cate = $r[detail_cate];
												}
												
											$sql_sub = "SELECT * FROM tb_catesecretsub1 WHERE id_cate = '$ex' or id_cate ='$cart' ";
														$result_sub = mysql_db_query($dbname,$sql_sub);
														while($r_sub= mysql_fetch_array($result_sub))
														{
															$id_sub = sprintf("%d", $r_sub[id_cate]);
															$name_sub = $r_sub[name_cate];
															$detail_sub = $r_sub[detail_cate];
														}
									?>
                                     <tr>
                                            <td colspan="3"><img src="../images/icon.png" width="15"/> 
                                            		สั่งซื้อสินค้า <small>[โปรดระบุ ชื่อสินค้า จำนวนที่ต้องการ และ ชื่อ ที่อยู่ผู้รับสินค้า]</small>
                                            </td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" align="center">
                                        <?
                                        	if($id=='' && $cart ==''){
										?>
                                        <textarea name='prod' rows='3' cols='60'></textarea>
                                        <?
											}
											if($id !=''){
										?>
                                        <textarea name='prod' rows='3' cols='60' value="<?=$name_cate?>">ต้องการสั่งซื้อ "<?=$name_cate?>" จำนวน 1 ชิ้น</textarea>
                                       
                                        <?
											}
										?>
                                        
                                          <?
										
											if($cart !=''){
										?>
                                        <textarea name='message' rows='3' cols='60' value="<?=$name_sub?>">ต้องการสั่งซื้อ "<?=$name_sub?>" </textarea>
                                       
                                        <?
											}
										?>
                                        </td>
                                        
                                    </tr>
                                    
                                    <?
                                    		$sql_sub = "SELECT * FROM tb_catesecretsub1 WHERE id_cate = '$ex' or id_cate ='$cart' ";
												$result_sub = mysql_db_query($dbname,$sql_sub);
												while($r_sub= mysql_fetch_array($result_sub))
												{
													$id_sub = sprintf("%d", $r_sub[id_cate]);
													$name_sub = $r_sub[name_cate];
													$detail_sub = $r_sub[detail_cate];
												}
									?>
                                    <tr>
                                    
                                    	<td colspan="2"><img src="../images/icon.png" width="15"/> คำถามหรือข้อเสนออื่น ๆ</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="center">
										
                                     <?
                                        	if($ex=='' ){
										?>
                                        <textarea name='message' rows='3' cols='60'></textarea>
                                        <?
											}
											if($ex !=''){
										?>
                                        <textarea name='message' rows='3' cols='60' value="<?=$name_sub?>">ขอตัวอย่าง "<?=$name_sub?>" เพื่อทดลองทำ</textarea>
                                       
                                        <?
											}
										?>
                                        
                                       
                                      
                                        
                                        </td>
                                    </tr>
                                    
                                </table>
                        
                               
                                
                            </div><!--contact-detail-->
                        </div><!--contact-->
                        <div class="space"><button type="submit" class="send"></button></div>
                   </form>
             </div><!--content-right-->
            
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
