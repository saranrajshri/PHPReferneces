<?php include("./inc/header.inc.php");?>
<?php include("./inc/script.inc.php");?>
<?php
?>
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
<a href="home.php?profile_id=<?php echo $user; ?>"class="active-3"><img src="./img/status-edit.png" width="20" height="20" style="padding-right:5px;">Update Status</a>
<a href="home-share-link.php?profile_id=<?php echo $user;?>"><img src="./img/share-link.png" width="20" height="20">Share link</a>
<a href="home-add-photos.php?profile_id=<?php echo $user;?>"><img src="./img/add-photos.png" width="20" height="20">Add photos</a>
<a href="home-add-videos.php?profile_id=<?php echo $user;?>"><img src="./img/add-videos.png" width="20" height="20">Add videos</a>
<a href="home-add-music.php?profile_id=<?php echo $user;?>"><img src="./img/add-music.png" width="20" height="20">Add music</a>
<a href="more.php?profile_id=<?php echo $user;?>">More...</a>
</div>
<div class="arrow_box">

<form action="#" method="post">
<input type="text" name="post" placeholder="What are you doing right now?" class="filled">
<input type="submit" name="post-sub" value="Post" class="button blue">
</form>
</div>
<hr style="width:56.5%;margin-left:280px;margin-top:10px;">
<?php // form ?>
<?php
$getinfo=mysql_query("SELECT * FROM posts WHERE user_name_id='$user' ORDER BY id DESC LIMIT 10");
while($get=mysql_fetch_array($getinfo)){
	$username_from=$get['username'];
	$id=$get['id'];
	$username_from_id=$get['username_id'];
	$user_name_id=$get['user_name_id'];
	$user_name_to=$get['user_name_to'];
	$body=$get['post-body'];
$get_user_info = mysql_query ("SELECT * FROM users WHERE id='$username_from_id'");
$get_info = mysql_fetch_assoc($get_user_info);
$profilepic_info = $get_info['profile_pic'];
echo'
<div class="postsforuser" style="margin-top:20px;width:57%;margin-left:280px;padding-bottom:20px;">
<div id="profile_pictures">
<img src=userdata/profile_pics/'.$profilepic_info.' width="60" height="60" style="border:1px solid #ccc;">
</div>
<div id="nameofuser" style="margin-top:-60px;">
<a href="profile.php?profile_id='.$user_name_id.'" style="padding-left:70px;color:#045dad;font-size:15px;font-weight:bold;text-decoration:none;">'.$username_from.'</a>
</div>
<div id="msg-cont" style="padding-left:70px;padding-top:10px;">
<p style="word-wrap:break-line;">'.$body.'</p>
</div>
<div id="like-options" style="padding-top:20px">
<a href="#" style="color:#045dad;text-decoration:none;font-size:14px;font-weight:none;margin-left:70px;">Like </a>
<a href="#" style="color:#045dad;text-decoration:none;font-size:14px;font-weight:none;margin-left:20px;">Comment </a>
<a href="#" style="color:#045dad;text-decoration:none;font-size:14px;font-weight:none;margin-left:20px;">Share</a>
</div>
</div>
<div id="comments" style="display:visible">
<div id="com-pi" style="margin-left:350px">
<img src='.$profile_pic.' width="40" height="40">
</div>
<div id="com-box" style="margin-left:400px;margin-top:-30px">
<form action="#" method="post">
<input type="text" name="comment" placeholder="Write a comment" style="font-size:15px;background:#f2f2f2;padding:5px;border:1px solid #ccc;text-indent:5px;width:300px">
<input type="submit" name="post-com" style="display:none;">
</form>
</div>
</div>
<div id="view-comments">

</div>
<hr style="margin-top:5px;width:57%;margin-left:280px;"> 
';
}
?>
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
<img src="<?php echo $profile_pic;?>" style="border:1px solid #ccc" width="200" height="200">
</div>
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
<img src="#" width="60" height="60">
<img src="#" width="60" height="60">
<img src="#" width="60" height="60">
<img src="#" width="60" height="60">
<img src="#" width="60" height="60">
<img src="#" width="60" height="60">
</div>
</div>
</div>
<h1 style="position:absolute;font-size:27px;color:#000;top:80px;left:280px;"><?php echo $log_user_name;?></h1>
