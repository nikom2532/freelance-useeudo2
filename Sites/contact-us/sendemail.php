<!--ถ้าไม่ใส่บรรทัดนี้ จะทำให้แสดงข้อความภาษาไทยแล้ว เป็นอักขระที่อ่านไม่รู้เรื่อง-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	@session_start();

	/*
	$fromemail = $_POST[email];
	
	$detail       = $_POST[message];
	$capchar   = $_POST[capchar];*/
	
	$name      = $_POST[name];
	$tel = $_POST[tel];
	$email      = $_POST[email];
	$secret1      = $_POST[secret1];
	$secret2      = $_POST[secret2];	
	$secret3      = $_POST[secret3];
	$secret4      = $_POST[secret4];	
	$prod       = $_POST[prod];
	$detail       = $_POST[message];
	
	$timecontact       = $_POST['time-contact'];
	include "function.php";

	if ($secret1=="" or  $email =="" or $name =="" or $tel =="" )
	{
		//echo "<h3>ERROR : กรุณากรอกข้อมูลให้ครบด้วยค่ะ</h3>";
		echo "<script language='javascript'>alert('กรุณากรอกข้อมูลให้ครบด้วยค่ะ');
			  javascript:history.back();</script>";
		exit();
	}
	if (!checkemail($email))
	{
		//echo "<h3>ERROR : รูปแบบอีเมลที่กรอกไม่ถูกต้องค่ะ</h3>";
		echo "<script language='javascript'>alert('รูปแบบอีเมลที่กรอกไม่ถูกต้องค่ะ');
			  javascript:history.back();</script>";
		exit();
	}
	/*if($capchar!=$_SESSION['random_number'])
	{
		echo "<script language='javascript'>alert('รหัสยืนยันไม่ถูกต้อง กรุณาลองใหม่อีกครั้งค่ะ');
			  javascript:history.back();</script>";
		exit();
	}*/
	
	//แก้ไขตรงนี้
	$main_website = "http://www.useeudo.com"; //เว็บไซต์หลัก หลังจากส่งอีเมล์แล้วให้กลับไปที่ไหน
	$from_admin = "noreply@useeudo.com";

	$sub   = "จดหมายจากลูกค้า";
	$ccto = "info@useeudo.com"; 	//จะปรากฎในอีเมล์ว่าส่งถึงใคร
	$bccto = "thanapon@sci-nano.com"; 		//จะไม่ปรากฎในอีเมล์ว่าส่งถึงใคร
	
	$emailto = "useeudo@gmail.com";  //อีเมล์ผู้รับ 
	//

	if( $ccto != "" )
		$ccto = "Cc: " .$ccto. "\r\n";
	if( $bccto != "" )
		$bccto = "Bcc: " .$bccto. "\r\n";

	date_default_timezone_set('Asia/Bangkok');
	/*$msg .= "\r\n\r\n";
	$msg .= "จาก " . $name;
	$msg .= "\r\n";
	$msg .= "โทร :".$tel ;
	$msg .= "\r\n";
	$msg .= "อีเมล์ :".$fromemail;
	$msg .= "\r\n";
	$msg .= date("d M Y  G:i");   */      // 01 Mar 2009  17:16
	$msg="<table width='60%' border='0' style='border:1px solid #CCC;'>
		<tr>
			<td colspan='2' bgcolor='#00CCFF'>
				<strong>จดหมายจากลูกค้า</strong>
			</td>
		</tr>
		<tr>
		  <td width='78' bgcolor='#A8EEFF' > ชื่อ-สกุล :</td>
		  <td width='433' bgcolor='#FFFFFF' style='border:1px solid #000;'> $name</td>
		</tr>
		
		<tr>
		  <td width='78' bgcolor='#A8EEFF' > เบอร์โทรศัพท์ :</td>
		  <td width='433' bgcolor='#FFFFFF' style='border:1px solid #000;'> $tel</td>
		</tr>
		
		<tr>
		  <td width='78' bgcolor='#A8EEFF' >อีเมลล์ :</td>
		  <td width='433' bgcolor='#FFFFFF' style='border:1px solid #000;'> $email</td>
		</tr>
		
		<tr>
		  <td bgcolor='#A8EEFF' >สูตรอาหารที่สั่งซื้อ :</td>
		  <td bgcolor='#FFFFFF' style='border:1px solid #000;'>
		  		$secret1<br />
				$secret2<br />
				$secret3<br />
				$secret4
		  </td>
		</tr>
		
		<tr>
		  <td bgcolor='#A8EEFF' >สินค้าที่สั่งซื้อ :</td>
		  <td bgcolor='#FFFFFF' style='border:1px solid #000;'>$prod</td>
		</tr>
		
		<tr>
		  <td bgcolor='#A8EEFF' >คำถามหรือข้อเสนออื่น ๆ :</td>
		  <td bgcolor='#FFFFFF' style='border:1px solid #000;'>$detail</td>
		</tr>

		<tr>
		  <td bgcolor='#A8EEFF' >
			วันที่ / เวลา
		  </td>
		  <td bgcolor='#FFFFFF' style='border:1px solid #000;'>".date("d M Y  G:i")."</td>
		</tr>
	  </table>";
	if( strlen($emailto) )
	{
		$subject = "=?utf-8?B?".base64_encode($sub)."?="; //หัวข้อ UTF8
		$header  = "";
		$header .= $ccto;
		$header .= $bccto;
		$header .= "MIME-Version: 1.0\r\n";
		//$header .= "Content-type: text/plain\r\n"; 
		$header .= "Content-type: text/html; charset=utf-8\r\n"; 
		$header .= "Content-Transfer-Encoding: 7bit\r\n"; 
		//$header .= "From:".$fromemail ."\r\n"; //ชื่อและอีเมลผู้ส่งเป็นภาษาไทยไม่ได้
		$header .= "From: $from_admin \r\n"; //ชื่อและอีเมลผู้ส่งเป็นภาษาไทยไม่ได้
		//$header .= "Reply-To: " . $this->emailReplyTo . "\r\n";
		$header .= "X-Mailer: ";
	
		if( mail($emailto,$subject,$msg,$header) )
		{
			//echo "จดหมายถูกส่งเรียบร้อยแล้ว"; //success
			echo "<script language='javascript'>alert('จดหมายถูกส่งเรียบร้อยแล้วค่ะ ขอขอบคุณสำหรับคำติชมค่ะ !');</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=$main_website\" />";
		}
		else
		{
			echo "<script language='javascript'>alert('ไม่สามารถส่งจดหมายได้ค่ะ !');</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=$main_website\" />";
		}
	}
	else
	{
		//echo "ไม่สามารถส่งจดหมายได้"; //error
		echo "<script language='javascript'>alert('ไม่สามารถส่งจดหมายได้ค่ะ !');</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=$main_website\" />";
	}
?>