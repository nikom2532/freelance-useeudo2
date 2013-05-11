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
   
    function Save2DB()
    {
		var name_cate = urlEncode(document.forms.Form1.name_cate.value); //encode ด้วย
		var catemainid = document.forms.Form1.catemainid.value; //encode ด้วย

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
		param += "catemainid=";
		param += catemainid;

		//HttpRequest
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

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

        xmlhttp.open("GET","fn_addcatesub2.php?"+param,false);
        xmlhttp.send();
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
					$catemainid = $_GET[mainid];
					$catesubid = $_GET[cateid];

					include ("../include/connect.php");
					mysql_query("SET NAMES UTF8");
					mysql_select_db($dbname, $cn);
	
					//อ่าน Cate Main
					$sql = "select * from tb_catemain where id_cate='$catemainid'";
					$result = mysql_db_query($dbname,$sql);
					$r = mysql_fetch_array($result);
					$catemain_name = $r[name_cate];

					//อ่าน Cate Sub 1
					$sql = "select * from tb_catesub1 where id_cate='$catesubid'";
					$result = mysql_db_query($dbname,$sql);
					$r = mysql_fetch_array($result);
					$catesub1_name = $r[name_cate];
				?>

                <h4>เพิ่มหมวดหมู่ย่อย 2</h4>
            	<h5>ระบบจัดการสินค้า > บริหารหมวดหมู่สินค้า > แก้ไข/ลบหมวดหมู่สินค้า > แก้ไข/ลบหมวดหมู่ย่อย 1 > เพิ่มหมวดหมู่ย่อย 2</h5>
                <h3><?=$catemain_name?></h3>
                <form method="post" id="Form1" onsubmit="return Save2DB()" enctype="multipart/form-data"> 

				<input name="catemainid" type="hidden" value="<?=$catesubid?>"/>
                
                <table>
                	<tr>
                    	<td>ชื่อหมวดหมู่ย่อย 2 :</td>
                        <td>
			                <input name="name_cate" type="text" size="30" /><font color="red">*</font>
 						</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
					</tr>
                    <tr align="center">
                        <td colspan="2">
                            <input type="submit" value="บันทึก" />
                            <input type="reset" value="เริ่มใหม่" />
                        </td>
					</tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr align="left">
                        <td colspan="2">
                            <input type="button" value="<< กลับไปหมวดหมู่ย่อย 1" onclick="window.location='catesub1_edit.php?cateid=<?=$catemainid?>'" />
                        </td>
					</tr>
                </table>
                </form>
				<?
				mysql_close($cn);
				?>
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