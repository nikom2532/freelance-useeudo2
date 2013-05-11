<?
	@session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../style/style.css" />

<title>ระบบหลังร้านเว็บไอโอเคดอทคอม</title>

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

<!--Include the Editor js file --> 
<script language=JavaScript src='../Editor/scripts/innovaeditor.js'></script><pre id="idTemporary" name="idTemporary" style="display:none"> 
</pre> 

<script type="text/javascript">

function InitEditorValue() 
{
	document.forms.Form1.elements.inpContent.value = oEdit1.getHTMLBody();
	
	if( document.forms.Form1.showpm.checked==true )
		document.forms.Form1.showpm.value = 1;
	else
		document.forms.Form1.showpm.value = 0;
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
					//$catemainid = $_GET[cateid];
					$id_mem = $_SESSION[sess_idmem];

					include ("../include/connect.php");
					mysql_query("SET NAMES UTF8");
					mysql_select_db($dbname, $cn);
	
/*					$sql = "select * from tb_catemain where id_mem='$id_mem' and id_cate='$catemainid'";
					$result = mysql_db_query($dbname,$sql);
					$r = mysql_fetch_array($result);
					$catemain_name = $r[name_cate]; */
				?>
                <h4>บริหารหน้าโปรโมชั่น</h4>
            	<h5>ระบบจัดการโปรโมชั่น > บริหารหน้าโปรโมชั่น</h5>
                <form action="fn_saveprompage.php" method="post" id="Form1" enctype="multipart/form-data" onsubmit="InitEditorValue()"> 
                <table width="95%" border="0">

                	<?
                    include ("../include/connect.php");
                    mysql_query("SET NAMES UTF8");
                    mysql_select_db($dbname, $cn);

					$id_mem = $_SESSION[sess_idmem];
					$num_rec = 0;

					$sql = "select * from tb_promotion where id_mem='$id_mem' ";
					$result = mysql_db_query($dbname,$sql);
					
					if( $result )
					{
						$num_rec = mysql_num_rows($result); //Get จำนวน record

						if( $num_rec==0 )
						{
							// insert record here
							$sql2="insert into tb_promotion values('','1','<name>','','1','<name>','','$id_mem')";
							mysql_db_query($dbname,$sql2);
	
							//select * from.... again
							$result = mysql_db_query($dbname,$sql);
						}
	
						$r= mysql_fetch_array($result);
						
						$id_pm = $r[id_pm];
						$showpg_pm = $r[showpg_pm];
						$namepg_pm = $r[namepg_pm];
						$detailpg_pm = $r[detailpg_pm];
	
						//$detailpg_pm = addslashes ($detailpg_pm);
	
						$id_pm = sprintf("%d", $id_pm);
					}
					?>                

                	<tr bgcolor="#CCCCCC" align="left">
                    	<td colspan="2">
                        <?
							if( $showpg_pm == 1 )
                        		echo "<input type='checkbox' name='showpm' value='1' checked='checked' />แสดงโปรโมชั่นในหน้าเว็บไซต์";
							else
                        		echo "<input type='checkbox' name='showpm' />แสดงโปรโมชั่นในหน้าเว็บไซต์";
						?>
                        </td>
                    </tr>
                    
                	<tr>
                    	<td align="right">ชื่อโปรโมชั่น : </td>
                    	<td><input type="text" name="name" value="<?=$namepg_pm?>" size="50" style="width:450px;">
                    </tr>

                    <tr> 
                         <td align="right">รายละเอียด : </td> 
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
								
								oEdit1.loadHTML("<?=addslashes($detailpg_pm)?>");
                            </script> 
                            <input type="hidden" name="inpContent"  id="inpContent"> 
                         </td> 
                    </tr> 
                    <input type="hidden" name="recid" value="<?=$id_pm?>" />
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr align="center">
                    	<td colspan="2">
                        	<input type="submit" value="Save" />
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