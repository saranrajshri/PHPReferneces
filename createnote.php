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



<div class="header2">
<div id="cr">
<a href="home.php?profile_id=<?php echo $user;?>">Wall</a>
<a href="home-info.php?profile_id=<?php echo $user;?>">Info</a>
<a href="home-photos.php?profile_id=<?php echo $user;?>">Photos</a>
<a href="home-boxes.php?profile_id=<?php echo $user;?>">Boxes</a>
<a href="home-notes.php?profile_id=<?php echo $user;?>" class="active">Notes</a>
<a href="home-videos.php?profile_id=<?php echo $user;?>">Videos</a>
<a href="home-more.php?profile_id=<?php echo $user;?>">More</a>
</div>
</div>
<div class="cont" style="width:57%;;"> 
<div id="cont-header">
<center><h1>Notes by <?php echo $log_user_name; ?></h1></center>
</div>
<form action="#" method="post">
<div id="cont-body" style="padding:10px;background:#fff">
<p>What you planned..? :  <input type="text" name="notef" placeholder="Enter what you planned" style="padding:5px;font-size:15px;background:#f2f2f2;border:1px solid #ccc;width:300px;margin-left:50px"></p>
<center><input type="submit" name="note" class="button blue"/></center>
</form>
<br><hr>
<?php
$get=mysql_query("SELECT * FROM notes WHERE user_id='$user'");
while($run=mysql_fetch_array($get)){
	$message=$run['message'];
	$user_from=$run['user_name'];
	$user_id=$run['user_id'];
	echo'
	<img src="./img/events.png" width="20" height="20" style="margin-left:5px;margin-top:5px;"><a href="profile.php?profile_id='.$user_id.'" style="margin-left:5px;font-size:15px;text-decoration:none;font-weight:bold">'.$user_from.'</a> <i style="margin-left:5px;font-size:15px;font-weight:bold"> planned to '.$message.'</i>
	
	<br>';
}

?>
</div>
</div>
<?php
$note=@$_POST['note'];
$date=date("y-m-d");
$message=strip_tags(@$_POST['notef']);
if($note){
	if($message==''){
		
	}
	else{
		mysql_query("INSERT INTO notes VALUES('','$user','$log_user_name','$message','$date')");
echo'<div id="msgPopContainer" style="position:absolute;top:80px;" class="msgPopContainerSmall msgPopContainerOverflow msgPop-top-right"><div id="msgPop5" role="alert" title="message" class="msgPopMessage " style="display: block;"><div class="outerMsgPopTbl"><div class="innerMsgPopTbl"><div class="msgPopTable"><div class="msgPopTable-cell msgPopSpacer">&nbsp;</div><div class="msgPopTable-cell"><div class="msgPopTable-table"><div class="msgPopTable-cell" id="msgPopIconCell"><i class="fa fa-info-circle"></i></div><div class="msgPopTable-cell"><center><p style="color:#fff;font-weight:bold;font-size:15px">Your note created successfully!</p></center></div></div></div><div class="msgPopTable-cell msgPop-align-right msgPopSpacer msgPopCloseCell" id="msgPop5CloseBtn"><a class="msgPopCloseLnk" title="Close" onclick="MsgPop.close("msgPop5")"><i class="fa fa-times"></i></a></div></div></div></div></div><div id="msgDivMore" class="msgPopLoadMore" style="display: none;"><span onclick="javascript:MsgPop.showMoreMessages();">=== Load More Messages ===</span></div><div type="button" id="msgPopCloseAllBtn" onclick="MsgPop.closeAll()" style="display: none;">Close All Messages</div></div>';

		}
}
?>
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