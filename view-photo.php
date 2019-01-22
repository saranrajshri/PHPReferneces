<?php include("./inc/header.inc.php");?>
<?php include("./inc/script.inc.php");?>
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
<?php
$query=mysql_query("SELECT `id` , `name` FROM `albums` WHERE user_id='$user'");
while($run = mysql_fetch_assoc($query)){
	$album_id=$run['id'];
	$album_name=$run['name'];
	$query1=mysql_query("SELECT url FROM photos WHERE album_id='$album_id' AND user_id_of_album='$user'");
	$run1=mysql_fetch_array($query1);
	$pic=$run1['url'];
}
?>
<a href="create-album.php?profile_id=<?php echo $user;?>" class="mm"style="position:absolute;left:300px;top:240px;font-size:15px;text-decoration:none;color:#fff;font-weight:bold;font-family:ariall,helvetica,sans-serif;">[ Create a album ]</a>
 <div class="cont" style="margin-top:40px;width:58%;">
<div id="cont-header">
<center><h1 style="font-size:18px;"><?php echo $log_user_name?>'s Photos</h1></center>
<a href="create-album.php?profile_id=<?php echo $user;?>" class="mm"style="position:absolute;right:300px;top:240px;font-size:15px;text-decoration:none;color:#fff;font-weight:bold;font-family:ariall,helvetica,sans-serif;">[ Upload more photos ]</a>
</div>
<div id="cont-body" style="border:2px solid #f2f2f2;">
<?php
$album_id=$_GET['id'];
$querry=mysql_query("SELECT * FROM photos WHERE album_id='$album_id' AND user_id_of_album='$user'");
while($run=mysql_fetch_array($querry)){
$url=$run['url'];
 ?>
<div id="view_box">
<a href="view-full-photo.php?img_destination_or_location_url=<?php echo $url ?>&&img_id=<?php echo $album_id?>"><img src="uploads/<?php echo $url?>" width="200"/></a>
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
<img src="./img/me.jpg" width="200" height="200">
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
<p class="bo">Facebook</p>
<p class="bo">Havard Album</p>
<p class="bo">Palo Alto</p>
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
<p class="bo">Chennai, Tamilnadu</p>
</div>
</div>
</div>
</div>
<div id="friends-list">
<div id="information-header">
<h1>Friends</h1>
</div>
<div id="information-body" style="height:150px;">
<img src="#" width="60" height="60">
<img src="#" width="60" height="60">
<img src="#" width="60" height="60">
<img src="#" width="60" height="60">
<img src="#" width="60" height="60">
<img src="#" width="60" height="60">
</div>
</div>
</div>
<h1 style="position:absolute;font-size:27px;color:#000;top:100px;left:280px;"><?php echo $log_user_name;?></h1>