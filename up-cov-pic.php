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
	$friendcoverpic=$getFriendRow['profile_pic'];

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
//
$check_pic=mysql_query("SELECT cover_pic FROM users WHERE id='$user' ");
$get_pic_row = mysql_fetch_assoc($check_pic);
$cover_pic_db = $get_pic_row['cover_pic'];
if ($cover_pic_db == "") {
$cover_pic = "img/01.jpg";
}
else
{
$cover_pic = "./userdata/cover_pics/".$cover_pic_db;

}
//
if (isset($_FILES['coverpic'])) {
if (((@$_FILES["coverpic"] ["type"]=="image/jpeg") || (@$_FILES["coverpic"] ["type"]=="image/png") || (@$_FILES["coverpic"] ["type"]=="image/gif")) && (@$_FILES['coverpic'] ['size'] <1048576))//
{
$chars ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
$rand_dir_name = substr(str_shuffle($chars),0,15);
mkdir("userdata/cover_pics/$rand_dir_name");
if (file_exists("userdata/cover_pics/$rand_dir_name/".@$_FILES["coverpic"] ["name"]))
{
echo @$_FILES["coverpic"] ["name"]."Already exists";
}
else
{
move_uploaded_file (@$_FILES["coverpic"] ["tmp_name"],"userdata/cover_pics/$rand_dir_name/".@$_FILES["coverpic"]["name"]);
$cover_pic_name= @$_FILES["coverpic"]["name"];
$cover_pic_query = mysql_query ("UPDATE users SET cover_pic='$rand_dir_name/$cover_pic_name'WHERE id='$user' ");
echo'<div id="msgPopContainer" style="position:absolute;top:80px;" class="msgPopContainerSmall msgPopContainerOverflow msgPop-top-right"><div id="msgPop5" role="alert" title="message" class="msgPopMessage " style="display: block;"><div class="outerMsgPopTbl"><div class="innerMsgPopTbl"><div class="msgPopTable"><div class="msgPopTable-cell msgPopSpacer">&nbsp;</div><div class="msgPopTable-cell"><div class="msgPopTable-table"><div class="msgPopTable-cell" id="msgPopIconCell"><i class="fa fa-info-circle"></i></div><div class="msgPopTable-cell"><center><p style="color:#fff;font-weight:bold;font-size:15px">Photo updated successfully! . Check your profile page</p></center></div></div></div><div class="msgPopTable-cell msgPop-align-right msgPopSpacer msgPopCloseCell" id="msgPop5CloseBtn"><a class="msgPopCloseLnk" title="Close" onclick="MsgPop.close("msgPop5")"><i class="fa fa-times"></i></a></div></div></div></div></div><div id="msgDivMore" class="msgPopLoadMore" style="display: none;"><span onclick="javascript:MsgPop.showMoreMessages();">=== Load More Messages ===</span></div><div type="button" id="msgPopCloseAllBtn" onclick="MsgPop.closeAll()" style="display: none;">Close All Messages</div></div>';

}
}
else
{
echo'<div id="msgPopContainer" style="position:absolute;top:80px;" class="msgPopContainerSmall msgPopContainerOverflow msgPop-top-right"><div id="msgPop5" role="alert" title="message" class="msgPopMessage " style="display: block;"><div class="outerMsgPopTbl"><div class="innerMsgPopTbl"><div class="msgPopTable"><div class="msgPopTable-cell msgPopSpacer">&nbsp;</div><div class="msgPopTable-cell"><div class="msgPopTable-table"><div class="msgPopTable-cell" id="msgPopIconCell"><i class="fa fa-info-circle"></i></div><div class="msgPopTable-cell"><center><p style="color:#fff;font-weight:bold;font-size:15px">Plese choose a file!</p></center></div></div></div><div class="msgPopTable-cell msgPop-align-right msgPopSpacer msgPopCloseCell" id="msgPop5CloseBtn"><a class="msgPopCloseLnk" title="Close" onclick="MsgPop.close("msgPop5")"><i class="fa fa-times"></i></a></div></div></div></div></div><div id="msgDivMore" class="msgPopLoadMore" style="display: none;"><span onclick="javascript:MsgPop.showMoreMessages();">=== Load More Messages ===</span></div><div type="button" id="msgPopCloseAllBtn" onclick="MsgPop.closeAll()" style="display: none;">Close All Messages</div></div>';
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
<!--center part-->
<div id="cont" style="width:57%;margin-left:280px;margin-top:20px">
<div id="cont-header">
<center><h1>Update your cover picture</h1></center>
</div>
<div id="cont-body" style="border:1px solid #ccc;boder-top:1px solid #045dad;padding:10px;">
<form action="#" method="post" enctype="multipart/form-data"> 
<center><img src="<?php echo $cover_pic;?>" width="510" height="320"></center><br>
<center><input type="file" style="padding-left:50px" name="coverpic"></center><br>
<center><input type="submit" name="upload" class="button blue" style="margin-left:0px;width:20%;"></center>
</form>
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
<img src="<?php echo $profile_pic;?>" style="border:1px solid #ccc" width="200" height="200">
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
	$friendcoverpic=$getFriendRow['profile_pic'];
	if($friendcoverpic==""){
		echo"<a href=profile.php?profile_id=$friendId><img src='./img/default.jpg'  height='60' width='60' alt='$friendUsername' title='$friendUsername'></a>";
		
		
	}
	else
	{
		echo"<a href=profile.php?profile_id=$friendId><img src='./userdata/profile_pics/$friendcoverpic'  height='60' width='60' alt='$friendUsername' title='$friendUsername'></a>";
	}
}
}
else{echo '<h1 style="padding-top:10px;">'.$typ_user_name.' has no friends</h1>';}
?>
</div>
</div>
</div>
<h1 style="position:absolute;font-size:27px;color:#000;top:80px;left:280px;"><?php echo $log_user_name;?></h1>
