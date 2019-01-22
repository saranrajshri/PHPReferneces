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
	$coverpicFriendQuery=mysql_query("SELECT * FROM users WHERE id='$value' LIMIT 1");
	$coverpicFriendRow=mysql_fetch_assoc($coverpicFriendQuery);
	$friendUsername=$coverpicFriendRow['username'];
	$friendId=$coverpicFriendRow['id'];
	$friendProfilePic=$coverpicFriendRow['profile_pic'];

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



<div class="header2">
<div id="cr">
<a href="home.php?profile_id=<?php echo $user;?>">Wall</a>
<a href="home-info.php?profile_id=<?php echo $user;?>"class="active">Info</a>
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
<center><h1><?php echo $log_user_name; ?>'s Information</h1></center>
<a href="edit-info.php?profile_id=<?php echo $user;?>" class="mm"style="position:absolute;right:320px;top:215px;font-size:15px;text-decoration:none;color:#fff;font-weight:bold;font-family:ariall,helvetica,sans-serif;">[ edit info ]</a>
</div>
<div id="cont-body" style="border:1px solid #ccc;boder-top:1px solid #o45dad;padding:10px;">
<p style="font-size:15px;padding:5px;">Firstname :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px"><?php echo $log_first_name;?></p>
<p style="font-size:15px;padding:5px;">Lastname :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $log_last_name;?></p>
<p style="font-size:15px;padding:5px;">Networks :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $networks;?></p>
<p style="font-size:15px;padding:5px;">Hometown :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $hometown;?></p>
<p style="font-size:15px;padding:5px;">Current city :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $current_city;?></p>
<p style="font-size:15px;padding:5px;">Interests :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $interests;?></p>
<p style="font-size:15px;padding:5px;">Favourite Quotations :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $fav_quotations;?></p>
<p style="font-size:15px;padding:5px;">About me :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $bio;?></p>
<p style="font-size:15px;padding:5px;">Website :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $website;?></p>
<p style="font-size:15px;padding:5px;">High school :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $high_school;?></p>
<p style="font-size:15px;padding:5px;">Employer :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $employer;?></p>
<p style="font-size:15px;padding:5px;">Location :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $location;?></p>
<p style="font-size:15px;padding:5px;">Relationship Status :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $r_status;?></p>
<p style="font-size:15px;padding:5px;">Interested In :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $interested_in;?></p>
<?php
if($gender_pivacy=='no'){
	$gender_pivacy='';
}
else{
	$gender_pivacy='<p style="font-size:15px;padding:5px;">Birthday :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;">'.$day.' '.$month.' '.$year.'</p>';
}
?>
<?php echo $gender_pivacy ;?>
<p style="font-size:15px;padding:5px;">Gender :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px;"><?php echo $gender;?></p>

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
<img src="<?php echo $profile_pic;?>" style="border:1px solid #ccc" width="200" height="200">
</div>
<div id="op">
<br>
<a href="create-alum.php">View photos of me</a><hr>
<a href="upload-videos.php">View videos of me</a><hr>
<a href="edit-profile.php">Edit my profile</a><hr>
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
<p class="bo" style="word-spacing:5px;"><?php echo $day;?> <?php echo $month;?> <?php echo $year ;?></p>
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
		echo"<a href=profile.php?profile_id=$friendId><img src='./img/default.jpg'   style='margin-right:5px;' height='60' width='60' alt='$friendUsername' title='$friendUsername'></a>";
		
		
	}
	else
	{
		echo"<a href=profile.php?profile_id=$friendId><img src='./userdata/profile_pics/$friendProfilePic' style='padding-right:5px;' height='60' width='60' alt='$friendUsername' title='$friendUsername'></a>";
	}
}
}
else{echo '<h1 style="padding-top:10px;">'.$typ_user_name.' has no friends</h1>';}
?>
</div>
</div>
</div>
<h1 style="position:absolute;font-size:27px;color:#000;top:80px;left:280px;"><?php echo $log_user_name;?></h1>
