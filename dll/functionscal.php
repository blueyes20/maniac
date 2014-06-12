<?php 

 function getSchedule($day, $month, $year){
	 $thisDay="$year-$month-$day";
	 $sql="SELECT * FROM Meetings WHERE MeetingDate='$thisDay'";
	 $result=mysql_query($sql);
	 
	 while($row=mysql_fetch_row($result)){
		 echo "$row[1] -- $row[3]"; 
	 }	 
 }
?>

