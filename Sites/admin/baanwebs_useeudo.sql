-- phpMyAdmin SQL Dump
-- version 3.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2013 at 04:11 PM
-- Server version: 5.0.91
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `baanwebs_useeudo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_banner`
--

CREATE TABLE IF NOT EXISTS `tb_banner` (
  `id_banner` bigint(10) unsigned zerofill NOT NULL auto_increment,
  `pic_banner` varchar(200) collate utf8_unicode_ci default NULL,
  `ord_bn` varchar(1) collate utf8_unicode_ci default NULL,
  `show_bn` varchar(1) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id_banner`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_banner`
--

INSERT INTO `tb_banner` (`id_banner`, `pic_banner`, `ord_bn`, `show_bn`) VALUES
(0000000004, '9ca4e33c6a7ea3f87b5ef2f1cd1a5583.png', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_catemain`
--

CREATE TABLE IF NOT EXISTS `tb_catemain` (
  `id_cate` bigint(10) unsigned zerofill NOT NULL auto_increment COMMENT 'รหัสหมวดหมู่หลัก',
  `name_cate` varchar(100) character set utf8 collate utf8_unicode_ci default NULL COMMENT 'ชื่อหมวดหมู่หลัก',
  `status_cate` int(1) default NULL,
  `show_cate` int(1) default NULL COMMENT 'ซ่อน =0  ,แสดง = 1',
  `ord_cate` int(1) default NULL COMMENT 'เรียงลำดับ',
  `id_mem` bigint(10) default NULL COMMENT 'ผู้บันทึก',
  `pic_cate` varchar(200) character set utf8 collate utf8_unicode_ci default NULL COMMENT 'รูปหมวดหมู่',
  `detail_cate` longtext character set utf8 collate utf8_unicode_ci,
  `youtube` varchar(200) character set utf8 collate utf8_unicode_ci default NULL,
  `download_pdf` varchar(200) character set utf8 collate utf8_unicode_ci default NULL,
  `more` varchar(200) character set utf8 collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id_cate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tb_catemain`
--

INSERT INTO `tb_catemain` (`id_cate`, `name_cate`, `status_cate`, `show_cate`, `ord_cate`, `id_mem`, `pic_cate`, `detail_cate`, `youtube`, `download_pdf`, `more`) VALUES
(0000000015, 'U-DO 101 (ยู-ดู 101)', 0, 1, 9, 0, '', '<div><span style="font-weight: bold;"><div>ขนาดบรรจุ&nbsp;&nbsp;120g&nbsp;ราคา135 บาท &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;ขนาดบรรจุ&nbsp;&nbsp;500g&nbsp;ราคา&nbsp;235 บาท</div><div><br></div></span></div><div><span style="font-weight: bold;">ลักษณะ</span> : ผงละเอียดสีครีม</div><div>&nbsp;&nbsp;</div><div><span style="font-weight: bold;">ส่วนประกอบ</span> : เป็นวัตถุเจือปนอาหารแบบผสมจากธรรมชาติ ประกอบด้วย สารสกัดผิวเปลือกส้ม โพลีแซคคาไรด์ และสาหร่ายทะเลผสมน้ำตาลผงเพื่อให้ง่ายต่อการนำไปใช้</div><div><br></div><div><span style="font-weight: bold;">ประโยชน์</span> : นำมาใช้ได้หลากหลาย เช่น ทำแยม น้ำจิ้มไก่ ซอส ผสมน้ำผลไม้ ทำเชอร์เบท พุดดิ้ง สังขยา ไอสครีม</div><div><br></div><div><span style="font-weight: bold;">ปริมาณ</span> : 1 ช้อนชา หนักโดยประมาณ &nbsp;3.5 กรัม</div><div><br></div><div><span style="font-weight: bold;">ปริมาณที่นำไปใช้ </span>: &nbsp;ใช้ประมาณ 1-5% ของน้ำหนักรวมของผลิตภัณฑ์ที่จะผลิต ขึ้นอยู่กับว่าต้องการนำไปทำอะไรและเพื่ออะไร</div><div><br></div> 	', '', '', ''),
(0000000016, 'U-DO 201 (ยู-ดู 201)', 0, 1, 10, 0, '', '<div><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;120g&nbsp;</span><span style="font-weight: bold;">ราคา</span><span style="font-weight: bold;">135 บาท &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;</span><span style="font-weight: bold;">500g&nbsp;</span><span style="font-weight: bold;">ราคา&nbsp;</span><span style="font-weight: bold;">235 บาท</span></div><div><span style="font-weight: bold;"><br></span></div><div><span style="font-weight: bold;">ลักษณะ</span> : ผงละเอียดสีน้ำตาลอ่อน&nbsp;</div><div><br></div><div><span style="font-weight: bold;">ส่วนประกอบ</span> : เป็นวัตถุเจือปนอาหารแบบผสมจากธรรมชาติ คือ ใยอาหารจากผิวส้มที่เหลือจากการผลิตน้ำผลไม้และสารสกัดจากผิวส้ม ผสมกับสาหร่ายทะเล</div><div><br></div><div><span style="font-weight: bold;">ประโยชน์</span> : มุ่งเน้นเพิ่มประสิทธิภาพการผลิตและคุณภาพของขนมปังหรือผลิตภัณฑ์คล้ายคลึงกันที่มีแป้งสาลีเป็นส่วนประกอบ &nbsp;ผลิตภัณฑ์ U-DO 201 นำไปใช้ได้ง่ายๆ คือใช้เหมือนการทำงานตามปกติ ทั้งจะลดเวลาการรอให้ขึ้นฟูได้และใช้ยีสต์น้อยลงด้วย &nbsp;ปั้นรูปง่าย เมื่ออบแล้วโครงสร้างจะอยู่ตัว เนื้อภายในจะนุ่ม น้ำหนักเพิ่ม และจะอยู่นานได้โดยไม่ต้องใส่วัตถุกันเสีย&nbsp;</div><div><br></div><div><span style="font-weight: bold;">ปริมาณ</span> : 1 ช้อนชา หนักโดยประมาณ 3.5 กรัม</div><div><br></div><div><span style="font-weight: bold;">ปริมาณที่นำไปใช้ </span>: ประมาณ 0.6-0.8% ของน้ำหนักแป้ง ปรับเปลี่ยนได้ตามแต่เป้าหมาย</div><div><br></div> 	', '', '', ''),
(0000000017, 'U-DO 202 (ยู-ดู 202)', 0, 1, 1, 0, '', '<div><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;120g&nbsp;</span><span style="font-weight: bold;">ราคา</span><span style="font-weight: bold;">135 บาท &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;</span><span style="font-weight: bold;">500g&nbsp;</span><span style="font-weight: bold;">ราคา&nbsp;</span><span style="font-weight: bold;">235 บาท</span></div><div><span style="font-weight: bold;"><br></span></div><div><span style="font-weight: bold;">ลักษณะ</span> : ผงละเอียดสีน้ำตาลอ่อน &nbsp;</div><div><br></div><div><span style="font-weight: bold;">ส่วนประกอบ</span> : เป็นวัตถุเจือปนอาหารแบบผสมจากธรรมชาติ คือ ใยอาหารจากผิวส้มที่เหลือจากการผลิตน้ำผลไม้และสารสกัดจากผิวส้ม ผสมกับสาหร่ายทะเล</div><div><br></div><div><span style="font-weight: bold;">ประโยชน์</span> : มุ่งเน้นเพิ่มประสิทธิภาพการผลิตและคุณภาพของ sponge cake หรือ เค้กที่ต้องการลดเนยลง หรือ ผลิตภัณฑ์คล้ายคลึงกันที่มีแป้งสาลี เช่น ขนมไข่ &nbsp;U-DO 202 ใช้ง่าย เมื่ออบแล้วโครงสร้างจะอยู่ตัว เนื้อภายในจะนุ่ม น้ำหนักเพิ่ม และจะอยู่นานได้โดยไม่ต้องใส่วัตถุกันเสีย&nbsp;</div><div><br></div><div><span style="font-weight: bold;">ปริมาณ</span> : 1 ช้อนชา หนักโดยประมาณ &nbsp;3 กรัม</div><div><br></div><div><span style="font-weight: bold;">ปริมาณที่นำไปใช้</span> : ประมาณ 3% ของน้ำหนักแป้ง ปรับเปลี่ยนได้ตามแต่จัดประสงค์</div><div><br></div> 	', '', '', ''),
(0000000018, 'Herbacel AQ Plus Citrus -F(ใยอาหารจากพืชตระกูลส้ม)', 0, 1, 4, 0, '', '<div><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;120g&nbsp;</span><span style="font-weight: bold;">ราคา</span><span style="font-weight: bold;">135 บาท &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;</span><span style="font-weight: bold;">500g&nbsp;</span><span style="font-weight: bold;">ราคา&nbsp;</span><span style="font-weight: bold;">235 บาท</span></div><div><span style="font-weight: bold;"><br></span></div><div><span style="font-weight: bold;">ลักษณะ</span> : เป็นผงละเอียดสีน้ำตาลอ่อน &nbsp;</div><div><br></div><div><span style="font-weight: bold;">ส่วนประกอบ</span> : เป็นวัตถุเจือปนอาหารแบบเดี่ยวจากธรรมชาติ คือ ใยอาหารจากผิวส้มที่เหลือจากอุตสาหกรรมการผลิตน้ำส้มเข้มข้น</div><div><br></div><div><span style="font-weight: bold;">ประโยชน์</span> : ที่ใช้กันมีหลายประการ ตั้งแต่ จำพวกขนมอบกรอบโดยทำให้กรอบนาน ไม่ร่วงง่าย ทำงานขึ้นรูปง่าย &nbsp;เช่น คุกกี้ บิสคิต ทองม้วน ฯลฯ จำพวกเนื้อสัตว์โดยทำให้ผลิตภัณฑ์ยืดหยุ่นแต่แน่น ทดแทนไขมันและปริมาณเนื้อ เช่น ลูกชิ้น ไส้กรอก salami หมูยอ จำพวกไส้ขนมต่างๆโดยทำให้กวนเสร็จเร็ว เพิ่มเนื้อ เพิ่มรสสัมผัส ทำงานง่าย เช่น ไส้ถั่วต่างๆ ไส้สับปะรดกวน และจำพวกอื่น เช่น &nbsp;น้ำสลัดข้น &nbsp;หรือถ้าตักใส่ในบะหมี่กึ่งสำเร็จรูปก็จะทำให้อร่อยขึ้นและเป็นการเพิ่มใยอาหารเป็นประโยชน์ต่อระบบทางเดินอาหาร&nbsp;</div><div><br></div><div><span style="font-weight: bold;">ปริมาณ</span> : 1 ช้อนชา หนักโดยประมาณ &nbsp;3 &nbsp;กรัม</div><div><br></div><div><span style="font-weight: bold;">ปริมาณที่นำไปใช้</span> : ปรับเปลี่ยนตามการใช้งาน</div><div><br></div> 	', '', '', ''),
(0000000019, 'Carrageenan Foodgel (คาราจีแนนฟู้ดเจล/สารสกัดจากสาหร่าย)', 0, 1, 11, 0, '', '<div><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;120g&nbsp;</span><span style="font-weight: bold;">ราคา</span><span style="font-weight: bold;">135 บาท &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;</span><span style="font-weight: bold;">500g&nbsp;</span><span style="font-weight: bold;">ราคา&nbsp;</span><span style="font-weight: bold;">235 บาท</span></div><div><span style="font-weight: bold;"><br></span></div><div><span style="font-weight: bold;">ลักษณะ</span> : ผงละเอียดสีน้ำตาลอ่อน</div><div><br></div><div><span style="font-weight: bold;">ส่วนประกอบ</span> : เป็นวัตถุเจือปนอาหารได้จากสาหร่ายทะเลที่มีการละลายน้ำดี&nbsp;</div><div><br></div><div><span style="font-weight: bold;">ประโยชน์</span> : ช่วยทำให้เกิดโครงสร้างในอาหารให้จับกันดีขึ้น เช่น เยลลี่คัพ ช่วยให้เนื้อจับตัวดี เช่น ในแฮม ไส้กรอก ช่วยทำให้ซุบข้นขึ้น ซอยและเครื่องดื่มต่างๆ</div><div><br></div><div><span style="font-weight: bold;">ปริมาณ </span>: &nbsp;1 ช้อนชาหนักโดยประมาณ &nbsp;4.15 กรัม</div><div><br></div><div><span style="font-weight: bold;">ปริมาณที่นำไปใช้</span> : ปรับเปลี่ยนตามการใช้งาน</div> 	', '', '', ''),
(0000000020, 'Nanophos SN-D3E (สารผสมของเกลือฟอสเฟต)', 0, 1, 6, 0, '', '<div><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;120g&nbsp;</span><span style="font-weight: bold;">ราคา</span><span style="font-weight: bold;">135 บาท &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;</span><span style="font-weight: bold;">500g&nbsp;</span><span style="font-weight: bold;">ราคา&nbsp;</span><span style="font-weight: bold;">235 บาท</span></div><div><span style="font-weight: bold;"><br></span></div><div><span style="font-weight: bold;">ลักษณะ </span>: เป็นผงหยาบสีขาว &nbsp;</div><div><br></div><div><span style="font-weight: bold;">ส่วนประกอบ</span> : เป็นวัตถุเจือปนอาหารแบบผสมโดยการนำเกลือฟอสเฟตชนิดต่างๆมาผสมกัน &nbsp;เมื่อใช้ผลิตภัณฑ์เนื้อเกิดเป็นโครงสร้างที่อุ้มน้ำได้ดี (protein-phosphate-salt complexes)</div><div><br></div><div><span style="font-weight: bold;">ประโยชน์</span> : ใช้เพื่อให้เนื้อกุ้งจากตลาดที่ซื้อมาแล้วเมื่อนำไปประกอบอาหารเนื้อจะยุ่ยเปื่อย ฟอสเฟตก็จะช่วยทำให้กุ้งกลับกลายเป็นนุ่มกรอบ เนื้อไม่ยุ่ย ผลัพธืที่ออกมาจะเหมือนกุ้งในภัตตาคารหรือร้านอาหารหรู &nbsp;</div><div><br></div><div><span style="font-weight: bold;">ปริมาณ</span> : 1 ช้อนชา หนักโดยประมาณ &nbsp;4 กรัม</div><div><br></div><div><span style="font-weight: bold;">ปริมาณที่นำไปใช้</span> : นำ Nanophos SN-D3E 3-4% ละลายในน้ำเมื่อละลายแล้วผสมเกลือเล็กน้อย จากนั้นนำกุ้งที่ปอกเปลือกแล้ว มาแช่ในน้ำนี้ ในอัตราส่วน กุ้ง 1 ส่วน ต่อน้ำที่ละลายเสร็จแล้ว 1 ¼ ส่วน แช่ประมาณ 1-3 ชั่วโมง คนเป็นระยะประมาณทุก 20-30 นาที แล้วเทอกบนกระชอนให้สะเด็ดน้ำ แล้วนำไปทำอาหารหรือแช่เข็งในตู้เย็น</div> 	', '', '', ''),
(0000000021, 'Calcium carbonate (แคลเซี่ยมคาร์บอเนต) ', 0, 1, 2, 0, '', '<div><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;120g&nbsp;</span><span style="font-weight: bold;">ราคา</span><span style="font-weight: bold;">135 บาท &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;</span><span style="font-weight: bold;">500g&nbsp;</span><span style="font-weight: bold;">ราคา&nbsp;</span><span style="font-weight: bold;">235 บาท</span></div><div><span style="font-weight: bold;"><br></span></div><div><span style="font-weight: bold;">ลักษณะ</span> : ผงละเอียดสีขาว</div><div>&nbsp;&nbsp;</div><div><span style="font-weight: bold;">ส่วนประกอบ</span> : เป็นเกลือชนิดหนึ่งของแคลเซียม</div><div>&nbsp;</div><div><span style="font-weight: bold;">ประโยชน์</span> : ใช้เสริมแคลเซียมสำหรับผู้ที่ได้รับแคลเซียมจากอาหารที่รับประทานตาม ปกติไม่เพียงพอ หรือผู้ที่มีความต้องการแคลเซียมเพิ่มขึ้น และใช้ป้องกันหรือรักษาภาวะต่าง ๆ ที่ทำให้ระดับแคลเซียมในเลือดต่ำ แคลเซียมคาร์บอเนตมีฤทธิ์เป็นด่างและสามารถลดความเป็นกรดในกระเพาะ สตรีมีครรภ์, ผู้ให้นมบุตร, เด็ก และวัยรุ่นอาจต้องการแคลเซียมมากกว่าที่ได้รับจากอาหารตามปกติ ผู้หญิงวัยหมดประจำเดือนอาจได้รับแคลเซียมเสริมเพื่อป้องกันภาวะกระดูกพรุน (Osteoporosis) ซึ่งทำให้กระดูกหักได้ง่าย ภาวะกระดูกพรุนในผู้หญิงที่หมดประจำเดือนเกิดจากปริมาณฮอร์โมนเอสโทรเจนที่ รังไข่ผลิตได้น้อยลงและทำให้กระดูกบางลง อย่างไรก็ตามการรับประทานอาหารที่มีแคลเซียมต่ำในวัยเด็กและวัยรุ่นยิ่งเพิ่มความเสี่ยงในการทำให้เกิดภาวะกระดูกพรุนได้มากขึ้น</div><div>&nbsp;</div><div><span style="font-weight: bold;">ปริมาณ</span> : 1 ช้อนชา หนักโดยประมาณ &nbsp;2.2 กรัม (= แคลเซี่ยม 880 มิลลิกรัม) ขนาดของแคลเซียมต้องพิจารณาตามปริมาณแคลเซียมที่มีอยู่ในแคลเซียม คาร์บอเนต โดยแคลเซียมคาร์บอเนต 100 กรัมมีปริมาณแคลเซียม 40 กรัม&nbsp;</div><div><br></div><div><span style="font-weight: bold;">ปริมาณที่นำไปใช้ </span>: ปริมาณตามกำหนดของ อ.ย.คือ รับประทานแคลเซี่ยมวันละไม่เกิน 800 มิลลิกรัม หรือเท่ากับแคลเซี่ยมคาร์บอเนต วันละไม่เกิน &nbsp;2 กรัม</div> 	', '', '', ''),
(0000000022, 'Potassium sorbate (โปตัสเซี่ยมซอร์เบท)', 0, 1, 8, 0, '', '<div><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;120g&nbsp;</span><span style="font-weight: bold;">ราคา</span><span style="font-weight: bold;">135 บาท &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;</span><span style="font-weight: bold;">500g&nbsp;</span><span style="font-weight: bold;">ราคา&nbsp;</span><span style="font-weight: bold;">235 บาท</span></div><div><span style="font-weight: bold;"><br></span></div><div><span style="font-weight: bold;">ลักษณะ</span> : ผงเป็นเม็ดละเอียดสีขาวนวล&nbsp;</div><div><br></div><div><span style="font-weight: bold;">ส่วนประกอบ</span> : เป็นวัตถุเจือปนอาหารที่ปลอดภัยที่สุดตัวหนึ่งและนิยมใช้กันอย่างแพร่หลาย ใช้กันทั้งอุตสาหรรมอาหาร ยา และเครื่องสำอาง ได้จากการสังเคราะห์</div><div><br></div><div><span style="font-weight: bold;">ประโยชน์</span> : ใช้ถนอมอาหาร</div><div><br></div><div><span style="font-weight: bold;">ปริมาณ</span> : &nbsp;1 ช้อนชาหนักโดยประมาณ &nbsp;2.5 กรัม</div><div><br></div><div><span style="font-weight: bold;">ปริมาณที่นำไปใช้</span> : ขึ้นอยู่กับชนิดของอาหารที่ต้องการถนอม โดยประมาณ 0.025-0.1%</div> 	', '', '', ''),
(0000000023, 'Citric acid, mono hydrate (ซิติกแอซิด/กรดมะนาว)', 0, 1, 3, 0, '', '<div><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;120g&nbsp;</span><span style="font-weight: bold;">ราคา</span><span style="font-weight: bold;">130 บาท &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;</span><span style="font-weight: bold;">400g&nbsp;</span><span style="font-weight: bold;">ราคา&nbsp;</span><span style="font-weight: bold;">400 บาท</span></div><div><span style="font-weight: bold;"><br></span></div><div><span style="font-weight: bold;">ลักษณะ</span> : ผงผลึกละเอียดสีขาว</div><div>&nbsp;</div><div><span style="font-weight: bold;">ส่วนประกอบ</span> : เป็นวัตถุเจือปนอาหารที่ปลอดภัยที่สุดตัวหนึ่งและนิยมใช้กันอย่างแพร่หลาย ใช้กันทั้งอุตสาหรรมอาหาร ยา และเครื่องสำอาง สารนี้มีมากในพืชที่ให้รสเปรี้ยว เช่น มะนาว ปัจจุบันผลิตจากการหมักกากน้ำตาล</div><div><br></div><div><span style="font-weight: bold;">ประโยชน์</span> : ให้ความเปรี้ยว, ปรับความเป็นกรด-ด่าง</div><div><br></div><div><span style="font-weight: bold;">ปริมาณ</span> : &nbsp;1 ช้อนชาหนักโดยประมาณ &nbsp;6 กรัม&nbsp;</div><div><br></div><div><span style="font-weight: bold;">ปริมาณที่นำไปใช้ </span>: ขึ้นอยู่กับความต้องการ</div> 	', '', '', ''),
(0000000024, 'Malic acid (มาลิกแอซิด/กรดแอบเปิ้ล)', 0, 1, 5, 0, '', '<div><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;120g&nbsp;</span><span style="font-weight: bold;">ราคา</span><span style="font-weight: bold;">135 บาท &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="font-weight: bold;">ขนาดบรรจุ&nbsp;</span><span style="font-weight: bold;">&nbsp;</span><span style="font-weight: bold;">500g&nbsp;</span><span style="font-weight: bold;">ราคา&nbsp;</span><span style="font-weight: bold;">235 บาท</span></div><div><span style="font-weight: bold;"><br></span></div><div><span style="font-weight: bold;">ลักษณะ</span> : ผงผลึกละเอียดเป็นผงสีขาวนวล</div><div><br></div><div><span style="font-weight: bold;">ส่วนประกอบ</span> : เป็นวัตถุเจือปนอาหารที่ปลอดภัยที่สุดตัวหนึ่งและนิยมใช้กันอย่างแพร่หลาย ใช้กันทั้งอุตสาหรรมอาหาร ยา และเครื่องสำอาง เดิมแยกออกมาได้จากน้ำแอบเปิ้ล ค.ศ.1785 &nbsp;ปัจจุบันใช้การสังเคราะห์&nbsp;</div><div><br></div><div><span style="font-weight: bold;">ประโยชน์</span> : ให้ความเปรี้ยว, ปรับความเป็นกรด-ด่าง</div><div><br></div><div><span style="font-weight: bold;">ปริมาณ</span> : &nbsp;1 ช้อนชาหนักโดยประมาณ &nbsp;5.25 กรัม</div><div><br></div><div><span style="font-weight: bold;">ปริมาณที่นำไปใช้</span> : ขึ้นอยู่กับความต้องการ</div> 	', '', '', ''),
(0000000026, 'Pectin Amid CF 020 (เพคตินเอมิดซีเอฟ 020)', 0, 1, 0, 0, '', ' 	', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_catesecret`
--

CREATE TABLE IF NOT EXISTS `tb_catesecret` (
  `id_cate` bigint(10) unsigned zerofill NOT NULL auto_increment COMMENT 'รหัสหมวดหมู่หลัก',
  `name_cate` varchar(100) character set utf8 collate utf8_unicode_ci default NULL COMMENT 'ชื่อหมวดหมู่หลัก',
  `status_cate` int(1) default NULL,
  `show_cate` int(1) default NULL COMMENT 'ซ่อน =0  ,แสดง = 1',
  `ord_cate` int(1) default NULL COMMENT 'เรียงลำดับ',
  `id_mem` bigint(10) default NULL COMMENT 'ผู้บันทึก',
  `pic_cate` varchar(200) character set utf8 collate utf8_unicode_ci default NULL COMMENT 'รูปหมวดหมู่',
  `detail_cate` longtext character set utf8 collate utf8_unicode_ci,
  `youtube` varchar(200) character set utf8 collate utf8_unicode_ci default NULL,
  `download_pdf` varchar(200) character set utf8 collate utf8_unicode_ci default NULL,
  `more` varchar(200) character set utf8 collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id_cate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_catesecret`
--

INSERT INTO `tb_catesecret` (`id_cate`, `name_cate`, `status_cate`, `show_cate`, `ord_cate`, `id_mem`, `pic_cate`, `detail_cate`, `youtube`, `download_pdf`, `more`) VALUES
(0000000001, 'ผลิตภัณฑ์จากผลไม้', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(0000000002, 'ผลิตภัณฑ์จากแป้ง', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(0000000003, 'ของหวานเทศและของหวานไทย', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(0000000004, 'ผลิตภัณฑ์จากเนื้อสัตว์และอื่นๆ', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_catesecretsub1`
--

CREATE TABLE IF NOT EXISTS `tb_catesecretsub1` (
  `id_cate` int(5) unsigned zerofill NOT NULL auto_increment,
  `name_cate` varchar(100) character set utf8 collate utf8_unicode_ci default NULL COMMENT 'ชื่อหมวดหมู่ย่อย1',
  `mainid_cate` bigint(10) default NULL COMMENT 'รหัสหมวดหมู่หลัก',
  `id_mem` bigint(10) default NULL COMMENT 'ผู้บันทึก',
  `brand_cate` bigint(3) default NULL,
  `youtube` varchar(200) character set utf8 collate utf8_unicode_ci default NULL,
  `pic_cate` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL COMMENT 'รูปหมวดหมู่ย่อย1',
  PRIMARY KEY  (`id_cate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tb_catesecretsub1`
--

INSERT INTO `tb_catesecretsub1` (`id_cate`, `name_cate`, `mainid_cate`, `id_mem`, `brand_cate`, `youtube`, `pic_cate`) VALUES
(00012, 'ขนมปังสุขภาพ ', 2, 1, 0, 'IcJAvhhruT8', ''),
(00007, 'แยมมะม่วงดิบ น้ำตาลน้อย', 1, 1, 0, 'g2Z0G-JFVVY', ''),
(00008, 'แยมผิวส้ม น้ำตาลน้อย', 1, 1, 0, 'MRc_zlwE-AE', ''),
(00009, 'ท็อปปิ้ง ปลูเบอร์รี่', 1, 1, 0, 'dnronSypI0g', ''),
(00010, 'แยมมะนาว น้ำตาลน้อย', 1, 1, 0, 'h7Nom8PRceE', ''),
(00011, 'แยมสตรอเบอร์รี่ น้ำตาลน้อย', 1, 1, 0, '-eY-Te4POmU', ''),
(00013, 'ขนมปังหวานไส่ไส้ ', 2, 1, 0, 'rXdE0Cy0zYM', ''),
(00014, 'เค้กเนย,ไขมันต่ำ ', 2, 1, 0, 'vKdjFHwK14k', ''),
(00015, 'เค้กฟองน้ำ,เนื้อนุ่มไม่แห้ง  ', 2, 1, 0, '620qyiQYQiY', ''),
(00016, 'หมั่นโถว ซาลาเปา ', 2, 1, 0, 'HVDBbmsuvzM', ''),
(00017, 'สังขยา ใช้ทาหรือจิ้มกับขนมปัง', 3, 1, 0, '-yyQVSn_wvs', ''),
(00018, 'ขนมหม้อแกงเผือก', 3, 1, 0, 't7mh2t04tsY', ''),
(00019, 'พุดดิ้ง คัสตาร์ด ', 3, 1, 0, 'f8nDcCkNSy4', ''),
(00020, 'ซอสหมักเนื้อหมู', 4, 1, 0, 'XeV-h7oODGY', ''),
(00021, 'กุ้งเนื้อแน่น', 4, 1, 0, 'FDMgccBjpwc', ''),
(00022, 'น้ำจิ้มไก่-น้ำสลัดใส สุขภาพ', 4, 1, 0, 'c2EaTDYRhco', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_catesecretsub2`
--

CREATE TABLE IF NOT EXISTS `tb_catesecretsub2` (
  `id_cate` bigint(10) unsigned zerofill NOT NULL auto_increment,
  `name_cate` varchar(100) character set utf8 collate utf8_unicode_ci default NULL,
  `subid_cate` bigint(10) default NULL,
  `id_mem` bigint(10) default NULL,
  PRIMARY KEY  (`id_cate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_catesub1`
--

CREATE TABLE IF NOT EXISTS `tb_catesub1` (
  `id_cate` bigint(1) unsigned zerofill NOT NULL auto_increment,
  `name_cate` varchar(100) character set utf8 collate utf8_unicode_ci default NULL COMMENT 'ชื่อหมวดหมู่ย่อย1',
  `mainid_cate` bigint(10) default NULL COMMENT 'รหัสหมวดหมู่หลัก',
  `id_mem` bigint(10) default NULL COMMENT 'ผู้บันทึก',
  `brand_cate` bigint(3) default NULL,
  `pic_cate` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL COMMENT 'รูปหมวดหมู่ย่อย1',
  PRIMARY KEY  (`id_cate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_catesub2`
--

CREATE TABLE IF NOT EXISTS `tb_catesub2` (
  `id_cate` bigint(10) unsigned zerofill NOT NULL auto_increment,
  `name_cate` varchar(100) character set utf8 collate utf8_unicode_ci default NULL,
  `subid_cate` bigint(10) default NULL,
  `id_mem` bigint(10) default NULL,
  PRIMARY KEY  (`id_cate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pdstatus`
--

CREATE TABLE IF NOT EXISTS `tb_pdstatus` (
  `id_ps` int(2) unsigned zerofill NOT NULL auto_increment COMMENT 'รหัสสถานะ',
  `name_ps` varchar(200) collate utf8_unicode_ci default NULL COMMENT 'ชื่อสถานะ',
  `pic_ps` varchar(200) collate utf8_unicode_ci default NULL COMMENT 'รูปสถานะ',
  PRIMARY KEY  (`id_ps`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE IF NOT EXISTS `tb_product` (
  `id_pd` bigint(10) unsigned zerofill NOT NULL auto_increment,
  `code_pd` varchar(200) character set utf8 collate utf8_unicode_ci default NULL COMMENT 'รหัสสินค้า',
  `sort_pd` bigint(10) default NULL COMMENT 'เรียงลำดับ',
  `brand_pd` int(2) default NULL,
  `name_pd` varchar(250) character set utf8 collate utf8_unicode_ci default NULL COMMENT 'ชื่อสินค้า',
  `show_pd` int(1) default NULL COMMENT '0=ซ่อน , 1 = แสดง',
  `statusid_pd` int(2) default NULL COMMENT 'รหัสสถานะ',
  `catemainid_pd` text character set utf8 collate utf8_unicode_ci COMMENT 'รหัสหมวดหมู่หลัก',
  `catesub1id_pd` text character set utf8 collate utf8_unicode_ci,
  `catesub2id_pd` text character set utf8 collate utf8_unicode_ci,
  `titleshort_pd` varchar(250) character set utf8 collate utf8_unicode_ci default NULL COMMENT 'รายละเอียดย่อ',
  `property_pd` longtext character set utf8 collate utf8_unicode_ci COMMENT 'คุณสมบัติสินค้า',
  `detail_pd` longtext character set utf8 collate utf8_unicode_ci COMMENT 'รายละเอียด ส.ค.',
  `price_pd` float default NULL COMMENT 'ราคา',
  `pic1_pd` varchar(200) character set utf8 collate utf8_unicode_ci default NULL COMMENT 'รูปหลัก',
  `pic2_pd` varchar(200) character set utf8 collate utf8_unicode_ci default NULL,
  `pic3_pd` varchar(200) character set utf8 collate utf8_unicode_ci default NULL,
  `pic4_pd` varchar(200) character set utf8 collate utf8_unicode_ci default NULL,
  `pic5_pd` varchar(200) character set utf8 collate utf8_unicode_ci default NULL,
  `download_pd` varchar(200) character set utf8 collate utf8_unicode_ci default NULL COMMENT 'ชื่อเอกสารดาวน์โหลด',
  `id_mem` bigint(10) default NULL COMMENT 'ผู้บันทึก',
  PRIMARY KEY  (`id_pd`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_secret_recipes`
--

CREATE TABLE IF NOT EXISTS `tb_secret_recipes` (
  `id_pm` bigint(10) NOT NULL auto_increment,
  `title_pm` varchar(200) collate utf8_unicode_ci default NULL,
  `pic_pm` varchar(200) collate utf8_unicode_ci default NULL,
  `pic2_pm` varchar(200) collate utf8_unicode_ci default NULL,
  `pic3_pm` varchar(200) collate utf8_unicode_ci default NULL,
  `detail_pm` text collate utf8_unicode_ci,
  `show_pm` int(1) default NULL,
  `show_idx` int(1) NOT NULL COMMENT 'ซ่อน/แสดงหน้าแรก',
  `download_pm` varchar(200) collate utf8_unicode_ci default NULL,
  `id_mem` bigint(10) default NULL,
  PRIMARY KEY  (`id_pm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
