<?php include("./inc/header.inc.php");?>
<?php include("./inc/script.inc.php");?>
<div class="chat_box">
<div class="chat_head">
<center><h1>Chat box</h1></center>
</div>
<div class="chat_body" style="display:none">
<?php
if($countFriends!=0){
foreach($friendArray12 as $key => $value){
	$i++;
	$getFriendQuery=mysql_query("SELECT * FROM users WHERE id='$value' LIMIT 1");
	$getFriendRow=mysql_fetch_assoc($getFriendQuery);
	$friendUsername=$getFriendRow['username'];
	$friendId=$getFriendRow['id'];
	$friendProfilePic=$getFriendRow['profile_pic'];

	echo'<a href="chat.php?profile_id='.$friendId.'" style="text-decoration:none"><div class="user"><p style="font-weight:bold" name='.$friendId.'>'.$friendUsername.'</p></div></a>
	
	<div class="msg_box" style="right:520px;bottom:25px;display:none">
<div class="msg_head" style="background:#3498db;"><p style="font-weight:bold">'.$friendUsername.'</p>
<div class="close" style="float:right;margin-top:-15px"><p style="font-weight:bold ">x</p></div>
</div>
<div class="msg_body" style="overflow:auto;display:none">

<div class="msg_a"></div>
<div class="msg_b"></div>
<div class="msg_insert"></div>

</div>
<div class="msg_footer" style=""><input type="text" name="send_message" placeholder="Enter your message here.."></div>

</div>
	';

	}
}
else{echo '<h1 style="padding-top:10px;">'.$typ_user_name.' has no friends to chat</h1>';}
?>
</div>
</div>



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
?>
<div class="header2">
<div id="cr">
<a href="home.php?profile_id=<?php echo $user;?>">Wall</a>
<a href="home-info.php?profile_id=<?php echo $user;?>">Info</a>
<a href="home-photos.php?profile_id=<?php echo $user;?>">Photos</a>
<a href="home-boxes.php?profile_id=<?php echo $user;?>">Boxes</a>
<a href="home-notes.php?profile_id=<?php echo $user;?>">Notes</a>
<a href="home-videos.php?profile_id=<?php echo $user;?>">Videos</a>
<a href="home-more.php?profile_id=<?php echo $user;?>">More</a>
</div>
</div> 
<!--center part-->

<div class="cont" style="margin-top:20px;width:55%;">
<div id="cont-header">
<center><h1>Friend Requests</h1></center>
</div>
<div id="cont-body">
<?php
$user_from="";
$friendRequests= mysql_query("SELECT * FROM friend_requests WHERE user_to ='$user' ORDER BY id DESC");
$numrows=mysql_num_rows($friendRequests);
if ($numrows==0) {
echo"<center><p style='padding-top:10px'>You have no friend requests at this time</p></center>";

}
else
{
while ($get_row = mysql_fetch_assoc($friendRequests)) {
$id = $get_row['id'];
$user_to=$get_row['user_to'];
$user_from=$get_row['user_from'];
$user_from_name=$get_row['user_from_name'];
$user_to_name=$get_row['user_to_name'];
$user_pic=$get_row['user_pic'];

echo'<img src="./userdata/profile_pics/'.$user_pic.'" style="border:1px solid #ccc;margin:10px" width="50" height="50"><h1 style="word-spacing:5px;margin-top:-40px;margin-left:60px">'.$user_from_name.' wants to be your friend</h1>';

include('fr_body.php');

}
}
?>
<?php
?>
<?php
if(isset($_POST['acceptrequest'.$user_from])) {
$get_friend_check = mysql_query("SELECT friend_array FROM users WHERE id='$user'");
$get_friend_row= mysql_fetch_assoc($get_friend_check);
$friend_array = $get_friend_row['friend_array'];
$friendArray_explode = explode(",",$friend_array);
$friendArray_count =count($friendArray_explode);
//another form
$add_friend_check_friend = mysql_query("SELECT friend_array FROM users WHERE id='$user'");
$get_friend_row_friend= mysql_fetch_assoc($get_friend_check);
$friend_array_friend = $get_friend_row_friend['friend_array'];
$friendArray_explode_friend = explode(",",$friend_array_friend);
$friendArray_count_friend =count($friendArray_explode_friend);


if ($friend_array =="") {
$friendArray_count = count(NULL);
}
if ($friend_array_friend =="") {
$friendArray_count_friend= count(NULL);
}

if ($friendArray_count== NULL) {
$add_friend_query=mysql_query("UPDATE users SET friend_array=CONCAT(friend_array,'$user_from') WHERE id  ='$user_to'"); 

}
if ($friendArray_count_friend == NULL) {
$add_friend_query=mysql_query("UPDATE users SET friend_array=CONCAT(friend_array,'$user_to') WHERE id  ='$user_from'"); 

}
if ($friendArray_count >= 1) {
$add_friend_query=mysql_query("UPDATE users SET friend_array=CONCAT(friend_array,',$user_from') WHERE id  ='$user'"); 
}
if ($friendArray_count_friend >= 1) {
$add_friend_query=mysql_query("UPDATE users SET friend_array=CONCAT(friend_array,',$user_to') WHERE id  ='$user_from'"); 

}
$date=date("y-m-d");
$notification=mysql_query("INSERT INTO friends_notifications VALUES('','$log_user_name','$user','$user_from','$d','no')");
$delete_request=mysql_query("DELETE  FROM friend_requests WHERE user_to='$user_to'&& user_from='$user_from'");
echo '<form action="#" method="post">
<div id="sa" style="margin-left:600px;">
<input type="submit" name="l<?php echo $user_from; ?>" value="Accepted" class="button blue" style="margin-right:10px;margin-top:-34px;width:95%">
</form>
</div>';
}
if (isset($_POST['ignorerequest'.$user_from])) {
$ignore_request=mysql_query("DELETE  FROM friend_requests WHERE user_to='$user_to'&& user_from='$user_from'");
echo '<form action="#" method="post">
<div id="sa" style="margin-left:600px;">
<input type="submit" name="l<?php echo $user_from; ?>" value="Ignored" class="button blue" style="margin-right:10px;margin-top:-34px;width:95%">
</form>
</div>';
}
?>
</div>
<div class="rightside">
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
<?php // left side part?>
<div class="leftsidepart">
<div id="prof">
<div class="profile">
<img src="<?php echo $profile_pic;?>" width="200" height="200" style="border:1px solid #ccc;">
</div>
<br>
</div>
<div id="op">
<br>
<a href="#">View photos of me</a><hr>
<a href="#">View videos of me</a><hr>
<a href="edit-profile.php?profile_id=<?php echo $user;?>">Edit my profile</a><hr>
</div><br>
<div id="information">
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
<p class="bo">Jan 29, 2001</p>
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
	$getFriendQuery=mysql_query("SELECT * FROM users WHERE id='$value' LIMIT 1");
	$getFriendRow=mysql_fetch_assoc($getFriendQuery);
	$friendUsername=$getFriendRow['username'];
	$friendId=$getFriendRow['id'];
	$friendProfilePic=$getFriendRow['profile_pic'];
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
</div>
<h1 style="position:absolute;font-size:27px;color:#000;top:80px;left:280px;"><?php echo $log_user_name;?></h1>
