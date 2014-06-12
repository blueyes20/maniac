<?php
$showmonth = $_POST['showmonth'];
$showyear = $_POST['showyear'];

$showmonth = preg_replace('#[^0-9/]#i', '', $showmonth);
$showyear = preg_replace('#[^0-9/]#i', '', $showyear);

//$showmonth = 6;
//$showyear = 2014;

$day_count = cal_days_in_month(CAL_GREGORIAN, $showmonth,$showyear);
$pre_days = date('w', mktime(0,0,0, $showmonth,0, $showyear));
$post_days = (6 - (date('w', mktime(0,0,0, $showmonth, $day_count,$showyear))));

echo'<div id="calendar_wrap">';
echo'<div class="title_bar">';
echo'<div class="previous_month"><input name="myBtn" type="submit" value="Previous Month" onClick="javascript:last_month();"></div>';
echo'<div class="show_month">' .$showmonth .'/'.$showyear . '</div>';
echo'<div class="next_month"><input name="myBtn" type="submit" value="Next Month" onClick="javascript:next_month();"</div>';
echo'</div>';

echo'<div class="week_days">';
echo'<div class="days_of_week">Lu</div>';
echo'<div class="days_of_week">Ma</div>';
echo'<div class="days_of_week">Mi</div>';
echo'<div class="days_of_week">Ju</div>';
echo'<div class="days_of_week">Vi</div>';
echo'<div class="days_of_week">Sá</div>';
echo'<div class="days_of_week">Do</div>';
echo'<div class="clear"></div>';
echo'</div>';

/*Previous Month Filler Days*/
if($pre_days != 0){
	for( $i=1; $i<=$pre_days; $i++){
		echo '<div class="non_cal_day"></div>';	
	}
}
/*Current month*/
//connect to mysql
include ("connect.php");
//
for($i=1; $i<=$day_count; $i++){
	//get events logic
	$date = $showmonth.'/'.$i.'/'.$showyear;
	$query = mysql_query('SELECT id FROM events WHERE evdate = "'.$date.'"');
	$num_rows = mysql_num_rows($query);
	if($num_rows > 0) {
		$event = "<input name='$date' type='submit' value='Details' id='$date' onClick='javascript:show_details(this);'>";
	}
	//end get events
	echo '<div class="cal_day">';
	echo '<div class="day_heading">' . $i . '</div>';	
	//show events button
	if($num_rows !=0) { echo "<div class='openings'><br />" . $event . "</div>";}
	//end button
	echo '</div>';
} 
/*Next month Filler Days*/
if ($post_days != 0) {
	for($i=1; $i<=$post_days; $i++) {
		echo '<div class="non_cal_day"></div>';	
	}
}
echo'</div>';
?>