<?
	@session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../style/style.css" />

<?
include_once("../include/wb_config.php");
?>
<title><?=$title_name?></title>



<head>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/dropdown.js"></script>

    <script type="text/javascript">
    ddaccordion.init({
        headerclass: "submenuheader", //Shared CSS class name of headers group
        contentclass: "submenu", //Shared CSS class name of contents group
        revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
        mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
        collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
        defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
        onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
        animatedefault: false, //Should contents open by default be animated into view?
        persiststate: true, //persist state of opened contents within browser session?
        toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
        togglehtml: ["suffix", "<img src='../images/plus.gif' class='statusicon' />", "<img src='../images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
        animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
        oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
            //do nothing
        },
        onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
            //do nothing
        }
    })
    </script>
</head>
<?
	include("../include/chksession.php"); 
?>
<body>

<script type="text/javascript">
function urlEncode( s )
{
	return encodeURIComponent( s ).replace( /\%20/g, '+' ).replace( /!/g, '%21' ).replace( /'/g, '%27' ).replace( /\(/g, '%28' ).replace( /\)/g, '%29' ).replace( /\*/g, '%2A' ).replace( /\~/g, '%7E' );
}

function urlDecode( s )
{
  return decodeURIComponent( s.replace( /\+/g, '%20' ).replace( /\%21/g, '!' ).replace( /\%27/g, "'" ).replace( /\%28/g, '(' ).replace( /\%29/g, ')' ).replace( /\%2A/g, '*' ).replace( /\%7E/g, '~' ) );
}

function GetXMLHTTP()
{   
	//HttpRequest
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	return xmlhttp;
}

function DeleteRec()
{
	if( confirm('หากต้องการลบ กรุณายืนยันอีกครั้ง')==false ) 
     {
          Return;
     }

	need_del = "";
	for( i=1 ; i<document.forms.Form1.hdnLine.value ; i++ )
	{
		if(eval("document.forms.Form1.chk"+i+".checked")==true)
		{
			chkname = eval("document.forms.Form1.chk"+i);
			//alert("คุณต้องการลบ ID="+ chkname.value);
			need_del += chkname.value + ",";
			//return false;
		}
	}

	//alert("คุณต้องการลบ ID="+ need_del);
	//return false;

	if( need_del != "" )
	{
		var xmlhttp = GetXMLHTTP();

		xmlhttp.onreadystatechange=function()
		 {
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				//alert(xmlhttp.responseText);
				if( xmlhttp.responseText == "OK" )
				{
					//alert('ลบข้อมูลเรียบร้อยแล้วค่ะ');
					document.location.reload();
				}
				else
					alert('เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้ค่ะ');
			}
		}

		xmlhttp.open("GET","fn_del.php?del="+need_del,false);
		xmlhttp.send();			
	}
}

function SaveRec()
{
	//alert("aaa");
	//return;
	
	need_id = "";
	need_name = "";
	need_credit= "";
	need_show = "";
	param = "";
	
	for( i=1 ; i<document.forms.Form1.hdnLine.value ; i++ )
	{
		var namecate = eval("document.forms.Form1.namecate"+i);
		
		need_id   = namecate.name;
		need_name = namecate.value;
		alert("xxx");
		if(eval("document.forms.Form1.show_cate"+i+".checked")==true)
			need_show = 1;//chkname.value;
		else
			need_show = 0;	

		param += need_id + ";;";
		param += need_name + ";;";
		param += need_show + "||";
	}

	//alert(param);
	//return false;

	if( param != "" )
	{
		var xmlhttp = GetXMLHTTP();

		xmlhttp.onreadystatechange=function()
		 {
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				//alert(xmlhttp.responseText);
				if( xmlhttp.responseText == "OK" )
				{
					alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ');
					document.location.reload();
				}
				else
					alert('เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ');
			}
		}

		param = urlEncode(param);
		xmlhttp.open("GET","fn_savemain.php?save="+param,false);
		xmlhttp.send();	
	}
}

function refreshpage()
{
	var cate = document.getElementById('filter_cate').value;

	//alert("area=" + area + ", build=" + building);
	window.location='main_edit.php?cate=' + cate;
	//alert(value);
}

</script>

	<div id="wrapper">
    	<div id="tophead">
        	<div class="logo"><p>&nbsp;</p></div>
        	<div class="meminfo">
			<?
				//ข้อมูลของสมาชิก ส่วน Header
				include("../include/top_meminfo.inc.php"); 
			?>
            </div>
        </div>

        <div id="left">
            <div class="glossymenu">
			<?
				//เมนูด้านซ้าย
				include("../include/left_menu.inc.php");
            ?>
            </div>
        </div> <!--left-->

		<!--frame top-->
        <div id="right_top">&nbsp;</div>

        <div id="right">

        	<div class="detail">
				<!-- =========== coding begin here =============== -->
                <h4>แก้ไข/ลบสูตรอาหาร</h4>
           	  	<h5>ระบบจัดการสูตรอาหาร > บริหารสูตรอาหาร > แก้ไข/ลบสูตรอาหาร</h5>
                

