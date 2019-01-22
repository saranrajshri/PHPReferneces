
<?php include("./inc/header.inc.php");?>
<?php include("./inc/script.inc.php");?>
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

<img src="./img/01.jpg" width="815" height="315" style="margin-left:250px;margin-top:10px;border:5px solid #f2f2f2;border-radius:5px">
<img src="<?php echo './userdata/profile_pics/'.$typ_profile_pic.'';?>" width="180" height="180" style="margin-left:-800px;position:absolute;top:240px" class="gov"> 
<div id="yourname">
<h1 style="font-size:30px;color:#fff;margin-left:470px;margin-top:-140px;"><?php echo $typ_user_name;?></h1>
</div>

<?php
$e_check = mysql_query("SELECT * FROM friend_requests WHERE user_from='$user' AND user_to='$username'");
$email_check= mysql_num_rows($e_check);
if ($email_check!=0) {
echo'<input type="submit" value="Request Sent" name="none" class="button default" style="position:absolute;left:800px;top:356px">';
}
?> 
<?php
if (isset($_POST['addfriend'])) {
mysql_query("INSERT INTO friend_requests VALUES('','$user','$username','$log_user_name','$typ_user_name','$log_profile_pic','$typ_profile_pic')");
echo'<input type="submit" value="Request Sent" name="none" class="button default" style="position:absolute;left:800px;top:356px">';
}
?>
<?php
$check_pic=mysql_query("SELECT profile_pic FROM users WHERE id='$username' ");
$get_pic_row = mysql_fetch_assoc($check_pic);
$profile_pic_db = $get_pic_row['profile_pic'];
if ($profile_pic_db == "") {
$profile_pic = "img/default.jpg";
}
else
{
$profile_pic = "userdata/profile_pics/".$profile_pic_db;

}
?>     
			<?php
			if ($user!=$username){
			echo'
			<div id="jh" style="margin-left:800px;margin-top:50px">
			<form action="#" method="post">
			
				<input type="submit" value="Add Friend " name="addfriend" class="button default" style="margin-left:10px;margin-top:10px">
				<input type="submit" value="Send Message ..." name="add-friend" class="button default" style="margin-left:10px;margin-top:-27px">
				</form>
				
				<a href="profile.php?profile_id='.$username.'" class="button blue" style="margin-top:20px;margin-left:-250px">View posts of '.$typ_user_name.'</a>
				<a href="view-videos-of-user.php?ptofile_id='.$username.'" class="button blue" style="margin-top:20px">View shared videos of '.$typ_user_name.'</a>
				</div>
			';}
			else{
				echo'<form action="#" method="post"></form>
					<div id="lk" style="margin-left:720px;margin-top:50px">
					<a href="#" class="button default" style="margin-right:10px;">Edit my profile</a>
					<a href="#" class="button default" style="margin-right:10px;">Activity log</a>
					<a href="#" class="button default" style="margin-right:10px;">Friends List</a>
					</div>
<div id="cover-pic" style="">
<input type="submit" class="button default" name="cover-pic" value="Update your cover picture ...." style="position:absolute;top:100px;left:850px">
</div>
					';
			}
//remove friend code
if  (@$_POST['removefriend']) {
$add_friend_check = mysql_query("SELECT friend_array FROM users WHERE id='$user'");
$get_friend_row = mysql_fetch_assoc($add_friend_check);
$friend_array = $get_friend_row['friend_array'];
$friend_array_explode = explode(",",$friend_array);
$friend_array_count = count($friend_array_explode);
////////////////////////////////////////////////////////////////////////////////////////////////
$add_friend_check_username = mysql_query("SELECT friend_array FROM users WHERE id='$username'");
$get_friend_row_username = mysql_fetch_assoc($add_friend_check_username);
$friend_array_username = $get_friend_row_username['friend_array'];
$friend_array_explode_username = explode(",",$friend_array_username);
$friend_array_count_username = count($friend_array_explode_username);
////////////////////////////////////////////////////////////////////////////////////////////////
$usernameComma = ",".$username;
$usernameComma2= $username.",";

$userComma = ",".$user;
$userComma2= $user.",";
/////////////////////////////////////////////////////////////////////////////////////////////////
if(strstr("$friend_array","$usernameComma")) {
$friend1 = str_replace("$usernameComma","","$friend_array");
}
else
if(strstr("$friend_array","$usernameComma2")) {
$friend1 = str_replace("$usernameComma2","","$friend_array");
}
else
if(strstr("$friend_array","$username")) {
$friend1 = str_replace("$username","","$friend_array");
}
///////////////////////////////////////////////////////////////////////////////////////////////
if(strstr("$friend_array","$userComma")) {
$friend2 = str_replace("$userCmoma","","$friend_array");
}
else
if(strstr("$friend_array","$userComma2")) {
$friend2 = str_replace("$userComma2","","$friend_array");
}
else
if(strstr("$friend_array","$user")) {
$friend2 = str_replace("$user","","$friend_array");
}
$friend2="";
$removeFriendQuery = mysql_query("UPDATE users SET friend_array='$friend1' WHERE id='$user'");
$removeFriendQuery_username = mysql_query("UPDATE users SET friend_array='$friend2' WHERE id='$username'");
}



?>

			<?php
					$friendsArray="";
					$countFriends="";
					$friendsArray12="";
					$addAsFriend="";
					$selectFriendsQuery=mysql_query("SELECT friend_array FROM users WHERE id='$username'");
					$friendRow= mysql_fetch_assoc($selectFriendsQuery);
					$friendArray= $friendRow['friend_array'];
					if ($friendArray != "") {
					$friendArray = explode(",",$friendArray);
					$countFriends= count($friendArray);
				$friendArray12 = array_slice($friendArray, 0 , 12);
					
					
					$i= 0;
					if (in_array($user,$friendArray)) {
					echo'
				<form action="profile.php?profile_id='.$username.' " method="post">
					<input type="submit" name="removefriend" value="Unfriend" style="
position:absolute;
top:356px;
left:810px;width:6%;" class="button blue">
</form>';
					}
					
					else
					{
					}
				
				
					}
				?>
				<?php
if (isset($_FILES['profilepic'])) {
if (((@$_FILES["profilepic"] ["type"]=="image/jpeg") || (@$_FILES["profilepic"] ["type"]=="image/png") || (@$_FILES["profilepic"] ["type"]=="image/gif")) && (@$_FILES['profilepic'] ['size'] <1048576))//
{
$chars ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
$rand_dir_name = substr(str_shuffle($chars),0,15);
mkdir("userdata/shared_pics/$rand_dir_name");
if (file_exists("userdata/shared_pics/$rand_dir_name/".@$_FILES["profilepic"] ["name"]))
{
echo @$_FILES["profilepic"] ["name"]."Already exists";
}
else
{
move_uploaded_file (@$_FILES["profilepic"] ["tmp_name"],"userdata/shared_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"]);
$profile_pic_name= @$_FILES["profilepic"]["name"];
mysql_query("INSERT INTO shared_photos VALUES ('','$user','$username','$log_user_name','$typ_user_name','$rand_dir_name/$profile_pic_name','$log_profile_pic','$typ_profile_pic')");

}
}
else
{
echo'<div id="msgPopContainer" style="position:absolute;top:80px;" class="msgPopContainerSmall msgPopContainerOverflow msgPop-top-right"><div id="msgPop5" role="alert" title="message" class="msgPopMessage " style="display: block;"><div class="outerMsgPopTbl"><div class="innerMsgPopTbl"><div class="msgPopTable"><div class="msgPopTable-cell msgPopSpacer">&nbsp;</div><div class="msgPopTable-cell"><div class="msgPopTable-table"><div class="msgPopTable-cell" id="msgPopIconCell"><i class="fa fa-info-circle"></i></div><div class="msgPopTable-cell"><center><p style="color:#fff;font-weight:bold;font-size:15px">Plese choose a file!</p></center></div></div></div><div class="msgPopTable-cell msgPop-align-right msgPopSpacer msgPopCloseCell" id="msgPop5CloseBtn"><a class="msgPopCloseLnk" title="Close" onclick="MsgPop.close("msgPop5")"><i class="fa fa-times"></i></a></div></div></div></div></div><div id="msgDivMore" class="msgPopLoadMore" style="display: none;"><span onclick="javascript:MsgPop.showMoreMessages();">=== Load More Messages ===</span></div><div type="button" id="msgPopCloseAllBtn" onclick="MsgPop.closeAll()" style="display: none;">Close All Messages</div></div>';
}
}
?>
<form action="#" method="post" enctype="multipart/form-data">
<div class="arrow_box" style="height:200px;border:1px solid #ccc;">
<center><h1 style="color:#045dad">Post some photos on <?php echo $typ_user_name;?>'s Wall</h1></center>
<hr style="width:100%;margin-left:0px;margin-top:10px;">
<center><h1 style="padding-bottom:10px;">Click here to add photos and click the post button</h1></center>
<center><label for ="add" id="hoov"><img src="./img/more.gif" style="padding:10px;border:1px dashed #ccc" title="Click to add photos" width="80" height="80" ></label></center>
<input type="file" name="profilepic" style="margin-left:280px;margin-top:10px;display:none" id="add">
<input type="submit" name="post_sub"  style="width:100%;margin-top:10px" value="Post" class="button blue">
</div>
</form>
<hr style="width:56.5%;margin-left:280px;margin-top:10px;">
<?php
$getinfo=mysql_query("SELECT * FROM shared_photos WHERE username_id='$username' ORDER BY id DESC LIMIT 10");
while($get=mysql_fetch_array($getinfo)){
	$username_from=$get['username'];
	$id=$get['id'];
	$user_id=$get['user_id'];
	$username_id=$get['username_id'];
	$username_n=$get['username'];
	$user_name=$get['user_name'];

	$user_pic=$get['user_pic'];
	$username_pic=$get['username_pic'];
	$url=$get['url'];
echo'
<div class="postsforuser" style="margin-top:20px;width:57%;margin-left:280px;padding-bottom:20px;">
<div id="profile_pictures">
<img src=userdata/profile_pics/'.$username_pic.' width="60" height="60" style="border:1px solid #ccc;">
</div>
<div id="nameofuser" style="margin-top:-60px;">
<a href="profile.php?profile_id='.$username_id.'" style="padding-left:70px;color:#045dad;font-size:15px;font-weight:bold;text-decoration:none;">'.$user_name.'</a>
</div>
<div id="msg-cont" style="padding-left:70px;padding-top:10px;">
<img src="./userdata/shared_pics/'.$url.'" title='.$url.' width="300" height="300" style="border:1px solid #f2f2f2;margin-left:20px">
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
<!--right-->
				<div class="rightside" style="margin-top:-150px;">
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


<div class="leftsidepart" style="margin-top:20px;margin-left:-20px">
<div id="op">
<a href="#">View photos of <?php echo $typ_user_name;?></a><hr>
<a href="#">View videos of <?php echo $typ_user_name;?></a><hr><hr>
</div><br>
<div id="information">
<div id="information-header">
<h1>About <?php echo $typ_user_name;?></h1>
</div>
<div id="information-body">
<?php 
$re=mysql_query("SELECT bio FROM users WHERE id='$username'");
while($run=mysql_fetch_array($re)){
	$bio=$run['bio'];
}
echo'<p style="font-size:12px;font-weight:bold;padding:10px">'.$bio.'</p>';
?>
</div>
</div><div id="information">
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
<p class="bo"><?php echo $day . $month . $year ;?></p>
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
<div id="cont2" style="width:22%;height:300px;margin-top:-500px;;background:#fefefe;position:fixed;margin-left:780px;margin-top:-460px;">
<div id="cont-header2" style="padding-bottom:5px;">
<h1><?php echo $log_user_name;?>'s Online Friends</h1>
</div>
<div id="cont-body2">
</div>
</div>
