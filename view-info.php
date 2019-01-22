
<?php include("./inc/header.inc.php");?>
<?php include("./inc/script.inc.php");?>
<?php
$post_sub= @$_POST['post-sub'];
$post=strip_tags(@$_POST['post']);
$d=date ("y-m-d");//Year-Month-Day
if($post_sub){
if($post==''){
	//do nothing
}
else
{
	mysql_query("INSERT INTO posts VALUES('','$log_user_name','$user','$typ_user_name','$username','$post','$d') ");
}
}
$check_pic=mysql_query("SELECT cover_pic FROM users WHERE id='$username' ");
$coverpic_pic_row = mysql_fetch_assoc($check_pic);
$cover_pic_db = $coverpic_pic_row['cover_pic'];
if ($cover_pic_db == "") {
$cover_pic = "img/01.jpg";
}
else
{
$cover_pic = "./userdata/cover_pics/".$cover_pic_db;

}
?>
<?php
if($typ_profile_pic=''){
	$typ_profile_pic='./img/default.jpg';
}
else{
	$typ_profile_pic='./userdata/profile_pics/'.$typ_profile_pic;
}
?>
<img src="<?php echo $cover_pic;?>" width="815" height="315" style="margin-left:250px;margin-top:10px;border:5px solid #f2f2f2;border-radius:5px">
<img src="<?php echo $typ_profile_pic;?>" width="180" height="180" style="margin-left:-800px;position:absolute;top:240px" class="gov"> 
<div id="yourname">
<h1 style="font-size:30px;color:#fff;margin-left:470px;margin-top:-140px;"><?php echo $typ_user_name;?></h1>
</div>

