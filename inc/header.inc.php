<?php include("./inc/connect.inc.php");?>
<?php
session_start();
if (isset($_SESSION['user_login'])) {
$log_user_name=$_SESSION['user_login'];
$coverpicposts=mysql_query("SELECT * FROM users WHERE email='$log_user_name'") or die (mysql_error);
while($row = mysql_fetch_assoc($coverpicposts)) {
$user=$row['id'];
$log_user_name=$row['username'];
$log_first_name=$row['firstname'];
$log_last_name=$row['lastname'];
$log_email=$row['email'];
$db_password=$row['password'];
$log_profile_pic=$row['profile_pic'];
$log_cover_pic=$row['cover_pic'];
$sign_up_date=$row['sign_up_date'];
$last_update=date("Y-m-d");
$networks=$row['networks'];
$hometown=$row['hometown'];
$current_city=$row['current_city'];
$interests=$row['interests'];
$fav_quotations=$row['fav_quotations'];
$bio=$row['bio'];
$website=$row['website'];
$r_status=$row['r_status'];
$high_school=$row['high_school'];
$employer=$row['employer'];
$location=$row['location'];
$gender_pivacy=$row['dob_privacy'];
$day=$row['date'];
$month=$row['month'];
$year=$row['year'];
$gender=$row['gender'];
$dob= $day . $month . $year;
$interested_in=$row['interested_in'];
}
}
else
{
$user="";
}
?>
<?php
$friendRequests= mysql_query("SELECT * FROM friend_requests WHERE user_to ='$user' ");
$numrows = mysql_fetch_assoc($friendRequests);
$num_rows= mysql_num_rows($friendRequests);
if($num_rows==0){
	$num_rows='';
}
else{
$num_rows =  '<div id="red"><p style="color:#fff;background:red;padding:5px;position:absolute;top:15px;left:330px;border-radius:5px;">'.$num_rows.'</p></div>';
	
}
?>

<?php
$notifications= mysql_query("SELECT * FROM friends_notifications WHERE to_id ='$user' ");
$numrow = mysql_fetch_assoc($notifications);
$num_row= mysql_num_rows($notifications);
if($num_row==0){
	$num_row='';
}
else{
$num_row =  '<div id="red"><p style="color:#fff;background:red;padding:5px;position:absolute;top:15px;left:385px;border-radius:5px;">'.$num_row.'</p></div>';
	
}
?>

