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
<a href="home.php?profile_id=<?php echo $user; ?>" class="active-3"><img src="./img/status-edit.png" width="20" height="20" style="padding-right:5px;">Update Status</a>
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
<hr style="width:56.5%;margin-left:280px;margin-top:10px;">
<?php

$coverpicposts=mysql_query("SELECT * FROM diary WHERE user_id='$user'") or die (mysql_error);
while($row = mysql_fetch_assoc($coverpicposts)) {
	$username_from_id=$coverpic['username_id'];
	$user_name_id=$coverpic['user_name_id'];
	$user_name_to=$coverpic['user_name_to'];
	$body=$coverpic['post-body'];
$coverpic_user_info = mysql_query ("SELECT * FROM users WHERE id='$username_from_id'");
$coverpic_info = mysql_fetch_assoc($coverpic_user_info);
$profilepic_info = $coverpic_info['profile_pic'];
if($profile_pic == ''){
	$profilepic_info= "./img/default.jpg";
}
else
{
		$profilepic_info="./userdata/profile_pics/".$profilepic_info;

	}
	$coverpic_comments=mysql_query("SELECT * FROM post_comments WHERE post_id='$id' ORDER BY id DESC");
	$comment=mysql_fetch_array($coverpic_comments);
		$comment_body =$comment['post_body'];
		$posted_to=$comment['posted_to'];
		$posted_by=$comment['posted_by'];
		$removed=$comment['post_removed'];
		?>
		<script language="javascript">
		function toggle<?php echo $id;?>(){
			var else = document.coverpicElementById("toggleComment<?php echo $id;?>");
			var text = document.coverpicElementById("displayCommment<?php echo $id;?>");
			if(ele.style.display == "block"){
				ele.style.display = "none";
			}
			else{
				ele.style.display ="block";
			}
		}
		</script>

		<?php
echo'
<div class="postsforuser" style="margin-top:20px;width:57%;margin-left:280px;padding-bottom:20px;">
<div id="profile_pictures">
<img src='.$profilepic_info.' width="60" height="60" style="border:1px solid #ccc;">
</div>
<div id="nameofuser" style="margin-top:-60px;">
<a href="profile.php?profile_id='.$user_name_id.'" style="padding-left:70px;color:#045dad;font-size:15px;font-weight:bold;text-decoration:none;">'.$username_from.'</a></div>
<div id="msg-cont" style="padding-left:70px;padding-top:10px;">
<p style="word-wrap:break-line;">'.$body.'</p>
</div>
<div id="like-options" style="padding-top:20px">
<input type="submit" name="like" value="Like" title="Like" style="background:#fff;text-decoration:none;border:none;outline:none;color:#045dad;margin-left:70px;font-size:15px;cursor:pointer">
<a href="#" onclick="javascript:toggle'.$id.'()" style="color:#045dad;text-decoration:none;font-size:14px;font-weight:none;margin-left:20px;">Commments</a>
<a href="#"  style="color:#045dad;text-decoration:none;font-size:14px;font-weight:none;margin-left:20px;">Share</a></form></div></div>

<div id="toggleComment'.$id.'" style="display:none;background:#f2f2f2;;padding:10px;width:50%;margin-left:350px;">
<h1  style="color:#045dad">Comments</h1>
<hr style="margin-top:5px;margint-bottom:5px;">   
<p style="font-weight:bold;margin-top:10px;">
</p>
</div>
<hr style="margin-top:5px;width:57%;margin-left:280px;"> ';
}
?>

<?php
$comment=strip_tags(@$_POST['comment']);
$button=@$_POST['postcomment'.$id.''];
$posted_to="6";
if($button){
	if($comment=''){
		
	}
	else{
		mysql_query("INSERT INTO post_comments VALUES('','$post_body','$user','$posted_to','0','$id')");
	}
}
?>

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
<a href="create-album.php?profile_id=<?php echo $user;?>">View photos of me</a><hr>
<a href="upload-videos.php?profile_id=<?php echo $user;?>">View videos of me</a><hr>
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
