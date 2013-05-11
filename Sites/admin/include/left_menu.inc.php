<?
	@session_start();
	include_once("connect.php");
?>

	<!-- ระบบจัดการสินค้า -->
	<a class="menuitem submenuheader" href="#" >ระบบจัดการสินค้า</a>
	<div class='submenu'>
		<ul>
            <li><b>บริหารข้อมูลสินค้า</b></li>
            <li><a href='<?=$server_name?>/catalog/cate_add.php'>เพิ่มสินค้า</a></li>
            <li><a href='<?=$server_name?>/catalog/cate_mainedit.php'>แก้ไข/ลบ สินค้า</a></li>
          
             <!--<li><b>บริหารข้อมูลสินค้า</b></li>
            <li><a href='<?=$server_name?>/catalog/prod_add.php'>เพิ่มสินค้า</a></li>
            <li><a href='<?=$server_name?>/catalog/prodmain_edit.php'>แก้ไข/ลบสินค้า</a></li>-->
        
        </ul>
    </div>

    <a class='menuitem submenuheader' href='#'>ระบบจัดการสูตรอาหาร</a>
        <div class='submenu'>
            <ul>
               <li><b>บริหารสูตรอาหาร</b></li>
              <!-- <li><a href='<?=$server_name?>/secret_recipes/secret_add.php'>เพิ่มสูตรอาหาร</a></li>-->
               <li><a href='<?=$server_name?>/secret_recipes/main_edit.php'>เพิ่ม/แก้ไข/ลบ สูตรอาหาร</a></li>
            </ul>
    </div>
    
     <!--  ระบบจัดการแบนเนอร์-->
    <a class='menuitem submenuheader' href='#'>ระบบจัดการแบนเนอร์</a>
        <div class='submenu'>
            <ul>
          		  <li><b>บริหารแบนเนอร์</b></li>
                <li><a href='<?=$server_name?>/banner/banner_add.php'>เพิ่มแบนเนอร์</a></li>
                <li><a href='<?=$server_name?>/banner/banner_mainedit.php'>ลบ แก้ไข แบนเนอร์</a></li>
            </ul>
        </div>		    

	<!-- ออกจากระบบ -->
	<a class='menuitem' href='<?=$server_name?>/include/logout.php'>ออกจากระบบ</a>

