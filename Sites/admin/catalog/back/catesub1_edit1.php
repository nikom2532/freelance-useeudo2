<?
	@session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../style/style.css" />

<?
include_once("../include/wb_config.php");
include("../include/function.php");

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

	<script language=JavaScript src='../Editor/scripts/innovaeditor.js'></script><pre id="idTemporary" name="idTemporary" style="display:none"> 
	</pre>

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

function Save2DB()
{
	var name_cate = urlEncode(document.forms.Form1.name_cate.value); //encode ด้วย
	var status_cate = document.forms.Form1.status_cate.value;
	

	//ตรวจสอบว่ากรอกข้อมูลหรือไม่
	if ( name_cate.length==0)
	{
		alert("กรุณากรอกชื่่อหมวดหมู่ด้วยค่ะ");
		document.forms.Form1.name_cate.focus();           
		return false;
	}

	//จัดเตรียมข้อมูลก่อนส่งไปบันทึก
	var param = "name_cate=";
	param += name_cate;
	param += "&";
	param += "status_cate=";
	param += status_cate;

	var xmlhttp = GetXMLHTTP();

	xmlhttp.onreadystatechange=function()
	 {
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			//alert(xmlhttp.responseText);
			//document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
			if( xmlhttp.responseText == "OK" )
				alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ');
			else
				alert('เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ');
		}
	}

	xmlhttp.open("GET","fn_savecatesub1.php?"+param,false);
	xmlhttp.send();
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

		xmlhttp.open("GET","fn_delcatesub1.php?del="+need_del,false);
		xmlhttp.send();			
	}
}

function SaveRec()
{
	//alert("aaa");
	
	need_id = "";
	need_name = "";
	need_brand = "";
	param = "";

	for( i=1 ; i<document.forms.Form1.hdnLine.value ; i++ )
	{
		namecate = eval("document.forms.Form1.namecate"+i);
		
		
		/*var namebrand =eval("document.forms.Form1.namebrand"+i );
		var need_brand = namebrand.options[namebrand.selectedIndex].value;
*/
		need_id   = namecate.name;
		need_name = namecate.value;
	
		param += need_id + ";;";
		//param += need_brand + ";;";
		param += need_name + "||";
	}

	//alert(param);
	//return;

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
		xmlhttp.open("GET","fn_savecatesub1.php?save="+param,false);
		xmlhttp.send();	
	}
}
		function InitVariable() 
		{
			document.forms.Form1.elements.inpContent2.value = oEdit2.getHTMLBody();
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
                <?
					$catemainid = $_GET[cateid];
					
					include ("../include/connect.php");
					mysql_query("SET NAMES UTF8");
					mysql_select_db($dbname, $cn);
	
					$sql = "select * from tb_catemain where id_cate='$catemainid'";
					$result = mysql_db_query($dbname,$sql);
					$r = mysql_fetch_array($result);
					$name_cate = $r[name_cate];
					$detail_cate = $r[detail_cate];
				?>
                
                
                <h4>แก้ไข/ลบหมวดหมู่สินค้าย่อย 1</h4>
            	<h5>ระบบจัดการสินค้า > บริหารหมวดหมู่สินค้า > แก้ไข/ลบหมวดหมู่สินค้า > แก้ไข/ลบหมวดหมู่สินค้าย่อย 1</h5>
                <h3>หมวดหมู่หลัก : <?=$name_cate?></h3>
                  <form action="fn_savecatesub11.php" method="post" id="Form1" onsubmit="return InitVariable()" enctype="multipart/form-data"> 
                <table>
                	<tr>
                    	<td>ชื่อหมวดหมู่สินค้า :</td>
                        <td>
			                <input type="text" size"50" name="name_cate" value="<?=$name_cate?>"/><font color="red">*</font>
 						</td>
                    </tr>
                    
                    <!-- <tr> 
                         <td align="right" valign="top" style="padding-top:12px;">รายละเอียด : </td> 
                         <td align="Left"> 
                            <script> 
                                var oEdit2 = new InnovaEditor("oEdit2");
                                oEdit2.arrStyle = [["BODY",false,"","background:#ffffff;color:Black;font-family:Tahoma,Verdana,Arial,Helvetica;font-size:x-small;margin:3px;"]];
                                oEdit2.width=600;
                                oEdit2.height=300;
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
                            <input type="hidden" name="inpContent2"  id="inpContent2"></td> 
                    </tr> -->   
                <!--     <tr>
                	  <td>รูปหมวดหมู่สินค้า</td>
                	  <td><input type="file" name="file_name"></td>
              	  </tr>
                   <tr>
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
                        <input type="hidden" name="id_edit" value="<?=$catemainid ?>"/>
                            <input type="submit" value="บันทึก" />
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