<?
				$showcate = $_GET[cate];
				$numrec_per_page = 20; //กำหนดแสดงกี่เรคคอร์ดต่อ 1 หน้า
				
				$showpage = $_GET[pg];
				if( $showpage == "" or $showpage <= 0 )
					$showpage = 1;
				$start = ($showpage-1)*$numrec_per_page;

				include ("../include/connect.php");
				mysql_query("SET NAMES UTF8");
				mysql_select_db($dbname, $cn);
?>

				&nbsp;&nbsp;&nbsp;&nbsp;

                <form method="post" id="Form1" enctype="multipart/form-data"> 
                <table width="99%" border="0">
                	<tr bgcolor="#CCCCCC" align="center">
                              <!--<td width="88"><small>รูป</small></td>-->
                              <td width="200">สูตรอาหาร</td>
                              <td width="150"><small>แก้ไข</small></td> 
                              <td width="41"><small>เพิ่มส่วนประกอบ</small></td>
                              <td width="78"><small>แสดง</small></td>
                              <td width="35" ><small>ลบ</small></td>
              	  </tr>
                	
                
                	<?
					
					//อ่านข้อมูลสินค้า จากฐานข้อมูล
					//$sql = "SELECT * FROM tb_service ORDER BY id_service LIMIT $numrec_per_page OFFSET $start";
					//$sqlall = "SELECT * FROM tb_service";
					$sql = "SELECT * FROM tb_catesecret";
				
					$result = mysql_db_query($dbname,$sql);
					$allrec = mysql_num_rows($result); //Get จำนวน record ทั้งหมด

					$sql .= " ORDER BY id_cate LIMIT $numrec_per_page OFFSET $start";
					$result = mysql_db_query($dbname,$sql);

//					$sqlall = "SELECT * FROM tb_service";
				
