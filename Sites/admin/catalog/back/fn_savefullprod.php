<?	
	@session_start();
?>

<!--ถ้าไม่ใส่บรรทัดนี้ จะทำให้แสดงข้อความภาษาไทยแล้ว เป็นอักขระที่อ่านไม่รู้เรื่อง-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?
	$id_mem = $_SESSION[sess_idmem];

	$edit_id=$_POST["edit_id"];
	$name=$_POST["name_prod"];
	$code=$_POST["code_prod"];
	$mainid=$_POST["main_cate"];
	$sub1id=$_POST["sub1_cate"];
	$sub2id=$_POST["sub2_cate"];
	$title_short=$_POST["title_short"];
	/*$keyword1=$_POST["keyword1"];
	$keyword2=$_POST["keyword2"];
	$keyword3=$_POST["keyword3"];
	$keyword4=$_POST["keyword4"];
	$keyword5=$_POST["keyword5"];*/
	$price=$_POST["price"];
	//$shipcost=$_POST["shipcost"];
	//$stock=$_POST["stock"];
	$inpContent=$_POST["inpContent"];
	$inpContent2=$_POST["inpContent2"];

	//update file
	$dosave = 0;
	for( $x=0 ; $x < 1 ; $x++ )
	{
		$fileid = $x+1;
		$newfile = sprintf("file_array%d", ($x+1));
		if( $_FILES[$newfile]['name'] != '' )
		{
			$fileidArr[$x] = $fileid;
			$filenameArr[$x] = $_FILES[$newfile]['name'];
			$filecontentArr[$x] = $_FILES[$newfile]['tmp_name'];
			$dosave = 1;
		}
	}
	$docsave = 0;
		for( $i=0 ; $i < 1 ; $i++ )
		{
			$docfileid = $i+1;
			$docnewfile = sprintf("file_arrayload%d", ($i+1));
			if( $_FILES[$docnewfile]['name'] != '' )
			{
				$docfileidArr[$i] = $docfileid;
				$docfilenameArr[$i] = $_FILES[$docnewfile]['name'];
				$docfilecontentArr[$i] = $_FILES[$docnewfile]['tmp_name'];
				$docsave = 1;
			}
		}
	$name = urldecode($name);

	//ตัด \r\n
	$needcut = array("\r\n", "\n", "\r");
	$inpContent = str_replace($needcut, "", $inpContent);

	include ("../include/connect.php");
	mysql_query("SET NAMES UTF8");
	mysql_select_db($dbname, $cn);

	$err = 0;

	//get lastest row
	$lastid = $edit_id;

	$sql = "update tb_product set";
	$sql .= " code_pd='$code',";
	$sql .= " name_pd='$name',";
	$sql .= " show_pd='1',";
	/*$sql .= " statusid_pd='0',";*/
	$sql .= " property_pd='$inpContent',";
	$sql .= " detail_pd='$inpContent2',";
	$sql .= " titleshort_pd='$title_short',";
	$sql .= " price_pd='$price',";
