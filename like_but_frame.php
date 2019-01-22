<link rel="stylesheet" href="./css/main.css">
<?php
session_start();
include("./inc/connect.inc.php");

if (isset($_SESSION['user_login'])) {
$log_user_name=$_SESSION['user_login'];
$getposts=mysql_query("SELECT * FROM users WHERE email='$log_user_name'") or die (mysql_error);
while($row = mysql_fetch_assoc($getposts)) {
$user=$row['id'];
$log_user_name=$row['username'];
$log_first_name=$row['firstname'];
$log_last_name=$row['lastname'];
$log_email=$row['email'];
$db_password=$row['password'];
$log_profile_pic=$row['profile_pic'];
$log_cover_pic=$row['cover_pic'];
$sign_up_date=$row['sign_up_date'];
$last_update=date("Y-m-d");
$networks=$row['networks'];
$hometown=$row['hometown'];
$current_city=$row['current_city'];
$interests=$row['interests'];
$fav_quotations=$row['fav_quotations'];
$bio=$row['bio'];
$website=$row['website'];
$r_status=$row['r_status'];
$high_school=$row['high_school'];
$employer=$row['employer'];
$location=$row['location'];
$gender_pivacy=$row['dob_privacy'];
$day=$row['date'];
$month=$row['month'];
$year=$row['year'];
$gender=$row['gender'];
$dob= $day . $month . $year;
$interested_in=$row['interested_in'];
}
}
else
{
$user="";
}
$id='';
if (isset($_GET['uid'])) {
		$uid= mysql_real_escape_string($_GET['uid']);
		if(ctype_alnum($uid)) {
		$get_likes=mysql_query("SELECT * FROM likes WHERE uid='$uid'");
		if (mysql_num_rows($get_likes)===1) {
		$get= mysql_fetch_assoc($get_likes);
		$uid =$get['uid'];
		$total_likes=$get['total_likes'];
		$total_likes = $total_likes + 1;
		$remove_likes = $total_likes - 2;

		}
		else
		{
			die("Error...");
		}
if(isset($_POST['likebutton_'])){
	$like=mysql_query("UPDATE likes SET total_likes='$total_likes' WHERE uid='$uid'");
	$user_likes=mysql_query("INSERT INTO user_likes VALUES ('','$log_user_name','$user','$uid')");
	header("location:like_but_frame.php?uid=$uid");
	}
	if(isset($_POST['unlikebutton_'])){
	$like=mysql_query("UPDATE likes SET total_likes='$remove_likes' WHERE uid='$uid'");
	$remove_user=mysql_query("DELETE FROM user_likes  WHERE uid='$uid' AND user_id='$user'");
 	header("location:like_but_frame.php?uid=$uid");
	}
}
}


$check_for_likes = mysql_query("SELECT * FROM user_likes WHERE user_id='$user'");
$numrows_likes=mysql_num_rows($check_for_likes);
if($numrows_likes >=1){
	echo'
<form action="like_but_frame.php?uid=' . $uid . '" method="post">
<input type="submit" name="unlikebutton_' . $id . '" value="Unlike" class="button default">
<div style="display:inline">
' . $total_likes . ' likes
</div>
</form>';
}
else
	if($numrows_likes ==0){
echo'
<form action="like_but_frame.php?uid=' . $uid . '" method="post">
<input type="submit" name="likebutton_' . $id . '" value="Like" class="button default">
<div style="display:inline">
' . $total_likes . ' likes
</div>
</form>';
}
?> 
<style>
body{background:#fff;}
</style>
