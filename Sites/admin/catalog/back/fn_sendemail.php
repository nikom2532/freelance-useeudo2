<!--ถ้าไม่ใส่บรรทัดนี้ จะทำให้แสดงข้อความภาษาไทยแล้ว เป็นอักขระที่อ่านไม่รู้เรื่อง-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?
	class classDaily
	{
		function __construct()
		{
			date_default_timezone_set('Asia/Bangkok');
		}

		function SendEmailHTMLNow($email, $sub, $msg)
		{
			$bccto = "";
			$bccto = "Bcc: $email \r\n";

			$emailto = "Value Customers <pr@rayfashion1.com>"; //อีเมล์ผู้รับ 
			$subject = "=?utf-8?B?".base64_encode($sub)."?="; //หัวข้อ UTF8
			$header  = "";
			$header .= $bccto;
			$header .= "MIME-Version: 1.0\r\n";
//			$header .= "Content-type: text/plain\r\n"; 
			$header .= "Content-type: text/html; charset=utf-8\r\n"; 
			$header .= "Content-Transfer-Encoding: 7bit\r\n"; 
			$header .= "From: pr@rayfashion1.com\r\n"; //ชื่อและอีเมลผู้ส่งเป็นภาษาไทยไม่ได้
			//$header .= "Reply-To: " . $this->emailReplyTo . "\r\n";
			$header .= "X-Mailer: BaanWebsite";
			$messages.= $msg;//ข้อความ 

			if( mail($emailto,$subject,$messages,$header) )
				return 0; //OK
			else
				return 1; //error
		}
	}
	$subject=$_POST[subject];
	$sendto=$_POST[sendto];

	//ประกาศคลาส
	$classDaily = new classDaily();

	//กำหนดหัวข้อ และ อีเมล์ที่ต้องการส่งไป
	//$subject = "โปรโมชั่น";
	//$sendto .= "thanapon@sci-nano.com, rd_thanapon@hotmail.com";
	
	$content .= "<br><br><br>";
	$content .= "<iframe name='baanwebsite' width='100%' height='100%' src='http://www.baanwebsite.com/promotion/'></iframe>
";

	if( $classDaily->SendEmailHTMLNow($sendto, $subject, $content) == 0 )
	{
		echo "<script language='javascript'>alert('ส่งอีเมล์เรียบร้อยแล้วค่ะ');</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=prompage_sendemail.php\" />";

	}
	else
	{
		echo "<script language='javascript'>alert('เกิดความผิดพลาดบางประการเกี่ยวกับการส่งอีเมล์ กรุณาลองใหม่นะคะ');
		javascript:history.back();</script>";
	}
?>