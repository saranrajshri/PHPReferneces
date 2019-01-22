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
if (isset($_FILES['profilepic'])) {
$chars ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
$rand_dir_name = substr(str_shuffle($chars),0,15);
mkdir("userdata/shared_videos/$rand_dir_name");
if (file_exists("userdata/shared_videos/$rand_dir_name/".@$_FILES["profilepic"] ["name"]))
{
echo @$_FILES["profilepic"] ["name"]."Already exists";
}
else
{
move_uploaded_file (@$_FILES["profilepic"] ["tmp_name"],"userdata/shared_videos/$rand_dir_name/".@$_FILES["profilepic"]["name"]);
$profile_pic_name= @$_FILES["profilepic"]["name"];
mysql_query("INSERT INTO shared_videos VALUES('','$user','$username','$log_user_name','$typ_user_name','$rand_dir_name/$profile_pic_name','$log_profile_pic','$typ_profile_pic')");

}
}
?>
<div class="header2">
<div id="cr">
<a href="home.php?profile_id=<?php echo $user;?>"class="active">Wall</a>
<a href="home-info.php?profile_id=<?php echo $user;?>">Info</a>
<a href="home-photos.php?profile_id=<?php echo $user;?>">Photos</a>
<a href="home-boxes.php?profile_id=<?php echo $user;?>">Boxes</a>
<a href="home-notes.php?profile_id=<?php echo $user;?>">Notes</a>
<a href="home-videos.php?profile_id=<?php echo $user;?>">Videos</a>
<a href="home-more.php?profile_id=<?php echo $user;?>">More</a>
</div>
</div> 
<!--center part-->
<div class="kjfkjg">
<a href="home.php?profile_id=<?php echo $user; ?>"><img src="./img/status-edit.png" width="20" height="20" style="padding-right:5px;">Update Status</a>
<a href="home-share-link.php?profile_id=<?php echo $user;?>"><img src="./img/share-link.png" width="20" height="20">Share link</a>
<a href="home-add-photos.php?profile_id=<?php echo $user;?>"><img src="./img/add-photos.png" width="20" height="20">Add photos</a>
<a href="home-add-videos.php?profile_id=<?php echo $user;?>"class="active-3"><img src="./img/add-videos.png" width="20" height="20">Add videos</a>
<a href="home-add-music.php?profile_id=<?php echo $user;?>"><img src="./img/add-music.png" width="20" height="20">Add music</a>
<a href="more.php?profile_id=<?php echo $user;?>">More...</a>
</div>
<div class="arrow_box">
<input type="text" name="post" placeholder="What are you doing right now?" class="filled">
<input type="submit" name="post" value="Post" class="button blue">
</div>

<form action="#" method="post" enctype="multipart/form-data">
<div class="arrow_box" style="height:160px;border:1px solid #ccc;">
<center><h1 style="padding-bottom:10px;">Click here to add videos and click the post button</h1></center>
<center><label for ="add" id="hoov"><img src="./img/more.gif" style="padding:10px;border:1px dashed #ccc" title="Click to add videos" width="80" height="80" ></label></center>
<input type="file" name="profilepic" style="margin-left:280px;margin-top:10px;display:none" id="add">
<input type="submit" name="post_sub"  style="width:100%;margin-top:10px" value="Post" class="button blue">
</div>
</form>
<hr style="width:56.5%;margin-left:280px;margin-top:10px;">

<!--right-->
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
	$getFriendQuery=mysql_query("SELECT * FROM users WHERE id='$value' LIMIT 1");
	$getFriendRow=mysql_fetch_assoc($getFriendQuery);
	$friendUsername=$getFriendRow['username'];
	$friendId=$getFriendRow['id'];
	$friendProfilePic=$getFriendRow['profile_pic'];
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
