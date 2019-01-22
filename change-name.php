<?php include("./inc/header.inc.php");?>
<?php include("./inc/script.inc.php");?>
<?php
$updateinfo = @$_POST['updateinfo'];
if ($updateinfo) {
$firstname= strip_tags(@$_POST['fname']);
$lastname=strip_tags(@$_POST['lname']);
$new_name=$firstname . $lastname;

if (strlen($firstname)<3 ) {
echo'<div id="msgPopContainer" style="position:absolute;top:80px;" class="msgPopContainerSmall msgPopContainerOverflow msgPop-top-right"><div id="msgPop5" role="alert" title="message" class="msgPopMessage " style="display: block;"><div class="outerMsgPopTbl"><div class="innerMsgPopTbl"><div class="msgPopTable"><div class="msgPopTable-cell msgPopSpacer">&nbsp;</div><div class="msgPopTable-cell"><div class="msgPopTable-table"><div class="msgPopTable-cell" id="msgPopIconCell"><i class="fa fa-info-circle"></i></div><div class="msgPopTable-cell"><center><p style="color:#fff;font-weight:bold;font-size:15px;">Your first name is too short</p></center></div></div></div><div class="msgPopTable-cell msgPop-align-right msgPopSpacer msgPopCloseCell" id="msgPop5CloseBtn"><a class="msgPopCloseLnk" title="Close" onclick="MsgPop.close("msgPop5")"><i class="fa fa-times"></i></a></div></div></div></div></div><div id="msgDivMore" class="msgPopLoadMore" style="display: none;"><span onclick="javascript:MsgPop.showMoreMessages();">=== Load More Messages ===</span></div><div type="button" id="msgPopCloseAllBtn" onclick="MsgPop.closeAll()" style="display: none;">Close All Messages</div></div>';
}
else
if (strlen($lastname)<3 ) {
echo'<div id="msgPopContainer" style="position:absolute;top:80px;" class="msgPopContainerSmall msgPopContainerOverflow msgPop-top-right"><div id="msgPop5" role="alert" title="message" class="msgPopMessage " style="display: block;"><div class="outerMsgPopTbl"><div class="innerMsgPopTbl"><div class="msgPopTable"><div class="msgPopTable-cell msgPopSpacer">&nbsp;</div><div class="msgPopTable-cell"><div class="msgPopTable-table"><div class="msgPopTable-cell" id="msgPopIconCell"><i class="fa fa-info-circle"></i></div><div class="msgPopTable-cell"><center><p style="color:#fff;font-weight:bold;font-size:15px;">Your last name is too short</p></center></div></div></div><div class="msgPopTable-cell msgPop-align-right msgPopSpacer msgPopCloseCell" id="msgPop5CloseBtn"><a class="msgPopCloseLnk" title="Close" onclick="MsgPop.close("msgPop5")"><i class="fa fa-times"></i></a></div></div></div></div></div><div id="msgDivMore" class="msgPopLoadMore" style="display: none;"><span onclick="javascript:MsgPop.showMoreMessages();">=== Load More Messages ===</span></div><div type="button" id="msgPopCloseAllBtn" onclick="MsgPop.closeAll()" style="display: none;">Close All Messages</div></div>';
}
else
{
$info_submit_query = mysql_query("UPDATE users SET firstname='$firstname'  , lastname='$lastname',username='$new_name' WHERE id='$user' ");
echo'<div id="msgPopContainer" style="position:absolute;top:80px;" class="msgPopContainerSmall msgPopContainerOverflow msgPop-top-right"><div id="msgPop5" role="alert" title="message" class="msgPopMessage " style="display: block;"><div class="outerMsgPopTbl"><div class="innerMsgPopTbl"><div class="msgPopTable"><div class="msgPopTable-cell msgPopSpacer">&nbsp;</div><div class="msgPopTable-cell"><div class="msgPopTable-table"><div class="msgPopTable-cell" id="msgPopIconCell"><i class="fa fa-info-circle"></i></div><div class="msgPopTable-cell"><center><p style="color:#fff;font-weight:bold;font-size:15px;">Your username is changed successfully!</p></center></div></div></div><div class="msgPopTable-cell msgPop-align-right msgPopSpacer msgPopCloseCell" id="msgPop5CloseBtn"><a class="msgPopCloseLnk" title="Close" onclick="MsgPop.close("msgPop5")"><i class="fa fa-times"></i></a></div></div></div></div></div><div id="msgDivMore" class="msgPopLoadMore" style="display: none;"><span onclick="javascript:MsgPop.showMoreMessages();">=== Load More Messages ===</span></div><div type="button" id="msgPopCloseAllBtn" onclick="MsgPop.closeAll()" style="display: none;">Close All Messages</div></div>';
}
}
else
{
//
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
<center><h1>Change your account name</h1></center>
</div>
<div id="cont-body" style="border:1px solid #ccc;boder-top:1px solid #o45dad;padding:10px;">
<div id="pass-fields">
<center>
<form action="#" method="post">
<input type="text" name="fname" placeholder="<?php echo $log_first_name;?>"/>
<input type="text" name="lname" placeholder="<?php echo $log_last_name;?>"/><br><br>
<input type="submit" name="updateinfo" id="updateinfo" value="Save Changes" class="button blue" />
</form>
</div>
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