<?php
$messages= mysql_query("SELECT * FROM messages WHERE user_to ='$user' ");
$numro = mysql_fetch_assoc($messages);
$num_ro= mysql_num_rows($messages);
if($num_ro==0){
	$num_ro='';
}
else{
$num_ro =  '<div id="red"><p style="color:#fff;background:red;padding:5px;position:absolute;top:15px;left:450px;border-radius:5px;">'.$num_ro.'</p></div>';
	
}
?>
<?php
$check_pic=mysql_query("SELECT profile_pic FROM users WHERE id='$user' ");
$coverpic_pic_row = mysql_fetch_assoc($check_pic);
$profile_pic_db = $coverpic_pic_row['profile_pic'];
if ($profile_pic_db =='') {
$profile_pic = "./img/default.jpg";
}
else
{
$profile_pic = "./userdata/profile_pics/".$profile_pic_db;

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
				
<html>
<head>
<?php
if (!isset($_SESSION["user_login"])){echo'<title>Jumbonetwork - Login or Signup</title>';} else {echo '<title>';echo $log_user_name; echo'</title>';} ?>
<link rel="stylesheet" type="text/css" href="./css/main.css">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/homepage.css">
<link rel="stylesheet" type="text/css" href="./css/notification.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="./js/script.js"></script>
<script src="http://code.jquery.com/jquery-2.1.0-rc1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.js"></script>
<script src="./js/index.js"></script>
</head>
<?php 
if (!isset($_SESSION["user_login"])){
echo'<body class="background" style="overflow-x:hidden;background:linear-gradient(to bottom right,white,#bcbdc4;);">';
}
else{
echo'<body class="background" style="overflow-x:hidden;background:#fff">';	
}
?>
<div id="checkbox">
<?php
if (!isset($_SESSION["user_login"])){
echo'
<input type="checkbox" name="keepmeloggedin" value="Keep me logged in" checked="checked" style="position:absolute;top:75px;right:500px;"><p style="color:#ffffff;font-size:12px;font-family:helvetica;position:absolute;top:75px;right:395px;">Keep me logged in</p>';}else{}?>
</div>
<div id="headerx">
</div>
<?php
if (!isset($_SESSION["user_login"])){
echo'
<div class="headermenu">
<div id="wrapper">
<div id="logo">
<a href="http://www.jumbonetwork.pixub.com" title="Jumbonetwork" style="position:absolute;top:10px;left:20px;"><img src="./img/jumbonetwork.png" width="320" height="50" ></a>
</div>
</div>
</div>';
}
else{
	echo'
	<div class="headermenu" style="height:65px;border-bottom-left-radius:30px;border-bottom-right-radius:30px;">
<div id="wrapper">
<div id="logo">
<a href="http://www.jumbonetwork.pixub.com/home.php" title="Jumbonetwork"><img src="./img/jumbonetwork.png" width="200" height="30" style="position:absolute;top:5px;"></a>
</div>
</div>
</div>';
}
?>
<?php
$search=@$_POST['search'];
$name=strip_tags(@$_POST['profile_id']);
if ($search){
	if($name==''){
		
	}
	else
	{
		header("location:search.php?name=$name");
	}
}
?>
<?php
if (!isset($_SESSION["user_login"])){

echo'
<div class="menu" style="position:absolute;">
<a href="#" class="email">Email ID</a>
<a href="#" class="pass">Password</a>
<form action="#" method="post">
<input type="text" name="user_login" style="text-indent:5px;">
<input type="password" name="password_login" style="text-indent:5px;">
</div>
<div id="options" style="position:absolute;">
<a href="#">Forgotten your Password..?</a>
<div id="facebook-login-btb">
<input type="submit" name="login" value="Login" class="button red" style="position:absolute;right:10px;">
</form>
</div>
</div>';
}
else
{
$search_box=strip_tags(@$_POST['search_box']);
echo'
<div id="white-background">
</div>
<div id="dlgbox">
<div id="dlgbox-header"><center><p style="font-size:20px;color:#fff;padding:5px;">You are logged out</p></center></div>
<div id="dlgbox-body">
<p style="font-size:15px;color:#000;">Thank you for using jumbonetwork</p>
</div>
<div id="dlgbox-footer">
<button onclick="dlgLogin()">Close</button>
</div>
</div>
<script>
function dlgLogin2(){
var dlg =   document.coverpicElementById("dlgbox2");
whitebg.style.display = "none";
dlg.style.display ="none"; 
}
function showDialog2(){
var whitebg = document.coverpicElementById("white-background2");
var dlg =   document.coverpicElementById("dlgbox2");
whitebg.style.display = "block";
dlg.style.display ="block"; 
var winWidth = window.innerWidth;
var winHeight = window.innerHeight;

dlg.style.left = (winWidth/2) - 480/2 + "px";
dlg.sstylle.top = "150px";
}
</script>
<script>
function dlgLogin(){
var whitebg = document.coverpicElementById("white-background");
var dlg =   document.coverpicElementById("dlgbox");
whitebg.style.display = "none";
dlg.style.display ="none"; 
}
function showDialog(){
var whitebg = document.coverpicElementById("white-background");
var dlg =   document.coverpicElementById("dlgbox");
whitebg.style.display = "block";
dlg.style.display ="block"; 
var winWidth = window.innerWidth;
var winHeight = window.innerHeight;

dlg.style.left = (winWidth/2) - 480/2 + "px";
dlg.sstylle.top = "150px";
}
</script>
<script>
function dlgLogin0(){
var whitebg = document.coverpicElementById("white-background0");
var dlg =   document.coverpicElementById("dlgbox0");
whitebg.style.display = "none";
dlg.style.display ="none"; 
}
function showDialog0(){
var whitebg = document.coverpicElementById("white-background0");
var dlg =   document.coverpicElementById("dlgbox0");
whitebg.style.display = "block";
dlg.style.display ="block"; 
var winWidth = window.innerWidth;
var winHeight = window.innerHeight;

dlg.style.left = (winWidth/2) - 480/2 + "px";
dlg.sstylle.top = "150px";
}
</script>
<div class="menu" style="position:absolute;">
<div id="images-a">
<a href="home.php?profile_id='.$user.'" style="position:absolute;right:-20px;"><img src="./img/home.png"  width="35" height="35"></a>
<a href="home.php?profile_id='.$user.'" style="position:absolute;right:-20px;"><img src="./img/home.png"  width="35" height="35"></a>
<a href="friend_requests.php" title="Friend requests" style="position:absolute;right:-80px;"><img src="./img/add-friend.png" width="40" height="40"></a>
<a href="notifications.php" title="Notifications" style="position:absolute;right:-140px;" ><img src="./img/notifications.png" width="40" height="40"></a>
<a href="messages.php" title="Messages" style="position:absolute;right:-200px;"><img src="./img/cloud_comment.png" width="40" height="40"></a>
<a href="logout.php" onclick="showDialog()" style="position:absolute;right:200px;top:-20px;font-size:18px;color:#fff;text-decoration:none;font-weight:bold;">Logout</a>
<a href="acsettings.php" style="position:absolute;right:290px;top:-20px;font-size:18px;color:#fff;text-decoration:none;font-weight:bold;">Settings</a>
<a href="profile.php?profile_id='.$user.'" style="position:absolute;right:390px;top:-20px;font-size:18px;color:#fff;text-decoration:none;font-weight:bold;">Profile</a>
</div>
<form action="#" method="post">
<div id="box" style="position:absolute;top:-25px;right:-30px;">
<input type="text" name="profile_id" id="search_box" style="padding:5px;margin-top:0px;width:200px;border:1px solid #045dad;background:#f2f2f2;text-indent:5px;" placeholder="Enter your friend name">
<input type="submit" name="search" value="Search" style="position:absolute;top:1px;right:-46px;padding:6px;cursor:pointer;background:#6484b4;border:1px solid #6484b4;color:#fff;font-weight:bold;opacity:1.9;height:28px;">
</div>
</form>
</div>
<div id="fix" style="background:#ccc;height:30px;border-top-left:radius:10px;position:fixed;top:640px;width:65%;margin-left:240px;border-top:1px solid #f2f2f2;border-top-right:10px;">
<a href="home.php?profile_id='.$user.'"><img src="./img/wall post.png" width="20" height="20" style="margin-top:4px;margin-left:80px"></a>
<a href="#"><img src="./img/mypages.png" width="20" height="20" style="margin-top:4px;margin-left:10px"></a>
<a href="#"><img src="./img/note.png" width="20" height="20" style="margin-top:4px;margin-left:10px"></a>
<a href="#"><img src="./img/notifications.png" width="20" height="20" style="margin-top:4px;margin-left:10px"></a>
<a href="friend_requests.php"><img src="./img/add-friend.png" width="20" height="20" style="margin-top:4px;margin-left:10px"></a>
<a href="#"><img src="./img/cloud_comment.png" width="20" height="20" style="margin-top:4px;margin-left:10px"></a>
<a href="#"><img src="./img/home.png" width="20" height="20" style="margin-top:4px;margin-left:10px"></a>
<a href="#"><img src="./img/invite.png" width="20" height="20" style="margin-top:4px;margin-left:10px"></a>
<a href="#"><img src="./img/friend feeds.png" width="20" height="20" style="margin-top:4px;margin-left:10px"></a>
<a href="#"><img src="./img/list.png" width="20" height="20" style="margin-top:4px;margin-left:10px"></a>
<a href="#"><img src="./img/groups.png" width="20" height="20" style="margin-top:4px;margin-left:10px"></a>
<a href="home-photos.php?profile_id='.$user.'"><img src="./img/photos icon.png" width="20" height="20" style="margin-top:4px;margin-left:10px"></a>
<a href="home-videos.php?profile_id='.$user.'"><img src="./img/k.png" width="20" height="20" style="margin-top:4px;margin-left:10px"></a>
<a href="#"><img src="./img/posted item.png" width="20" height="20" style="margin-top:4px;margin-left:10px"></a>

</div>
';


}
?>
<?php echo $num_ro;?>
<?php echo $num_rows;?>
<?php echo $num_row;?>



