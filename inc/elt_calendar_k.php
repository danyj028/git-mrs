<?php


/*
$day_name=array("Sunday", "Monday","Tuesday", "Wednesday","Thursday","Friday","Saturday");
$day_name_short=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
$month_name=array("January","February","March","April","May","June","July","August","September","October","November","December");
$month_name_short=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
*/

function cal_day_show($f_date)
{
}

function cal_week_show($f_date)
{
}

function cal_month_show($f_month, $f_year)
{

$day_name=array("Sunday", "Monday","Tuesday", "Wednesday","Thursday","Friday","Saturday");
$day_name_short=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");

echo("<table style=\"width:100%; height: 80%; border-style:groove; border-width:3px;border-color:#009900;\">");

	//print header
	echo("<tr style=\"height:50px;\"><td></td>");
		
	for ($w_hr=1; $w_hr<=7; $w_hr++)
	{
		//print <<< endhead
			echo("<td style=\"width:11%; border-width:1px;border-style:none; text-align:center;background:#d3e8b1;\">");
 			echo("<span style=\"font-size:18px;font-weight:bold;color:#009900;\">".$day_name_short[$w_hr-1]."</span>");
 			echo("</td>");
 			
	}
	echo("</tr>");
	
	$w_k = 1;
 	for ($w_row = 1; $w_row <=5; $w_row++)
 	{
 		echo("<tr style=\"border-style:groove;padding:5px;\">");
 		
 		$w_d="cell_".$w_k;
 		
 		for ($w_col = 1; $w_col <= 8; $w_col++)
 		{
 	
			$w_cell = "	
					
 			<td style=\"width:12%; border-width:1px;border-style:solid;text-align:center;\">
 			<div id=".$w_d.">
 			XXX	
 			</div>
 			</td>";
 			
 	print  <<< endc		
 			<script language='javascript'>
 			document.getElementById($w_d) = 'Dada';
 			</script>
endc; 			
							

	
			print($w_cell);
			
			$w_k++;

					
 		}
 		echo("</tr>");
 	}
 	echo("</table>");
 
}

?>