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
	var name_service = document.forms.Form1.name_service.value;
	
	
	//ตรวจสอบว่ากรอกข้อมูลหรือไม่

	if ( name_service.length==0)
	{
		alert("กรุณากรอกชื่่อสูตรอาหารด้วยค่ะ");
		document.forms.Form1.name_service.focus();           
		return false;
	}
/*	if ( $("#datepicker").val().length==0)
		{
			alert("กรุณากรอกวันที่เดินทางไปด้วยค่ะ");
			document.forms.Form1.name_service.focus();           
			return false;
		}
		if ( $("#datepicker").val().length==0)
		{
			alert("กรุณากรอกวันที่เดินทางไปด้วยค่ะ");
			document.forms.Form1.name_service.focus();           
			return false;
		}
*/

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
</script>
<!--calendar-->

 <link href="../../js/jquery-ui.css" rel="stylesheet" type="text/css"/>
 <script src="../../js/jquery-ui.min.js"></script>
 <script>
 
 $(document).ready(function() {
		$("#datepicker").datepicker({dateFormat: "yy-mm-dd"});
		$("#datepicker2").datepicker({dateFormat: "yy-mm-dd"});
		
		//var pattern = new RegExp(/[0-3][0-9]-(0|1)[0-9]-(19|20)[0-9]{2}/);
		//$("form").submit(function(){
	
 });
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
              <h4>เพิ่มสูตรอาหาร</h4>
           	  <h5>ระบบจัดการสูตรอาหาร > บริหารสูตรอาหาร > เพิ่มสูตรอาหาร</h5>
				<?          
                include("../include/connect.php");
                mysql_query("SET NAMES UTF8");
                ?>                

                <form action="fn_add.php" method="post" id="Form1" onsubmit="return InitVariable()" enctype="multipart/form-data"> 
                <table>

                   <input type="hidden" name="shipcost" value="" />

                   
                    <!--ชื่อบความ-->
                	<tr>
                    	<td align="right">ชื่อสูตรอาหาร<font color="red">*</font>:</td>
                        <td width="303">
			                <input name="name_service" type="text" size="50" />
 						</td>
                    </tr>   
                    
					<!--วันเดินทาง-->
					<!--รายละเอียด-->
                   <!-- <tr> 
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
                            </script> 
                            <input type="hidden" name="inpContent"  id="inpContent"> 
                         </td> 
                    </tr>           -->          
					<!--รูปที่ 1-5 -->
                    <? 
				/*	for( $picnum=0 ; $picnum < 1 ; $picnum++  )
					{
                            $file_array = "file_array" . $picnum;*/
					?>
                    
                           <!-- <tr> 
                                 <td align="right" width="135" valign="top" bgcolor="#FFFFFF">รูป : </td> 
                                 
                                 <td align="Left" valign="top">
                                 <input type="file" name="<?=$file_array?>">
                                 </td> 
                            </tr>	-->
						<?
                //        }
                        ?>
					<!--ดาวน์โหลด -->
                    <? 
					/*$loadarr_name[1] = "อัพโหลดโบรชัวร์";
					
					for( $loadnum=0 ; $loadnum < 1 ; $loadnum++  )
					{
							$filearrload_count = $loadnum+1;
                            $filearrload_name = "file_arrayload" . $filearrload_count;*/
					?>
					<?
				//	}
                    ?>
				
<!--                    <tr>
                      <td align="right">ที่มา :</td>
                      <td>
                      		<input name="credit_service" type="text" size="30" />
                      		<small style="color:red">ขึ้นต้นด้วย http://</small></td>
                    </tr> -->
                    <tr>
                        <td colspan="2">&nbsp;</td>
					</tr>
                    <tr align="center">
                        <td colspan="2">
	                      
	                      	<input type="hidden" name="main_cate" value=""/>
                            <input type="hidden" name="countMainCate" value="<?=$countMainCate?>">

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
