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
if($user){
	
}
else
{
	die("<center><img src='./img/errror.jpg' width='500' height='500'></center>");
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
<div id="cont" style="width:57%;margin-left:280px;margin-top:20px">
<div id="cont-header">
<center><h1><?php echo $log_user_name; ?>'s account settings </h1></center>
</div>
<div id="cont-body" style="border:1px solid #ccc;boder-top:1px solid #o45dad;padding:10px;">
<a href="up-prof-pic.php?profile_id=<?php echo $user;?>" style="padding:10px;color:#045dad;font-size:15px;text-decoration:none"> 1) Update profile picture</a> 
<a href="up-prof-pic.php?profile_id=<?php echo $user;?>" style="padding:10px;color:#045dad;font-size:15px;text-decoration:none;margin-left:470px">[ edit ]</a> 
<hr style="width:100%;margin-left:0px;margin-top:10px;"><br>
<a href="change-pswd.php?profile_id=<?php echo $user;?>" style="padding:10px;color:#045dad;font-size:15px;text-decoration:none"> 2) Change your account password</a> 
<a href="change-pswd.php?profile_id=<?php echo $user;?>" style="padding:10px;color:#045dad;font-size:15px;text-decoration:none;margin-left:400px">[ edit ]</a> 
<hr style="width:100%;margin-left:0px;margin-top:10px;"><br>
<a href="change-name.php?profile_id=<?php echo $user;?>" style="padding:10px;color:#045dad;font-size:15px;text-decoration:none"> 3) Change your name</a> 
<a href="change-name.php?profile_id=<?php echo $user;?>" style="padding:10px;color:#045dad;font-size:15px;text-decoration:none;margin-left:485px">[ edit ]</a> 
<hr style="width:100%;margin-left:0px;margin-top:10px;"><br>
<a href="up-cov-pic.php" style="padding:10px;color:#045dad;font-size:15px;text-decoration:none"> 4) Change your cover picture</a> 
<a href="up-cov-pic.php" style="padding:10px;color:#045dad;font-size:15px;text-decoration:none;margin-left:435px">[ edit ]</a> 
<hr style="width:100%;margin-left:0px;margin-top:10px;"><br>
<a href="tell-something.php?profile_id=<?php echo $user;?>" style="padding:10px;color:#045dad;font-size:15px;text-decoration:none"> 5) Tell something about you</a> 
<a href="tell-something.php?profile_id=<?php echo $user;?>" style="padding:10px;color:#045dad;font-size:15px;text-decoration:none;margin-left:445px">[ edit ]</a> 
<hr style="width:100%;margin-left:0px;margin-top:10px;"><br>
</div>
</div>
<?php // form ?>
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
