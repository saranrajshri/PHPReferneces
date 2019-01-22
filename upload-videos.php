<?php include("./inc/header.inc.php");?>
<?php include("./inc/script.inc.php");?>
<div class="header2">
<div id="cr">
<a href="home.php?profile_id=<?php echo $user;?>">Wall</a>
<a href="home-info.php?profile_id=<?php echo $user;?>">Info</a>
<a href="home-photos.php?profile_id=<?php echo $user;?>">Photos</a>
<a href="home-boxes.php?profile_id=<?php echo $user;?>">Boxes</a>
<a href="home-notes.php?profile_id=<?php echo $user;?>">Notes</a>
<a href="home-videos.php?profile_id=<?php echo $user;?>"class="active">Videos</a>
<a href="home-more.php?profile_id=<?php echo $user;?>">More</a>
</div>
</div>
<?php
if(isset($_POST['upload'])){
	$name=$_FILES['file']['name'];
	$temp=$_FILES['file']['tmp_name'];
	$vid_url="videos/".$name;
	move_uploaded_file($temp,"videos/".$name);
	mysql_query("INSERT INTO `videos` VALUES('','$user','$log_user_name','$vid_url')");
}
?>
<div class="cont" style="width:56%;">
<div id="cont-header">
<center><h1>Upload videos to your account</h1></center>
</div>
<div id="cont-body"> 
<center><h1>Choose the video file to upload</h1></center>
<hr style="margin-top:0px;"><br>
<form action="#" method="post" enctype="multipart/form-data">
<center><input type="file" name="file"></center>
<input type="submit" class="button blue" name="upload" style="width:100%;margin-top:10px;">
</form>
</div>
</div>
</div>
 <div class="cont" style="margin-top:40px;width:58%;">
<div id="cont-header">
<center><h1 style="font-size:18px;"><?php echo $log_user_name?>'s videos</h1></center>
</div>
<div id="cont-body" style="border:2px solid #f2f2f2;">
<?php
$querry=mysql_query("SELECT * FROM videos WHERE user_id='$user'");
while($run=mysql_fetch_array($querry)){
$url=$run['url'];
 ?>
<div id="video_box">
<video src="<?php echo $url ?>"></video><br>
</a>
</div>

<?php
}
?>


<style>
#video_box {height:200px;width:200px;padding:20px;box-shadow:0 0 5px #000;}
#video_box video{height:100%;width:100%;padding:0px;box-shadow:0 0 5px #000;}

</style>
</div>
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
