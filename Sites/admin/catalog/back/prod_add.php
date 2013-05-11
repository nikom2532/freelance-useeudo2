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
	$(document).ready(function() {
		$("#price").NumericOnly();
	});
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

function Chkcatemain(cate1, main)
{
	if(eval("document.forms.Form1." + cate1 + ".checked")==true)
	{
		chk = eval("document.forms.Form1." + main);
		chk.checked = true;
	}
}

function InitVariable() 
{
	//document.forms.Form1.elements.inpContent.value = oEdit1.getHTMLBody();
	document.forms.Form1.elements.inpContent2.value = oEdit2.getHTMLBody();
	var name_prod = document.forms.Form1.name_prod.value;
	var main_cate = "";
	var sub1_cate = "";
	var sub2_cate = "";

	//countMainCate
	//countSub1Cate
	//countSub2Cate	
	//name_prod = "555+";
	
/*	main_cate = document.forms.Form1.countMainCate.value;
	main_cate += "-";
	main_cate += document.forms.Form1.countSub1Cate.value;
	main_cate += "-";
	main_cate += document.forms.Form1.countSub2Cate.value; */

	//รับค่า main_cate
	if( document.forms.Form1.countMainCate.value >= 1 )
		main_cate = ",";
	for( i=1 ; i<document.forms.Form1.countMainCate.value ; i++ )
	{
		if(eval("document.forms.Form1.chk_catemain"+i+".checked")==true)
		{
			nameofmain = eval("document.forms.Form1.chk_catemain"+i);
			need_id   = nameofmain.value;
			main_cate += need_id + ",";
		}
	}

	//รับค่า sub1_cate
	if( document.forms.Form1.countSub1Cate.value >= 1 )
		sub1_cate = ",";
	for( i=1 ; i<document.forms.Form1.countSub1Cate.value ; i++ )
	{
		if(eval("document.forms.Form1.chk_sub1cate"+i+".checked")==true)
		{
			nameofmain = eval("document.forms.Form1.chk_sub1cate"+i);
			need_id   = nameofmain.value;
			sub1_cate += need_id + ",";
		}
	}

	//รับค่า sub2_cate
	if( document.forms.Form1.countSub2Cate.value >= 1 )
		sub2_cate = ",";
	for( i=1 ; i<document.forms.Form1.countSub2Cate.value ; i++ )
	{
		if(eval("document.forms.Form1.chk_sub2cate"+i+".checked")==true)
		{
			nameofmain = eval("document.forms.Form1.chk_sub2cate"+i);
			need_id   = nameofmain.value;
			sub2_cate += need_id + ",";
		}
	}

	//ตรวจสอบว่ากรอกข้อมูลหรือไม่
	if ( main_cate.length <= 1)
	{
		alert("กรุณาเลือกหมวดหมู่ด้วยค่ะ");
		return false;
	}
	if ( name_prod.length==0)
	{
		alert("กรุณากรอกชื่่อสินค้าด้วยค่ะ");
		document.forms.Form1.name_prod.focus();           
		return false;
	}

	//ฝากไว้ในตัวแปร main_cate
	document.forms.Form1.main_cate.value = main_cate;
	document.forms.Form1.sub1_cate.value = sub1_cate;
	document.forms.Form1.sub2_cate.value = sub2_cate;
}
</script>

