<?php
//$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 $mesesn = array("1","2","3","4","5","6","7","8","9","10","11","12");
//echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
//Salida: Viernes 24 de Febrero del 2012
 
?>

<!-- INICIO Prueba calendario-->


	<div id='calendar'></div>

<!-- FIN Prueba calendario-->



<?php
	$day=1;
	$month=$meses[date('n')-1];
	$monthn=$mesesn[date('m')-1];
	#$month=$_REQUEST['m'];
	#$year=$_REQUEST['y'];
	$year=date('Y');
	
	$nextMonth=$month+1;
	$previousMonth=$mesesn[date('m')-1]-1;
	
	$lastDate=mktime(23, 59, 59, $monthn+1, 0, $year);
	$lastDateInfo=getdate($lastDate);
	


	#get the day of the week of first day of the month::::
	if(isset($_GET['time']))
		$time = $_GET['time'];
	else
		$time = time();
	$current_month = date("n", $time);
	$current_year = date("Y", $time);

	$first_day_of_month = mktime(0,0,0,$current_month,0,$current_year);
	//geting Numeric representation of the day of the week for first day of the month. 0 (for Sunday) through 6 (for Saturday).
	$first_w_of_month = date("w", $first_day_of_month);


	#mktime ( hour, minute, second, month, day, year, is_dst)
	$date = mktime(0,0,0,$monthn,1,$year);
	$dateInfo = getdate($date);
	#numeric value of DOW $dayofweek = $dateInfo['wday']; 

	//////

	$next_month = mktime(0,0,0,$current_month+1,1,$current_year);
	$next_month_text = date("F \'y", $next_month);
	$mesespnext=$meses[date("n", $time)];

	$previous_month = mktime(0,0,0,$current_month-1,1,$current_year);
	$previous_month_text = date("F \'y", $previous_month);

	$next_year = mktime(0,0,0,$current_month,1,$current_year+1);
	$next_year_text = date("F \'y", $next_year);

	$previous_year = mktime(0,0,0,$current_month,1,$current_year-1);
	$previous_year_text = date("F \'y", $previous_year);
	//////
?>
	
	<h1>

</h1>
<?php
	//////
	
	echo "<table class='head'><tr><td><h1 align=left>".$meses[date('n')-1]. " ".$year."</h2></td></tr>";
	echo "<tr><td><p><a href='index.php?&sec=tareas&view=listar-calendario?y=$year&m=$previousMonth'> &lt;&lt;Prev</a></p></td>";
	echo "<td class='next'><p align=right><a href='index.php?&sec=tareas&view=listar-calendario?y=$year&m=$mesespnext'>Next>></a></p></td></tr>";
	echo "<table class=cal>";
	echo "<tr class='first_row'><td>Lunes</td><td>Martes</td><td>Miércoles</td><td>Jueves</td><td>Viernes</td><td>Sábado</td><td>Domingo</td></tr>";
	$counter=0;
	print "<tr>";
	while ($day <=$lastDateInfo['mday'])
	{
  	
	#AS long as $counter < $dayofweek ,display blank cells
  		while ($counter < $first_w_of_month)
		{  
    		print "<td>&nbsp;</td>";
    		$counter++;
  		}
			
  	#print the cells with dates
  	print "<td><b>$day </b>"; 
		#getSchedule($day, $month, $year);
	print"</td>";
  	
	$day++;
  	$counter++;
	if (($counter % 7) == 0) 
    	print "</tr><tr>";
	}
  	
	while (($counter % 7)!= 0) #prints ending blank cells if any
  	{
		print "<td>&nbsp;</td>";
       	$counter++;
  	}
	
  print "</table>";
  ?>