/*	$sql .= " shipcost_pd='$shipcost',";
	$sql .= " keyword1_pd='$keyword1',";
	$sql .= " keyword2_pd='$keyword2',";
	$sql .= " keyword3_pd='$keyword3',";
	$sql .= " keyword4_pd='$keyword4',";
	$sql .= " keyword5_pd='$keyword5',";
*/
	$sql .= " catemainid_pd='$mainid',";
	$sql .= " catesub1id_pd='$sub1id',";
	$sql .= " catesub2id_pd='$sub2id'"; //สุดท้าย
	$sql .= " where id_pd ='$lastid' ";
	
	$picarr[0]="pic1_pd" ;
	$picarr[1]="pic2_pd" ;
	$picarr[2]="pic3_pd" ;
	$picarr[3]="pic4_pd" ;
	$picarr[4]="pic5_pd" ;

	if( mysql_db_query($dbname,$sql) == false )
		$err = 1;

	if( $dosave == 1 )
	{
			for( $x=0 ; $x < 1 ; $x++ )
			{
				$id = $fileidArr[$x];
				$file_data = "";
		
				if($filecontentArr[$x] != '')
				{
					$ext = pathinfo($filenameArr[$x], PATHINFO_EXTENSION);
					$ext=strtolower($ext);
					$newFileName = md5($filecontentArr[$x].date("d-m-Y H:i:s")).'.'.$ext;
					
					if( move_uploaded_file($filecontentArr[$x], "../../album/$productfolder/$newFileName") == TRUE )
					{
						//อ่านชื่อไฟล์เก่า ถ้าไม่ตรงกันจึงลบ
						$sql = "SELECT * FROM tb_product WHERE id_pd='$edit_id'";
						$result = mysql_db_query($dbname,$sql);
						if($result && $r= mysql_fetch_array($result))
						{
							$filename_album 	= $r[$picarr[$x]];
							if( $filename_album != '' )
							{
								if( stristr($newFileName, $filename_album) == FALSE )
								{
									$oldfile = "../../album/$productfolder/$largefolder/$filename_album";
									//echo $oldfile;
									if( file_exists($oldfile)==TRUE )
										unlink($oldfile);
										
									$oldfile2 = "../../album/$productfolder/$smallfolder/$filename_album";
									//echo $oldfile;
									if( file_exists($oldfile2)==TRUE )
										unlink($oldfile2);	
										
										
								}
							}
						}
		
						$img= "../../album/$productfolder/$newFileName";
						$new_img= "../../album/$productfolder/small/$newFileName";
						$new_largeimg = "../../album/$productfolder/large/$newFileName";
						
						$imgsmall = resize($img,$new_img,'180',$ext);
						$imglarge = resize($img,$new_largeimg,'600',$ext) ;
					
						if ( $imglarge== true && $imgsmall == true)
						{

							switch( $x )
							{
								case 0;
									$sql = "update tb_product set pic1_pd ='$newFileName' where id_pd ='$lastid' ";						
									break;	
								case 1;
									$sql = "update tb_product set pic2_pd ='$newFileName' where id_pd ='$lastid' ";						
									break;		
								case 2;
									$sql = "update tb_product set pic3_pd ='$newFileName' where id_pd ='$lastid' ";						
									break;	
								case 3;
									$sql = "update tb_product set pic4_pd ='$newFileName' where id_pd ='$lastid' ";						
									break;	
								case 4;
									$sql = "update tb_product set pic5_pd ='$newFileName' where id_pd ='$lastid' ";						
									break;	
								case 5;
									$sql = "update tb_product set pic6_pd ='$newFileName' where id_pd ='$lastid' ";						
									break;	
								case 6;
									$sql = "update tb_product set pic7_pd ='$newFileName' where id_pd ='$lastid' ";						
									break;	
									
							}
							if( mysql_db_query($dbname,$sql) == false )
								$err = 1;	

							//ลบ buffer
							$bufferfile = "$img";
							if( file_exists($bufferfile)==TRUE )
								unlink($bufferfile);			
						}
					}
				}
			}
			
	}
	
	//file เอกสารประกอบสินค้า
			if( $docsave == 1 )
		{
			
			for( $i=0 ; $i < 1 ; $i++ )
			{
				$id = $docfileidArr[$i] ;
				$file_data = "";
		
				if($docfilecontentArr[$i] != '')
				{
					
					$ext = pathinfo($docfilenameArr[$i], PATHINFO_EXTENSION);
					$ext=strtolower($ext);
					$docnewFileName = md5($docfilecontentArr[$i].date("d-m-Y H:i:s")).'.'.$ext;
					if($ext == "pdf") //ตรวจสอบนามสกุล
					{
						if( move_uploaded_file($docfilecontentArr[$i], "../../album/$downloadfolder/$docnewFileName") == TRUE )
						{
							//อ่านชื่อไฟล์เก่า ถ้าไม่ตรงกันจึงลบ
							$sql = "SELECT * FROM  tb_product WHERE id_pd='$lastid '";
							$result = mysql_db_query($dbname,$sql);
							if($result && $r= mysql_fetch_array($result))
							{
								$filename_album 	= $r[download_pd];
								if( $filename_album != '' )
								{
									if( stristr($docnewFileName, $filename_album) == FALSE )
									{
										$oldfile = "../../album/$downloadfolder/$filename_album";
										//echo $oldfile;
										if( file_exists($oldfile)==TRUE )
											unlink($oldfile);
									}
								}
							}
						}
						$sql = "update tb_product set download_pd ='$docnewFileName' where id_pd ='$lastid' ";						
							
						if( mysql_db_query($dbname,$sql) == false )
							$err = 2;				
					}
				}
			}
	}
	
	
	
	//respond
	if( $err == 1 )
	{
		echo "<script language='javascript'>alert('เกิดความผิดพลาดบางประการเกี่ยวกับการบันทึกลงฐานข้อมูล');
		javascript:history.back();</script>";
	}
	else
	{
		echo "<script language='javascript'>alert('บันทึกลงฐานข้อมูลเรียบร้อยแล้วค่ะ');</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=prod_edit.php?id=$edit_id\" />";
	}
	
	function resize($images , $new_images , $width ,$ext)
	{
		               $re_value= false;
						$size=GetimageSize($images);
						$height=round($width*$size[1]/$size[0]);
						//$images_orig = ImageCreateFromJPEG($images);
						
					    $valid_exts = array("jpg","jpeg","gif","png");
						
						// Check not larger than 3.75Mb.
						if($filesizeArr[$x] <= 3936256 )
						{
							
						   // ตรวจสอบนามสกุล
							if(in_array($ext,$valid_exts))
							{
								
								if($ext == "jpg" || $ext == "jpeg")
								{
								$images_orig =ImageCreateFromJPEG($images);
								}
								else if($ext == "gif")
								{
								$images_orig = ImageCreateFromGIF($images);
								}
								else if($ext == "png")
								{
								$images_orig = ImageCreateFromPNG($images);
								}
								
								$photoX = ImagesX($images_orig);
								$photoY = ImagesY($images_orig);
								$images_fin = ImageCreateTrueColor($width, $height);
								ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
								ImageJPEG($images_fin,$new_images);
								ImageDestroy($images_orig);
								ImageDestroy($images_fin);	
								
								$re_value = true;
					         }
				     }
					 
					 return  $re_value;
	}
?>