<!--Include the Editor js file --> 
<script language=JavaScript src='../Editor/scripts/innovaeditor.js'></script><pre id="idTemporary" name="idTemporary" style="display:none"> 
</pre> 


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
                <h4>เพิ่มสินค้า</h4>
            	<h5>ระบบจัดการสินค้า > บริหารข้อมูลสินค้า > เพิ่มสินค้า</h5>
				<?          
                include("../include/connect.php");
                mysql_query("SET NAMES UTF8");
                ?>                

                <form action="fn_addproduct.php" method="post" id="Form1" onsubmit="return InitVariable()" enctype="multipart/form-data"> 
                <table>

                    <!--แสดงหมวดหมู่ทั้งหมด-->
                	<tr>
                    	<td align="right" valign="top" style="padding-top:5px;">หมวดหมู่ :</td>
                        <td>
                        	<?
							//อ่านหมวดหมู่หลัก จากฐานข้อมูล
							$sql = "SELECT * FROM tb_catemain WHERE show_cate=1 ORDER BY ord_cate";
							$result = mysql_db_query($dbname,$sql);
							
							$countMainCate = 1;
							$countSub1Cate = 1;
							$countSub2Cate = 1;
	                        while($r=mysql_fetch_array($result))
							{
								$mainid = sprintf("%d", $r['id_cate']);
								$catename = $r['name_cate'];

								//แสดงหมวดหมู่หลัก//////////////
								echo "<input name='chk_catemain$countMainCate' type='checkbox' value='$mainid'/><font color='#000000' style='border:3px #F90 double; line-height:30px; '><b>$catename</b></font><br>";

								//อ่านหมวดหมู่ย่อย 1 จากฐานข้อมูล
								$sqlsub1 = "SELECT * FROM tb_catesub1 WHERE mainid_cate=$mainid ORDER BY id_cate";
								$resultsub1 = mysql_db_query($dbname,$sqlsub1);
								while($rsub1=mysql_fetch_array($resultsub1))
								{
									$sub1id = sprintf("%d", $rsub1[id_cate]);
									$sub1name = $rsub1[name_cate];

									//แสดงหมวดหมู่ย่อย 1//////////////
									echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='chk_sub1cate$countSub1Cate' type='checkbox' value='$sub1id' onclick=\"Chkcatemain('chk_sub1cate$countSub1Cate', 'chk_catemain$countMainCate')\" /><font color='#d19c37'><b>$sub1name </b></font><br>";

									//อ่านหมวดหมู่ย่อย 2 จากฐานข้อมูล
									$sqlsub2 = "select * from tb_catesub2 where subid_cate=$sub1id order by name_cate";
									$resultsub2 = mysql_db_query($dbname,$sqlsub2);
									
									$counter = 0;
									while($rsub2=mysql_fetch_array($resultsub2))
									{
										$sub2id = sprintf("%d", $rsub2[id_cate]);
										$sub2name = $rsub2[name_cate];

										//แสดงหมวดหมู่ย่อย 2/////////////
//										echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='chk_sub2cate$countSub2Cate' type='checkbox' value='$sub2id'/>$sub2name <br>";

										// space bar
										if( $counter%4 == 0 )
										{
											echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
										}
										
										echo "<input name='chk_sub2cate$countSub2Cate' type='checkbox' value='$sub2id'/>$sub2name";	

										// new line
										if( $counter%4 == 3 )
										{
											echo "<br>";
										}
										else
										{
											echo "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;";	
										}

										$counter++;
										$countSub2Cate++;
									}
									echo "<br>";
									$countSub1Cate++;
								}
								//echo "<br>";
								$countMainCate++;
							}
							?>
                        </td>
					</tr>
                    
                    <!--รหัสสินค้า-->
                	<tr>
                    	<td align="right">รหัสสินค้า :</td>
                        <td>
			                <input name="code_prod" type="text" size="10" /><font color="red">*</font>
 						</td>
                    </tr>

                    <!--ชื่อสินค้า-->
                	<tr>
                    	<td align="right">ชื่อสินค้า :</td>
                        <td>
			                <input name="name_prod" type="text" size="30" /><font color="red">*</font>
 						</td>
                    </tr>

                    <!--รายละเอียดอย่างย่อ-->
                    <tr> 
                         <td align="right" width="120" bgcolor="#FFFFFF">รายละเอียดย่อ : </td> 
                         <td align="Left">&nbsp;<input type="text" name="title_short" value="" size="20" style="width:450px;"> </td> 
                    </tr>	
                    
					<!--Keyword-->
                    <!--
                    <tr> 
                         <td align="right" width="120" bgcolor="#FFFFFF" valign="top">Keword : </td> 
                         <td align="Left" > 
                         &nbsp;1.<input type="text" name="keyword1" value="" size="20" style="width:130px;"> 
                         &nbsp;&nbsp;2.<input type="text" name="keyword2" value="" size="20" style="width:130px;"> 
                         &nbsp;&nbsp;3.<input type="text" name="keyword3" value="" size="20" style="width:130px;"> 
                         <br /> 
                         &nbsp;4.<input type="text" name="keyword4" value="" size="20" style="width:130px;"> 
                         &nbsp;&nbsp;5.<input type="text" name="keyword5" value="" size="20" style="width:130px;"> 
                         <br /> 
                         &nbsp;Keyword ที่เกี่ยวกับสินค้าของท่าน มีผลต่อการติดอันดับ google นะคะ
                         </td> 
                    </tr>
                    -->
                    <input type="hidden" name="keyword1" value="" />
                    <input type="hidden" name="keyword2" value="" />
                    <input type="hidden" name="keyword3" value="" />
                    <input type="hidden" name="keyword4" value="" />
                    <input type="hidden" name="keyword5" value="" />

					<!--ราคา-->
                    <tr> 
                         <td align="right" width="120" bgcolor="#FFFFFF" >ราคา : </td> 
                         <td align="Left" >&nbsp;<input type="text" name="price"  id="price" value="" size="20" style="width:100px;"> บาท </td> 
                    </tr>
                 	<!--คุณสมบัติ-->
                  <!--  <tr> 
                         <td align="right" valign="top" style="padding-top:12px;">คุณสมบัติ : </td> 
                         <td align="Left"> 
                            <script> 
                                var oEdit1 = new InnovaEditor("oEdit1");
                                oEdit1.arrStyle = [["BODY",false,"","background:#ffffff;color:Black;font-family:Tahoma,Verdana,Arial,Helvetica;font-size:x-small;margin:3px;"]];
                                oEdit1.width=600;
                                oEdit1.height=300;
                                oEdit1.features=["FullScreen","Preview","Search",
                                "Cut","Copy","Paste","PasteWord","|","Undo","Redo","|",
                                "ForeColor","BackColor","|","Numbering","Bullets","|",
                                "Indent","Outdent","|","Image","Flash","Media","|","Bookmark","Hyperlink","XHTMLSource","BRK",
                                "Table","Guidelines","|","Line","Form","StyleAndFormatting","TextFormatting","ListFormatting",
                                "BoxFormatting","ParagraphFormatting","CssText","Styles","|","Paragraph","FontName","FontSize","|","Bold","Italic",
                                "Underline","|","JustifyLeft","JustifyCenter","JustifyRight","JustifyFull"];
                                
                                oEdit1.cmdAssetManager="modalDialogShow('/Editor/assetmanager/assetmanager.php',640,465)";//Use "relative to root" path
                                oEdit1.btnFlash=false;//Show 'Insert Flash' button
                                oEdit1.btnMedia=false;//Show 'Insert Media' button
                                oEdit1.RENDER(document.getElementById("idTemporary").innerHTML);
                            </script> 
                            <input type="hidden" name="inpContent"  id="inpContent"> 
                         </td> 
                    </tr>             -->        
					<!--รายละเอียด-->
                    <tr> 
                         <td align="right" valign="top" style="padding-top:12px;">รายละเอียด : </td> 
                         <td align="Left"> 
                            <script> 
                                var oEdit2 = new InnovaEditor("oEdit2");
                                oEdit2.arrStyle = [["BODY",false,"","background:#ffffff;color:Black;font-family:Tahoma,Verdana,Arial,Helvetica;font-size:x-small;margin:3px;"]];
                                oEdit2.width=600;
                                oEdit2.height=400;
                                oEdit2.features=["FullScreen","Preview","Search",
                                "Cut","Copy","Paste","PasteWord","|","Undo","Redo","|",
                                "ForeColor","BackColor","|","Numbering","Bullets","|",
                                "Indent","Outdent","|","Image","Flash","Media","|","Bookmark","Hyperlink","XHTMLSource","BRK",
                                "Table","Guidelines","|","Line","Form","StyleAndFormatting","TextFormatting","ListFormatting",
                                "BoxFormatting","ParagraphFormatting","CssText","Styles","|","Paragraph","FontName","FontSize","|","Bold","Italic",
                                "Underline","|","JustifyLeft","JustifyCenter","JustifyRight","JustifyFull"];
                                
                                oEdit2.cmdAssetManager="modalDialogShow('/Editor/assetmanager/assetmanager.php',640,465)";//Use "relative to root" path
                                oEdit2.btnFlash=false;//Show 'Insert Flash' button
                                oEdit2.btnMedia=false;//Show 'Insert Media' button
                                oEdit2.RENDER(document.getElementById("idTemporary").innerHTML);
                            </script> 
                            <input type="hidden" name="inpContent2"  id="inpContent2"> 
                         </td> 
                    </tr>                     

					<!--รูปที่ 1-5 -->
                    <? 
					for( $picnum=0 ; $picnum < 1 ; $picnum++  )
					{
							$filearr_count = $picnum+1;
                            $filearr_name = "file_array" . $filearr_count;
					?>
                    
                            <tr> 
                                 <td align="right" width="120" valign="top" bgcolor="#FFFFFF">รูปที่ <?=$filearr_count?> : </td> 
                                 
                                 <td align="Left" valign="top">&nbsp;<input type="file" name="<?=$filearr_name?>"></td> 
                            </tr>	

					<?
					}
                    ?>
                 <!--   <tr>
                    	<td>&nbsp;</td>
                        <td>
                        		<hr/>
                        </td>
                    </tr>-->
					<!--ดาวน์โหลด -->
                    <? 
					$loadarr_name[1] = "อัพโหลดโบรชัวร์";
					
					for( $loadnum=0 ; $loadnum < 1 ; $loadnum++  )
					{
							$filearrload_count = $loadnum+1;
                            $filearrload_name = "file_arrayload" . $filearrload_count;
					?>
                    
                       <!--     <tr> 
                                 <td align="right" width="120" valign="top" bgcolor="#FFFFFF">
								 <?=$loadarr_name[$filearrload_count] ?>  :
                                  </td> 
                                 
                                 <td align="Left" valign="top">&nbsp;
                                	 <input type="file" name="<?=$filearrload_name?>">
                                 </td> 
                            </tr>	-->

					<?
					}
                    ?>       
                    <tr>
                        <td colspan="2">&nbsp;</td>
					</tr>
                    <tr align="center">
                        <td colspan="2">
	                        <input type="hidden" name="main_cate" value=""/>
	                        <input type="hidden" name="sub1_cate" value=""/>
	                        <input type="hidden" name="sub2_cate" value=""/>
                      		<input type="hidden" name="countMainCate" value="<?=$countMainCate?>">
                      		<input type="hidden" name="countSub1Cate" value="<?=$countSub1Cate?>">
                      		<input type="hidden" name="countSub2Cate" value="<?=$countSub2Cate?>">
                            <input type="submit" value="บันทึก" style="width:100px; height:30px; font-size:16px" />
                            <input type="reset" value="เริ่มใหม่" />
                        </td>
					</tr>
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