/*					$result = mysql_db_query($dbname,$sql);
					if( $result == false )
						exit();
					$resultall = mysql_db_query($dbname,$sqlall);
					if( $resultall == false )
						exit();
					$allrec = mysql_num_rows($resultall); //Get จำนวน record ทั้งหมด
*/
					$counter = 1;
					while($r= mysql_fetch_array($result))
					{
						$id_service = sprintf("%d", $r[id_cate]);
						$name_cate=$r[name_cate];
						$show_cate=$r[show_cate];
						
					?>
                    	<tr align="center">
                    	    <? 
							/* if ($r[pic_service] != '')
								 $file_album ="../../album/promotion/" . $r[pic_service]; 
							 else
							 	 $file_album ="../images/nopic.jpg"*/
							 ?>
                         <!--  <td>
                            	 <img width="80" src="<?=$file_album?>" />
                            </td>-->
                            
							
							<?
                           $namecate = "namecate" . $counter;
                            ?>
                            <!--ชื่อสินค้า-->
                            <td align="left"><input type="text"  size="35" name="<?=$id_service?>" id="<?=$namecate?>" value="<?=$name_cate?>"/></td>
                            
                            <!--แก้ไข-->
                            <td><input type="button" name="editcate" value="แก้ไข" onclick="window.location='secret_edit.php?id=<?=$id_service?>'" /></td>
                            
                        	<!--เพิ่มส่วนประกอบ-->
                            <td><input type="button" name="editcate" value="เพิ่มส่วนประกอบ" onclick="window.location='catesub1_add.php?id=<?=$id_service?>'" /></td>

							<!--แสดง/ไม่แสดง-->
                            <td>
                            <?
							$show = "show_cate" . $counter;
							?>
							<input type='checkbox' value='<?=$id_service?>' id='<?=$show?>' <? if( $show_cate==1) echo "checked='checked'" ?> />
                            </td>


                            <!--ลบ-->
							<? $chk = "chk" . $counter; ?>
                            <td><input type="checkbox" name="deleterec" id="<?=$chk?>" value="<?=$id_service?>"/></td>
                        </tr>
                        
                    <?
						$counter++;
					}
					?>

					<input type="hidden" name="hdnLine" value="<?=$counter?>">

					<tr>
					  <!--<td>&nbsp;</td> -->
                    	<td>&nbsp;</td>
                    	<td>&nbsp;</td>
                    	<td>&nbsp;</td>
                    	<td>&nbsp;</td>
                    	
                    	<td align="center"><input type="button" name="delete_now" value="Delete" onclick="DeleteRec()" /></td>
                    </tr>
                    <tr>
                    	<td colspan="9" align="center">
                        	<input type="button" name="save_now" value="Save" onclick="SaveRec()" style="width:100px; height:30px; font-size:14px" />
                        </td>
                    </tr>
                    <!-- Prev  Next -->
                    <tr align="center">
                    	<td colspan="3">
                        <!--
                        <? 
							$prevpage = $showpage-1;
							if( $showpage <= 1 )
								echo "<input type='button' name='prev' value='<<' disabled='disabled'/>";
							else
								echo "<input type='button' name='prev' value='<<' onclick=\"window.location='main_edit.php?pg=$prevpage'\"/>";

							$nextpage = $showpage+1;
							if( ($showpage*$numrec_per_page) > $allrec )
								echo "<input type='button' name='next' value='>>' disabled='disabled'/>";
							else
								echo "<input type='button' name='next' value='>>' onclick=\"window.location='main_edit.php?pg=$nextpage'\"/>";
						?>
                        -->
                        
						<? 
                            $allnumpage  = ceil($allrec/$numrec_per_page); //ceil ปัดเศษขึ้นเสมอ
                        
                            //กลับไปหน้าแรก
                            if( $showpage <= 1 )
                                echo "<input type='button' name='firstp' value='<<' disabled='disabled'/>";
                            else
                                echo "<input type='button' name='firstp' value='<<' onclick=\"window.location='main_edit.php?pg=1&cate=$showcate'\"/>";
                
                            //ถอยหลังทีละหนึ่งหน้า
                            $prevpage = $showpage-1;
                            if( $prevpage <= 0 )
                                echo "<input type='button' name='prev' value='<' disabled='disabled'/>";
                            else
                                echo "<input type='button' name='prev' value='<' onclick=\"window.location='main_edit.php?pg=$prevpage&cate=$showcate'\"/>";
                
                            //แสดงตัวเลขหน้า  + - 3 หน้า
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                            $runpagestart = $showpage-4;
                            if( $runpagestart <= 0 )
                                $runpagestart = 1;
                            $runpagestop = $showpage+4;
                            if( $runpagestop > $allnumpage )
                                $runpagestop = $allnumpage;
                
                //echo $runpagestart; echo $runpagestop;
                            for( $x=0 ; $x < ($runpagestop-$runpagestart+1) ; $x++ )
                            {
                                $count = $x+$runpagestart;
                                if( $count==$showpage )
                                {
                                    echo "<input type='button' name='topage' value='$count' style='height:30px; background:#$acolor; color:#$npagecolor' onclick=\"window.location='main_edit.php?pg=$count&cate=$showcate'\"/>";
                                }
                                else
                                {
                                    echo "<input type='button' name='topage' value='$count' style='background:#$bcolor; color:#$npagecolor'  onclick=\"window.location='main_edit.php?pg=$count&cate=$showcate'\"/>";
                                }
                            }
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                
                
                            //เดินหน้าทีละหนึ่งหน้า
                            $nextpage = $showpage+1;
                            if( ($showpage*$numrec_per_page) >= $allrec )
                                echo "<input type='button' name='next' value='>' disabled='disabled'/>";
                            else
                                echo "<input type='button' name='next' value='>' onclick=\"window.location='main_edit.php?pg=$nextpage&cate=$showcate'\"/>";
                
                            //ไปหน้าสุดท้าย
                            if( $showpage >= $allnumpage )
                                echo "<input type='button' name='lastp' value='>>' disabled='disabled'/>";
                            else
                                echo "<input type='button' name='lastp' value='>>' onclick=\"window.location='main_edit.php?pg=$allnumpage&cate=$showcate'\"/>";
                
                        ?>
                        
                        
						</td>
                        <td colspan="6">
                        	<!--แจ้งว่ากำลังแสดงเรคคอร์ดที่เท่าไร-->
                        	<font size="-1">
                        	<?
								$show_start = (($showpage-1)*$numrec_per_page)+1;
								$show_stop  = $show_start+$numrec_per_page-1;
	                        	echo "แสดง $show_start - $show_stop";
                            ?>
                            </font>
                        </td>
                    </tr>
				<?
                mysql_close($cn);
				?>
                </table>
</form>
 				<!-- =========== coding end here =============== -->
            </div>
            
        </div> <!--right-->

		<!--frame footer-->
        <div id="right_footer">&nbsp;</div>

        <div class="clear"></div>
        
        <div id="footer">
           		 <?
           			 include("../include/footer.inc.php"); 
       			 ?>
           </div>
   </div>
</body>
</html>