<?php
		function thaidate($en_date)
		{
				$date_m=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค","พ.ย.","ธ.ค.") ;						                $datestr_array =explode(" ",$en_date);
				$date_array =explode("-",$datestr_array[0]);
				$y=$date_array[0];
				$m=$date_array[1]-1;
				$d=$date_array[2];
				$m=$date_m[$m];
				if($y != 0) 
				$y=$y+543;
	
				return "$d $m $y $datestr_array[1]";
			
		}
?>