<?php
$e_check = mysql_query("SELECT * FROM friend_requests WHERE user_from='$user' AND user_to='$username'");
$email_check= mysql_num_rows($e_check);
if ($email_check!=0) {
echo'<input type="submit" value="Request Sent" name="none" class="button default" style="position:absolute;left:800px;top:356px">';
}
?> 
<?php
if (isset($_POST['addfriend'])) {
mysql_query("INSERT INTO friend_requests VALUES('','$user','$username','$log_user_name','$typ_user_name','$log_profile_pic','$typ_profile_pic')");
echo'<input type="submit" value="Request Sent" name="none" class="button default" style="position:absolute;left:800px;top:356px">';
}
?>
<?php
$check_pic=mysql_query("SELECT profile_pic FROM users WHERE id='$username' ");
$coverpic_pic_row = mysql_fetch_assoc($check_pic);
$profile_pic_db = $coverpic_pic_row['profile_pic'];
if ($profile_pic_db == "") {
$profile_pic = "img/default.jpg";
}
else
{
$profile_pic = "userdata/profile_pics/".$profile_pic_db;

}
?>     
			<?php
			if ($user!=$username){
			echo'
			<div id="jh" style="margin-left:800px;margin-top:50px">
			<form action="#" method="post">
			
				<input type="submit" value="Add Friend " name="addfriend" class="button default" style="margin-left:10px;margin-top:10px">
				<input type="submit" value="Send Message ..." name="add-friend" class="button default" style="margin-left:10px;margin-top:-27px">
				</form>
				
				<a href="view-photos-of-user.php?profile_id='.$username.'" class="button blue" style="margin-top:20px;margin-left:-250px">View shared photos of '.$typ_first_name.'</a>
				<a href="#" class="button blue" style="margin-top:20px">View shared videos of '.$typ_first_name.'</a>
				</div>
			';}
			else{
				echo'<form action="#" method="post"></form>
					<div id="lk" style="margin-left:720px;margin-top:50px">
					<a href="#" class="button default" style="margin-right:10px;">Edit my profile</a>
					<a href="#" class="button default" style="margin-right:10px;">Activity log</a>
					<a href="#" class="button default" style="margin-right:10px;">Friends List</a>
					</div>
<div id="cover-pic" style="">
<a href="up-cov-pic.php" style="position:absolute;top:100px;left:850px" class="button default">Update your cover picture</a>
</div>
					';
			}
//remove friend code
if  (@$_POST['removefriend']) {
$add_friend_check = mysql_query("SELECT friend_array FROM users WHERE id='$user'");
$coverpic_friend_row = mysql_fetch_assoc($add_friend_check);
$friend_array = $coverpic_friend_row['friend_array'];
$friend_array_explode = explode(",",$friend_array);
$friend_array_count = count($friend_array_explode);
////////////////////////////////////////////////////////////////////////////////////////////////
$add_friend_check_username = mysql_query("SELECT friend_array FROM users WHERE id='$username'");
$coverpic_friend_row_username = mysql_fetch_assoc($add_friend_check_username);
$friend_array_username = $coverpic_friend_row_username['friend_array'];
$friend_array_explode_username = explode(",",$friend_array_username);
$friend_array_count_username = count($friend_array_explode_username);
////////////////////////////////////////////////////////////////////////////////////////////////
$usernameComma = ",".$username;
$usernameComma2= $username.",";

$userComma = ",".$user;
$userComma2= $user.",";
/////////////////////////////////////////////////////////////////////////////////////////////////
if(strstr("$friend_array","$usernameComma")) {
$friend1 = str_replace("$usernameComma","","$friend_array");
}
else
if(strstr("$friend_array","$usernameComma2")) {
$friend1 = str_replace("$usernameComma2","","$friend_array");
}
else
if(strstr("$friend_array","$username")) {
$friend1 = str_replace("$username","","$friend_array");
}
///////////////////////////////////////////////////////////////////////////////////////////////
if(strstr("$friend_array","$userComma")) {
$friend2 = str_replace("$userCmoma","","$friend_array");
}
else
if(strstr("$friend_array","$userComma2")) {
$friend2 = str_replace("$userComma2","","$friend_array");
}
else
if(strstr("$friend_array","$user")) {
$friend2 = str_replace("$user","","$friend_array");
}
$friend2="";
$removeFriendQuery = mysql_query("UPDATE users SET friend_array='$friend1' WHERE id='$user'");
$removeFriendQuery_username = mysql_query("UPDATE users SET friend_array='$friend2' WHERE id='$username'");
}



?>

			<?php
					$friendsArray="";
					$countFriends="";
					$friendsArray12="";
					$addAsFriend="";
					$selectFriendsQuery=mysql_query("SELECT friend_array FROM users WHERE id='$username'");
					$friendRow= mysql_fetch_assoc($selectFriendsQuery);
					$friendArray= $friendRow['friend_array'];
					if ($friendArray != "") {
					$friendArray = explode(",",$friendArray);
					$countFriends= count($friendArray);
				$friendArray12 = array_slice($friendArray, 0 , 12);
					
					
					$i= 0;
					if (in_array($user,$friendArray)) {
					echo'
				<form action="profile.php?profile_id='.$username.' " method="post">
					<input type="submit" name="removefriend" value="Unfriend" style="
position:absolute;
top:356px;
left:810px;width:6%;" class="button blue">
</form>';
					}
					
					else
					{
					}
				
				
					}
				?>
				<div class="rightside" style="margin-top:-150px;">
<div id="ad-header">
<h1>Advertise</h1>
</div>
<div id="ad-body">
<h1>300+ active users</h1><br>
<center><h1 class="banner" style="color:#fff;">Invite your friends</h1></center>
</div><br>
<p class="djhfc" style="text-indent:50px;font-weight:bold;line-height:15px;">Our network has crossed about 300+ active users.Please help us to extend our network.So,invite your friends to our network</p>
<br>
<div id="ad-footer">
</div><br>
<a href="#" class="more-ads">More ads</a>
</div>

<div class="leftsidepart" style="margin-top:20px;margin-left:-20px">
<div id="op">
<a href="view-photos.php?profile_id=<?php echo $username;?>">View photos of <?php echo $typ_first_name;?></a><hr>
<a href="view-videos.php?profile_id=<?php echo $username;?>">View videos of <?php echo $typ_first_name;?></a><hr><hr>
</div><br>
<div id="information">
<div id="information-header">
<h1>About <?php echo $typ_user_name;?></h1>
</div>
<div id="information-body">
<?php 
$re=mysql_query("SELECT bio FROM users WHERE id='$username'");
while($run=mysql_fetch_array($re)){
	$bio=$run['bio'];
}
echo'<p style="font-size:12px;font-weight:bold;padding:10px">'.$bio.'</p>';
?>
</div>
</div><div id="information">
<div id="information-header">
<h1>Information</h1>
</div>
<div id="information-body">
<p class="ptag">Networks:<p>
<div id="kdfkf"><br>
<p class="bo"><?php echo $networks;?></p>
</div>
<div id="jfk">
<p class="ptag">Birthday:<p>
<div id="kdfkf"><br>
<p class="bo" style="word-spacing:5px;"><?php echo $day;?> <?php echo $month;?> <?php echo $year;?></p>
</div>
</div>
<div id="jfk">
<p class="ptag">Current City:<p>
<div id="kdfkf"><br>
<p class="bo"><?php echo $current_city;?></p>
</div>
</div>
</div>
</div>
<div id="friends-list">
<div id="information-header">
<h1>Friends</h1>
</div>
<div id="information-body" style="height:150px;">
<?php
if($countFriends!=0){
foreach($friendArray12 as $key => $value){
	$i++;
	$coverpicFriendQuery=mysql_query("SELECT * FROM users WHERE id='$value' LIMIT 1");
	$coverpicFriendRow=mysql_fetch_assoc($coverpicFriendQuery);
	$friendUsername=$coverpicFriendRow['username'];
	$friendId=$coverpicFriendRow['id'];
	$friendProfilePic=$coverpicFriendRow['profile_pic'];
	if($friendProfilePic==""){
		echo"<a href=profile.php?profile_id=$friendId><img src='./img/default.jpg'  height='60' width='60' alt='$friendUsername' title='$friendUsername'></a>";
		
		
	}
	else
	{
		echo"<a href=profile.php?profile_id=$friendId><img src='./userdata/profile_pics/$friendProfilePic'  height='60' width='60' alt='$friendUsername' title='$friendUsername'></a>";
	}
}
}
else{echo '<h1 style="padding-top:10px;">'.$typ_user_name.' has no friends</h1>';}
?>
</div>
</div>
<div class="cont" style="width:800px;margin-top:-350px;margin-left:240px">
<div id="cont-header">
<h1><?php echo $typ_user_name;?>'s info</h1>
</div>
<div id="cont-body">
<p style="font-size:15px;padding:5px;">Firstname :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px"><?php echo $typ_first_name;?></p>
<p style="font-size:15px;padding:5px;">Lastname :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $typ_last_name;?></p>
<p style="font-size:15px;padding:5px;">Networks :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $typ_networks;?></p>
<p style="font-size:15px;padding:5px;">Hometown :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $typ_hometown;?></p>
<p style="font-size:15px;padding:5px;">Current city :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $typ_current_city;?></p>
<p style="font-size:15px;padding:5px;">Interests :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $typ_interests;?></p>
<p style="font-size:15px;padding:5px;">Favourite Quotations :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $typ_fav_quotations;?></p>
<p style="font-size:15px;padding:5px;">About me :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $typ_bio;?></p>
<p style="font-size:15px;padding:5px;">Website :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $typ_website;?></p>
<p style="font-size:15px;padding:5px;">High school :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $typ_high_school;?></p>
<p style="font-size:15px;padding:5px;">Employer :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $typ_employer;?></p>
<p style="font-size:15px;padding:5px;">Location :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $typ_location;?></p>
<p style="font-size:15px;padding:5px;">Relationship Status :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $typ_r_status;?></p>
<p style="font-size:15px;padding:5px;">Interested In :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $typ_interested_in;?></p>
</div>
</div>
