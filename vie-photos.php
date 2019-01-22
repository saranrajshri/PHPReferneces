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




<div class="cont" style="margin-top:40px;width:58%;">
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
