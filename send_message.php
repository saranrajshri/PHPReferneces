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
<?php
					$friendsArray="";
					$countFriends="";
					$friendsArray12="";
					$addAsFriend="";
					$selectFriendsQuery=mysql_query("SELECT friend_array FROM users WHERE id='$user'");
					$friendRow= mysql_fetch_assoc($selectFriendsQuery);
					$friendArray= $friendRow['friend_array'];
					if ($friendArray != "") {
					$friendArray = explode(",",$friendArray);
					$countFriends= count($friendArray);
				$friendArray12 = array_slice($friendArray, 0 , 12);
					
					
					$i= 0;
					if (in_array($user,$friendArray)) {
					
					}
					
					else
					{
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

<div class="cont" style="width:57%;">
<div id="cont-header">
<center><h1>Chat with <?php echo $typ_user_name;?></h1></center>
</div>
<div id="cont-body" style="pading:10px;height:0px;">

<?php
$send=strip_tags(@$_POST['send']);
$sendmsg=@$_POST['sendmsg'];
$date=date("y-m-d");
if($sendmsg){
if($send){
		mysql_query("INSERT INTO messages VALUES('','$user','$username','$log_user_name','$typ_user_name','$send','$date','no')");

}
else{
}
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
