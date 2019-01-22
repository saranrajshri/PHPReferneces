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
$nn= @$_POST['nn'];
$kkk=strip_tags(@$_POST['kkk']);
if($nn){
	if($kkk==''){
		echo"error";
	}
	else{
		mysql_query("INSERT INTO albums VALUES('','$kkk','$log_user_name','$user')");
	}
}
?>
<?php
if(isset($_POST['upload'])) {
	$album_id=$_POST['album'];
	$file=$_FILES['file']['name'];
	$file_type=$_FILES['file']['type'];
	$file_size=$_FILES['file']['size'];
	$file_tmp=$_FILES['file']['tmp_name'];
	$random_name=rand();
	if(empty($file)){
		echo"error";
	}
	else
	{
		move_uploaded_file($file_tmp,'uploads/'.$random_name.'.jpg');
		mysql_query("INSERT INTO photos VALUES('','$album_id','$log_user_name','$user','$random_name.jpg')");
		echo"uploaded";
	}
}
?>
<div class="header2">
<div id="cr">
<a href="home.php?profile_id=<?php echo $user;?>">Wall</a>
<a href="home-info.php?profile_id=<?php echo $user;?>">Info</a>
<a href="home-photos.php?profile_id=<?php echo $user;?>"class="active">Photos</a>
<a href="home-boxes.php?profile_id=<?php echo $user;?>">Boxes</a>
<a href="home-notes.php?profile_id=<?php echo $user;?>">Notes</a>
<a href="home-videos.php?profile_id=<?php echo $user;?>">Videos</a>
<a href="home-more.php?profile_id=<?php echo $user;?>">More</a>
</div>
</div>
<div class="cont" style="margin-top:40px;width:58%;">
<a href="create-album.php?profile_id=<?php echo $user;?>" class="mm"style="position:absolute;right:430px;top:235px;font-size:15px;text-decoration:none;color:#fff;font-weight:bold;font-family:ariall,helvetica,sans-serif;">[ Create a album ]</a>
<a href="create-album.php?profile_id=<?php echo $user;?>" class="mm"style="position:absolute;right:300px;top:235px;font-size:15px;text-decoration:none;color:#fff;font-weight:bold;font-family:ariall,helvetica,sans-serif;">[ Upload photos ]</a>
<div id="cont-header">
<h1><?php echo $log_user_name;?>'s Albums</h1>
</div>
<div id="cont-body">
<?php
$query=mysql_query("SELECT `id` , `name` FROM `albums` WHERE user_id='$user'");
while($run = mysql_fetch_array($query)){
	$album_id=$run['id'];
	$album_name=$run['name'];
	$query1=mysql_query("SELECT url FROM photos WHERE album_id='$album_id' AND user_id_of_album='$user'");
	$run1=mysql_fetch_array($query1);
	$pic=$run1['url'];
?>
<a href="view-photo.php?id=<?php echo $album_id;?>&&profile_id=<?php echo $user;?>">
<div id="view_box";>
<img src="uploads/<?php echo $pic;?>"/>
<center><h1><?php echo $album_name;?></h1></center>
</div>
</a>
<?php
}
?>
<div class='clear'></div>
</div>
</div>
<?php //right side part ?>
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