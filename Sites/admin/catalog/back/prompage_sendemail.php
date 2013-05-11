<?
	@session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../style/style.css" />

<title>ระบบหลังร้านเว็บไอโอเคดอทคอม</title>

<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    
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
					alert('ลบข้อมูลเรียบร้อยแล้วค่ะ');
					document.location.reload();
				}
				else
					alert('เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้ค่ะ');
			}
		}

		xmlhttp.open("GET","fn_delproduct.php?del="+need_del,false);
		xmlhttp.send();			
	}
}

function SaveRec()
{
	//alert("aaa");
	
	need_id = "";
	need_name = "";
	need_show = "";
	param = "";

	for( i=1 ; i<document.forms.Form1.hdnLine.value ; i++ )
	{
		nameprod = eval("document.forms.Form1.nameprod"+i);

		need_id   = nameprod.name;
		need_name = nameprod.value;

		if(eval("document.forms.Form1.show"+i+".checked")==true)
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
		xmlhttp.open("GET","fn_saveproduct.php?save="+param,false);
		xmlhttp.send();	
	}
}

function refreshpage(value)
{
	//alert("cate=" + value);
	window.location='prodmain_edit.php?cate=' + value;
	//alert(value);
}

</script>

	<div id="wrapper">
    	<div id="tophead"></div>
        	<div class="logo"><p>&nbsp;</p></div>

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
                <h4>ส่งอีเมล์โฆษณาโปรโมชั่น</h4>
            	<h5>ระบบจัดการโปรโมชั่น > ส่งอีเมล์โฆษณาโปรโมชั่น </h5>
                <form action="fn_sendemail.php" method="post" id="Form1" enctype="multipart/form-data"> 
                <table width="95%" border="0">
                	<tr align="left">
	                    <td width="30%">&nbsp;</td>
	                    <td><font color="red">
	                    	คั่นด้วยเครื่องหมาย , แต่ละอีเมล์
                            </font>
                         </td>
                    </tr>
                	<tr align="center">
                    	<td align="right">อีเมล์ที่ต้องการส่ง :</td>
                        	<td><textarea name="sendto" rows="12" cols="60"></textarea>
                        	</td>
                    </tr>
                	<tr align="center">
                    	<td align="right">หัวเรื่อง :</td>
                        <td align="left"><input type="text" name="subject" size=70></text>
                        </td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                	<tr align="left">
	                    <td colspan="2" align="center"><input type="submit" value="ส่งอีเมล์">&nbsp;&nbsp;<input type="reset" value="เริ่มใหม่" /></td>
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