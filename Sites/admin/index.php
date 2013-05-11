<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style/style.css" />

<?
include_once("include/wb_config.php");
?>
<title><?=$title_name?></title>

<head>

<script language="JavaScript">			

    function page_init()
	{
		document.forms.form_authen.user.focus();    
	}
    </script>
</head>

<body onload="page_init()">

<?
	//ทำ Redirect เป็น Sub Domain
	$maindomain = "ktbprecision.com";
	$sub = preg_replace("/(\.)?(".$maindomain.")$/", "", $_SERVER["HTTP_HOST"]);
	
	//กรอง
	if( $sub=="www" )
	{
		echo "
			<script langquage='javascript'>
			window.location=\"http://admin.ktbprecision.com\";
			</script>
		";
		return;
	}
?>

	<div id="wrapper">
    	<div id="tophead">
        	<div class="logo"><p>&nbsp;</p></div>
         
         	<div class="meminfo">
				<?
                    //ข้อมูลของสมาชิก ส่วน Header
                    include("include/top_meminfo.inc.php"); 
                ?>
            </div>
         </div>
        
        <div id="right">
        	<div class="detail">
             
            <form method="post" name="form_authen" action="include/admin_check.php">
            <table width="100%" align="center">
			  <tr><td colspan="2">&nbsp;</td></tr>

              <tr>
                <td><div align="center">ชื่อผู้ใช้:</div></td>
                <td><input name="user" type="text" size="20" />
                   <font color="red">*</font></td>
              </tr>
              <tr>
                <td><div align="center">รหัสผ่าน:</div></td>
                <td><input name="pass" type="password" size="20" />
                   <font color="red">*</font></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="LOGIN" /></td>
              </tr>
            </table>
            </form>

            </div>
        </div>
       
        <div class="clear"></div>
        <div id="footer">
         		 <?
           			 include("include/footer.inc.php"); 
       			 ?>
           </div>
   </div>
</body>
</html>