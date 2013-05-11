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
	document.forms.Form1.elements.inpContent.value = oEdit1.getHTMLBody();
	//var name_treatment = document.forms.Form1.name_treatment.value;
	
	
	//ตรวจสอบว่ากรอกข้อมูลหรือไม่
	
/*	if ( name_treatment.length==0)
	{
		alert("กรุณากรอกชื่่อโปรโมชั่นด้วยค่ะ");
		document.forms.Form1.name_service.focus();           
		return false;
	} */



	var main_cate = "";
	
		//รับค่า main_cate
		if( document.forms.Form1.countMainCate.value >= 1 )
		main_cate = ",";
		for( i=1 ; i<document.forms.Form1.countMainCate.value ; i++ )
		{
			if(eval("document.forms.Form1.chk_catemain"+i+".checked")==true)
			{
				//alert ('aaaaaa')
				nameofmain = eval("document.forms.Form1.chk_catemain"+i);
				need_id   = nameofmain.value;
				main_cate += need_id + ",";
			}
		}
		  //ฝากไว้ในตัวแปร main_cate
		  document.forms.Form1.main_cate.value = main_cate;


	
}
function DelPic( id, picno )
{
	if( confirm('หากต้องการลบ กรุณายืนยันอีกครั้ง')==false ) 
	{
		return;
	}

	if( id != "" && picno !="" )
	{
		//alert('xx');
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
		xmlhttp.open("GET","fn_delpic.php?id="+id+"&picno="+picno, false);
		xmlhttp.send();	
	}
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
					alert('ลบข้อมูลเรียบร้อยแล้วค่ะ');
					document.location.reload();
				}
				else
					alert('เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้ค่ะ');
			}
		}

		xmlhttp.open("GET","fn_delcatemain.php?del="+need_del,false);
		xmlhttp.send();			
	}
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
              <h4>แก้ไขโปรโมชั่น</h4>
           	  <h5>ระบบจัดการโปรโมชั่น > บริหารโปรโมชั่น > แก้ไขโปรโมชั่น</h5>
				
				 <?          

				$id = $_GET["id"];

                include("../include/connect.php");
                mysql_query("SET NAMES UTF8");
				
				//อ่านข้อมูลของสินค้า จากฐานข้อมูล
				$sql = "select * from tb_catesecret where id_cate='$id' ";
				$result = mysql_db_query($dbname,$sql);

				while($r=mysql_fetch_array($result))
				{
					$name = $r[name_cate];
					$id_cate =$r[id_cate];
				
					
				}
                ?>                
				<?          
                //include("../include/connect.php");
                //mysql_query("SET NAMES UTF8");
				//ตัด \r\n
				$needcut = array("\r\n", "\n", "\r");
				$detail = str_replace($needcut, "", $detail);
                ?>                
                <form action="fn_edit.php" method="post" id="Form1" onsubmit="return InitVariable()" enctype="multipart/form-data"> 
                <table width="741">

                   <input type="hidden" name="edit_id" value="<?=$id?>"/>


                    <!--ชื่อบความ-->
                	<tr>
                    	<td width="135" align="right"><strong>ชื่อสูตรอาหาร</strong>  :</td>
                        <td colspan="2">
		                  <input  id="name_service" name="name_service" type="text" size="50" value="<?=$name?>"/>
 						</td>
                    </tr>
                    <?
                    	$sql_sub = "select * from tb_catesecretsub1 where mainid_cate='$id' ";
						$result_sub = mysql_db_query($dbname,$sql_sub);
		$counter=1;
						while($r_sub=mysql_fetch_array($result_sub))
							{
									$subname = $r_sub[name_cate];
									$sub_id =$r_sub[id_cate];
									$youtube =$r_sub[youtube];
							
					?> 
                    <input type="hidden" name="sub_id[]" value="<?=$sub_id?>"/>
                    <tr>
                    	<td align="right">รายการ <?=$counter?> :</td>
                        <td width="477">
                     <input  id="name_sub" name="name_sub[]" type="text" size="30" value="<?=$subname?>"/>
                     <input  id="name_sub" name="youtube_sub[]" type="text" size="30" value="<?=$youtube?>"/>
                    </td>
                    <?
							$chk = "chk" . $counter;
                     ?>
                     <td width="113"><input type="checkbox" name="deleterec" id="<?=$chk?>" value="<?=$sub_id?>"/>ลบ</td>
                    </tr>
                    <? 
								$counter++;
							} 
					?>
                    
                    <input type="hidden" name="hdnLine" value="<?=$counter?>">
                	<!--<tr> 
                         <td align="right" valign="top" style="padding-top:15px;">รายละเอียด : </td> 
                         <td align="Left"> 
                            <script> 
                                var oEdit1 = new InnovaEditor("oEdit1");
                                oEdit1.arrStyle = [["BODY",false,"","background:#ffffff;color:Black;font-family:Tahoma,Verdana,Arial,Helvetica;font-size:x-small;margin:3px;"]];
                                oEdit1.width=600;
                                oEdit1.height=500;
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
								oEdit1.loadHTML("<?=addslashes($detail)?>");

                            </script> 
                            <input type="hidden" name="inpContent"  id="inpContent"> 
                         </td> 
                    </tr>                     -->
					
                        <!--รูปที่ 1-5 -->
                        <? 
                    /*    for( $picnum=0 ; $picnum < 1 ; $picnum++  )
                        {
                                $filearr_count = $picnum+1;*/
                        ?>
                    <!--    
                        <tr> 
                             <td align="right" width="135" valign="top" bgcolor="#FFFFFF">รูปที่ <?=$filearr_count?> : </td> 
                             <td align="Left" valign="top">-->
                    <?
                             /*   if( $filepic != '' ) 
                                {
                                     $product_album = "../../album/promotion/" . $filepic;
                                    //echo "<img width='150' src='showimage.php?id=$id&picnum=1' /><br>";
                                    echo "<img width='150' src='$product_album' /><br>";
                                }
                                else
                                {
                                    echo "<img width='150' src='../images/nopic.jpg' /><br>";
                                }
                                $filearr_name = "file_array" . $filearr_count;*/
                     ?>
                                <? /*$delbtnname = "ลบรูปที่ " . $filearr_count;*/ ?>
                              <!--  <input type="button" name="del_works" value="<?=$delbtnname?>" onclick="DelPic('<?=$id?>', '<?=$filearr_count?>')" style="width:80px; height:22px; font-size:12px" />
    
                                <input type="file" name="<?=$filearr_name?>">
    
                             </td> 
                        </tr>-->
                        <?
				//	}
                    ?>
                    
                    
                        <!--ดาวน์โหลด -->
                    	
                    <? 
				/*	$loadarr_name[1] = "อัพโหลดโบรชัวร์";
					
					for( $loadnum=0 ; $loadnum < 1 ; $loadnum++  )
					{
							$filearrload_count = $loadnum+1;
                            $filearrload_name = "file_arrayload" . $filearrload_count;
							$product_file= $server_file . "/" . $downloadfolder . "/" . $downloadarr[$loadnum] ;*/
					?>	

					<?
				//	}
                    ?>                  
<!--                        <tr>
                       <td align="right">ที่มา :</td>
                        <td>
		                  <input name="credit_service" type="text" size="30" value="<?=$credit_service?>" />
                          <small style="color:red">ขึ้นต้นด้วย http://</small>
 						</td>
                         </tr> -->
					
                    <tr>
                        <td colspan="2" align="right"><input type="button" name="delete_now" value="ลบ" onclick="DeleteRec()" /></td>
					</tr>
                    <tr align="center">
                        <td colspan="2">
	                      
	                      	<input type="hidden" name="main_cate" value=""/>
                            <input type="hidden" name="countMainCate" value="<?=$countMainCate?>">

                            <input type="submit" value="บันทึก" style="width:100px; height:30px; font-size:16px" />
                      <!--      <input type="reset" value="เริ่มใหม่" />-->
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