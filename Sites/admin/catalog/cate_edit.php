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
    
    <script language=JavaScript src='../Editor/scripts/innovaeditor.js'></script><pre id="idTemporary" name="idTemporary" style="display:none"> 
	</pre>

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
   
    
    
    
    
     function InitVariable()
    {
		document.forms.Form1.elements.inpContent2.value = oEdit2.getHTMLBody();
		var name_cate = urlEncode(document.forms.Form1.name_cate.value); //encode ด้วย
//		var status_cate = document.forms.Form1.status_cate.value;

		//ตรวจสอบว่ากรอกข้อมูลหรือไม่
		if ( name_cate.length==0)
		{
			alert("กรุณากรอกชื่่อหมวดหมู่ด้วยค่ะ");
			document.forms.Form1.name_cate.focus();           
			return false;
		}

  }
  
  
  
  function Delload( id, picno )
{
	if( confirm('หากต้องการลบ กรุณายืนยันอีกครั้ง')==false ) 
	{
		return;
	}

	if( id != "" && picno !="" )
	{
		
		var xmlhttp = GetXMLHTTP();

		xmlhttp.onreadystatechange=function()
		 {
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				//alert(xmlhttp.responseText);
				if( xmlhttp.responseText == "OK" )
				{
					//alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ');
					document.location.reload();
				}
				//else
					//alert('เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ');
			}
		}
		xmlhttp.open("GET","fn_deldownloadcate.php?id="+id+"&picno="+picno, false);
		xmlhttp.send();	
	}
}

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
   
  
 function DelPic(id)
{
	if( confirm('หากต้องการลบ กรุณายืนยันอีกครั้ง')==false ) 
	{
		return false;
	}
	
	if( id != "" )
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
	
		xmlhttp.open("GET","fn_delcatepic.php?id="+id , false);
		xmlhttp.send();	
	}
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
                <h4>แก้ไขสินค้า</h4>
           	 <h5>ระบบจัดการสินค้า > บริหารสินค้า >แก้ไขสินค้า</h5>
             <?
					$id_cate = $_GET[cateid];
					
                    include ("../include/connect.php");
                    mysql_query("SET NAMES UTF8");
                    mysql_select_db($dbname, $cn);

					$sql = "select * from tb_catemain where id_cate=$id_cate";
					$result = mysql_db_query($dbname,$sql);
					$num_rec = mysql_num_rows($result); //Get จำนวน record

					$counter = 1;
					if($r= mysql_fetch_array($result))
					{
						$id_cate = sprintf("%d", $r[id_cate]);
						$name_cate = $r[name_cate];
						$status_cate = $r[status_cate];
						$ord_cate = $r[ord_cate];
						$show_cate = $r[show_cate];
						$pic_cate = $r[pic_cate];
						$detail_cate = $r[detail_cate];
						$youtube = $r[youtube];
						//$downloadarr[0] = $r[download_pdf];
						$download = $r[download_pdf];
						$more = $r[more];
						
						if ($pic_cate !='')
							$fileimg =$server_file  .  "/" . $menufolder . "/" . $pic_cate;
						else
							$fileimg ="../images/nopic.jpg";
						
						//ตัด \r\n
						$needcut = array("\r\n", "\n", "\r");
						$detail_cate = str_replace($needcut, "", $detail_cate);
						
					}
					?>
                 <form action="fn_editcate.php" method="post" id="Form1" onsubmit="return InitVariable()" enctype="multipart/form-data"> 
              <table width="737">
                	
                	<tr>
                    	<td>ชื่อสินค้า :</td>
                        <td>
                        	
			                <input name="name_cate" type="text" size="70"  value="<?=$name_cate?>"/><font color="red">*</font>
 							
                        </td>
                    </tr>
                    <input type="hidden" value="<?=$id_cate?>" name="idedit" />
                    <tr>
                	  <td width="128" valign="top">รายละเอียด : </td>
                	  <td width="597">
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
								oEdit2.loadHTML("<?=addslashes($detail_cate)?>");
                            </script> 
                            <input type="hidden" name="inpContent2"  id="inpContent2">
                      </td>
              	  </tr>
                  
                  
                 <!--ดาวน์โหลด -->
<!--
                    <? 
					$loadarr_name[1] = "อัพโหลดโบรชัวร์";
					
					for( $loadnum=0 ; $loadnum < 1 ; $loadnum++  )
					{
							$filearrload_count = $loadnum+1;
                            $filearrload_name = "file_arrayload" . $filearrload_count;
							$product_file= $server_file . "/" . $downloadfolder . "/" . $downloadarr[$loadnum] ;
					?>
                    
                            <tr> 
                                 <td align="right" width="120" valign="top" bgcolor="#FFFFFF"><small><?=$loadarr_name[$filearrload_count] ?> </small> : </td> 
                                 
                                 <td align="Left" valign="top">
                                 <small>
                                 	<?
									 if ($downloadarr[$loadnum] != '' )
									{?>
                                		 <a target="_blank"  href="<?=$product_file?>"><?=$downloadarr[$loadnum] ?></a>
                                 	<?
									}
									else
									{
										echo "ไม่พบไฟล์ <span style='font-size:11; color:#f51808;'>( <i>อัพโหลดได้เฉพาะนามสกุล .pdf เท่านั้น </i>)</span>";
									}
									?>
                                 
                                 </small>
                                 <br/>
                                 <? $delbtnname = "ลบไฟล์ " . $filearrload_count; ?>
                                <input type="button" name="del_works" value="<?=$delbtnname?>" onclick="Delload('<?=$id_cate?>', '<?=$filearrload_count?>')" style="width:80px; height:22px; font-size:12px" />
                                 <input type="file" name="<?=$filearrload_name?>"></td> 
                            </tr>	-->

					<?
					}
                    ?>   


                    <!--<tr> 
                         <td align="right" width="120" valign="top" bgcolor="#FFFFFF">
                       ดาวน์โหลด  :
                          </td> 
                         
                         <td align="Left" valign="top">&nbsp;
                             <input name="downloadlink" type="text" size="30" value="<?=$download?>"/>
                             &nbsp;&nbsp;&nbsp;<small style="color:red">ขึ้นต้นด้วย http://</small>
                         </td> 
                    </tr>

                    <tr> 
                         <td align="right" width="120" valign="top" bgcolor="#FFFFFF">
                        วีดีโอ  :
                          </td> 
                         
                         <td align="Left" valign="top">&nbsp;
                             <input name="youtube" type="text" size="30" value="<?=$youtube?>" />
                         </td> 
                    </tr>	
                    
                    <tr> 
                         <td align="right" width="120" valign="top" bgcolor="#FFFFFF">
                       ลิ้งค์อื่นๆ  :
                          </td> 
                         
                         <td align="Left" valign="top">&nbsp;
                             <input name="more" type="text" size="30" value="<?=$more?>"/>
                             &nbsp;&nbsp;&nbsp;<small style="color:red">ขึ้นต้นด้วย http://</small>
                         </td> 
                    </tr>-->
                  
                  
                  
<!--                    <tr>
                        <td>สถานะ :</td>
                        <td>
                            <select name="status_cate">
                                <option value=0>N/A</option>
                                <option value=1>New</option>
                                <option value=2>Hot</option>
                            </select>
                        </td>
                    </tr>  -->
                    <tr>
                        <td colspan="2">&nbsp;</td>
					</tr>
                    <tr align="center">
                        <td colspan="2">
                            <input type="submit" value="บันทึก" />
                           <!-- <input type="reset" value="เริ่มใหม่" />-->
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