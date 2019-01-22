<?php include("./inc/header.inc.php");?>
<?php include("./inc/script.inc.php");?>
<?php
$up= @$_POST['up'];
$current_city=strip_tags(@$_POST['current-city']);
$networks=strip_tags(@$_POST['networks']);
$hometown=strip_tags(@$_POST['hometown']);
if($up){
if($current_city&&$networks&&$hometown){
	mysql_query("UPDATE users SET current_city ='$current_city' , networks='$networks',hometown='$hometown' WHERE id='$user'");
	echo'<div id="msgPopContainer" style="position:absolute;top:80px;" class="msgPopContainerSmall msgPopContainerOverflow msgPop-top-right"><div id="msgPop5" role="alert" title="message" class="msgPopMessage " style="display: block;"><div class="outerMsgPopTbl"><div class="innerMsgPopTbl"><div class="msgPopTable"><div class="msgPopTable-cell msgPopSpacer">&nbsp;</div><div class="msgPopTable-cell"><div class="msgPopTable-table"><div class="msgPopTable-cell" id="msgPopIconCell"><i class="fa fa-info-circle"></i></div><div class="msgPopTable-cell"><center><p style="color:#fff;font-weight:bold;font-size:15px">Information updated successfully!</p></center></div></div></div><div class="msgPopTable-cell msgPop-align-right msgPopSpacer msgPopCloseCell" id="msgPop5CloseBtn"><a class="msgPopCloseLnk" title="Close" onclick="MsgPop.close("msgPop5")"><i class="fa fa-times"></i></a></div></div></div></div></div><div id="msgDivMore" class="msgPopLoadMore" style="display: none;"><span onclick="javascript:MsgPop.showMoreMessages();">=== Load More Messages ===</span></div><div type="button" id="msgPopCloseAllBtn" onclick="MsgPop.closeAll()" style="display: none;">Close All Messages</div></div>';

}
else
{
	//do nothing
}
}
$p_info= @$_POST['p-info'];
$interests=strip_tags(@$_POST['interests']);
$fav_quotations=strip_tags(@$_POST['fav-quotations']);
$about_me=strip_tags(@$_POST['about-me']);
if($p_info){
if($interests&&$fav_quotations&&$about_me){
	mysql_query("UPDATE users SET interests ='$interests' , fav_quotations='$fav_quotations',bio='$about_me' WHERE id='$user'");
	echo'<div id="msgPopContainer" style="position:absolute;top:80px;" class="msgPopContainerSmall msgPopContainerOverflow msgPop-top-right"><div id="msgPop5" role="alert" title="message" class="msgPopMessage " style="display: block;"><div class="outerMsgPopTbl"><div class="innerMsgPopTbl"><div class="msgPopTable"><div class="msgPopTable-cell msgPopSpacer">&nbsp;</div><div class="msgPopTable-cell"><div class="msgPopTable-table"><div class="msgPopTable-cell" id="msgPopIconCell"><i class="fa fa-info-circle"></i></div><div class="msgPopTable-cell"><center><p style="color:#fff;font-weight:bold;font-size:15px">Information updated successfully!</p></center></div></div></div><div class="msgPopTable-cell msgPop-align-right msgPopSpacer msgPopCloseCell" id="msgPop5CloseBtn"><a class="msgPopCloseLnk" title="Close" onclick="MsgPop.close("msgPop5")"><i class="fa fa-times"></i></a></div></div></div></div></div><div id="msgDivMore" class="msgPopLoadMore" style="display: none;"><span onclick="javascript:MsgPop.showMoreMessages();">=== Load More Messages ===</span></div><div type="button" id="msgPopCloseAllBtn" onclick="MsgPop.closeAll()" style="display: none;">Close All Messages</div></div>';

}
else
{
	//do nothing
}
}
$web=@$_POST['web'];
$website=strip_tags(@$_POST['website']);
if($website!=''){
	mysql_query("UPDATE users SET  website='$website' WHERE id='$user'");
	echo'<div id="msgPopContainer" style="position:absolute;top:80px;" class="msgPopContainerSmall msgPopContainerOverflow msgPop-top-right"><div id="msgPop5" role="alert" title="message" class="msgPopMessage " style="display: block;"><div class="outerMsgPopTbl"><div class="innerMsgPopTbl"><div class="msgPopTable"><div class="msgPopTable-cell msgPopSpacer">&nbsp;</div><div class="msgPopTable-cell"><div class="msgPopTable-table"><div class="msgPopTable-cell" id="msgPopIconCell"><i class="fa fa-info-circle"></i></div><div class="msgPopTable-cell"><center><p style="color:#fff;font-weight:bold;font-size:15px">Information updated successfully!</p></center></div></div></div><div class="msgPopTable-cell msgPop-align-right msgPopSpacer msgPopCloseCell" id="msgPop5CloseBtn"><a class="msgPopCloseLnk" title="Close" onclick="MsgPop.close("msgPop5")"><i class="fa fa-times"></i></a></div></div></div></div></div><div id="msgDivMore" class="msgPopLoadMore" style="display: none;"><span onclick="javascript:MsgPop.showMoreMessages();">=== Load More Messages ===</span></div><div type="button" id="msgPopCloseAllBtn" onclick="MsgPop.closeAll()" style="display: none;">Close All Messages</div></div>';

}
else{
	
}
$k=@$_POST['k'];
if($k){
$relationship=$_POST['relationship'];
mysql_query("UPDATE users SET  r_status='$relationship' WHERE id='$user'");
	echo'<div id="msgPopContainer" style="position:absolute;top:80px;" class="msgPopContainerSmall msgPopContainerOverflow msgPop-top-right"><div id="msgPop5" role="alert" title="message" class="msgPopMessage " style="display: block;"><div class="outerMsgPopTbl"><div class="innerMsgPopTbl"><div class="msgPopTable"><div class="msgPopTable-cell msgPopSpacer">&nbsp;</div><div class="msgPopTable-cell"><div class="msgPopTable-table"><div class="msgPopTable-cell" id="msgPopIconCell"><i class="fa fa-info-circle"></i></div><div class="msgPopTable-cell"><center><p style="color:#fff;font-weight:bold;font-size:15px">Information updated successfully!</p></center></div></div></div><div class="msgPopTable-cell msgPop-align-right msgPopSpacer msgPopCloseCell" id="msgPop5CloseBtn"><a class="msgPopCloseLnk" title="Close" onclick="MsgPop.close("msgPop5")"><i class="fa fa-times"></i></a></div></div></div></div></div><div id="msgDivMore" class="msgPopLoadMore" style="display: none;"><span onclick="javascript:MsgPop.showMoreMessages();">=== Load More Messages ===</span></div><div type="button" id="msgPopCloseAllBtn" onclick="MsgPop.closeAll()" style="display: none;">Close All Messages</div></div>';

}
$kk=@$_POST['kk'];
$highschool=strip_tags(@$_POST['high-school']);
$employer=strip_tags(@$_POST['employer']);
$location=strip_tags(@$_POST['location']);
if($kk){
if($highschool&&$employer&&$location){
mysql_query("UPDATE users SET  high_school='$highschool',employer='$employer',location='$location' WHERE id='$user'");	
	echo'<div id="msgPopContainer" style="position:absolute;top:80px;" class="msgPopContainerSmall msgPopContainerOverflow msgPop-top-right"><div id="msgPop5" role="alert" title="message" class="msgPopMessage " style="display: block;"><div class="outerMsgPopTbl"><div class="innerMsgPopTbl"><div class="msgPopTable"><div class="msgPopTable-cell msgPopSpacer">&nbsp;</div><div class="msgPopTable-cell"><div class="msgPopTable-table"><div class="msgPopTable-cell" id="msgPopIconCell"><i class="fa fa-info-circle"></i></div><div class="msgPopTable-cell"><center><p style="color:#fff;font-weight:bold;font-size:15px">Information updated successfully!</p></center></div></div></div><div class="msgPopTable-cell msgPop-align-right msgPopSpacer msgPopCloseCell" id="msgPop5CloseBtn"><a class="msgPopCloseLnk" title="Close" onclick="MsgPop.close("msgPop5")"><i class="fa fa-times"></i></a></div></div></div></div></div><div id="msgDivMore" class="msgPopLoadMore" style="display: none;"><span onclick="javascript:MsgPop.showMoreMessages();">=== Load More Messages ===</span></div><div type="button" id="msgPopCloseAllBtn" onclick="MsgPop.closeAll()" style="display: none;">Close All Messages</div></div>';

}
else{
	//do nothing
}
}
$save=@$_POST['save'];
if($save){
$month=$_POST['month'];
$day=$_POST['day'];
$year=$_POST['year'];
$gender=$_POST['gender'];
$interested_in=$_POST['interested-in'];

mysql_query("UPDATE users SET date='$day'  WHERE id='$user'");
mysql_query("UPDATE users SET month='$month'  WHERE id='$user'");
mysql_query("UPDATE users SET year='$year'  WHERE id='$user'");
mysql_query("UPDATE users SET gender='$gender'  WHERE id='$user'");
mysql_query("UPDATE users SET interested_in='$interested_in'  WHERE id='$user'");
	echo'<div id="msgPopContainer" style="position:absolute;top:80px;" class="msgPopContainerSmall msgPopContainerOverflow msgPop-top-right"><div id="msgPop5" role="alert" title="message" class="msgPopMessage " style="display: block;"><div class="outerMsgPopTbl"><div class="innerMsgPopTbl"><div class="msgPopTable"><div class="msgPopTable-cell msgPopSpacer">&nbsp;</div><div class="msgPopTable-cell"><div class="msgPopTable-table"><div class="msgPopTable-cell" id="msgPopIconCell"><i class="fa fa-info-circle"></i></div><div class="msgPopTable-cell"><center><p style="color:#fff;font-weight:bold;font-size:15px">Information updated successfully!</p></center></div></div></div><div class="msgPopTable-cell msgPop-align-right msgPopSpacer msgPopCloseCell" id="msgPop5CloseBtn"><a class="msgPopCloseLnk" title="Close" onclick="MsgPop.close("msgPop5")"><i class="fa fa-times"></i></a></div></div></div></div></div><div id="msgDivMore" class="msgPopLoadMore" style="display: none;"><span onclick="javascript:MsgPop.showMoreMessages();">=== Load More Messages ===</span></div><div type="button" id="msgPopCloseAllBtn" onclick="MsgPop.closeAll()" style="display: none;">Close All Messages</div></div>';


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
<center><h1>Edit <?php echo $log_user_name; ?>'s Information</h1></center></div>
<div id="cont-body" style="border:1px solid #ccc;boder-top:1px solid #o45dad;padding:10px;">
<form action="#" method="post">
<p style="font-size:15px;padding:5px;">Current city :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px"><input type="text" name="current-city" class="current-city" style="font-size:15px;border:1px solid #ccc;background-color:#f2f2f2;padding:5px;width:300px" placeholder="Enter your current city"></p>
<p style="font-size:15px;padding:5px;">Networks :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px"><input type="text" name="networks" class="current-city" style="font-size:15px;border:1px solid #ccc;background-color:#f2f2f2;padding:5px;width:300px" placeholder="Enter your networks"></p>
<p style="font-size:15px;padding:5px;">Hometown :</p><p style="margin-left:200px;margin-top:-25px;font-size:15px"><input type="text" name="hometown" class="hometown" style="font-size:15px;border:1px solid #ccc;background-color:#f2f2f2;padding:5px;width:300px" placeholder="Enter your hometown"></p>
<center><input type="submit" name="up" class="button blue" value="Update basic info"></center>
</form>
<hr style="margin-top:5px;margin-bottom:5px;">

<center><h1 style="padding:5px;font-size:18px;color:#045dad">Personal Information</h1></center>
<hr style="margin-top:5px;margin-bottom:5px;">
<form action="#" method="post">
<p style="font-size:15px;padding:5px;">Interests :</p><p style="margin-left:200px;margin-top:-25px;font-size:10px"><input type="text" name="interests" class="current-city" style="font-size:15px;border:1px solid #ccc;background-color:#f2f2f2;padding:5px;width:300px" placeholder="Enter what are you interested in...?">(e.g : Buisness , Technology , etc)</p>
<p style="font-size:15px;padding:5px;">Favourite Quotations :</p><p style="margin-left:200px;margin-top:-25px;font-size:10px"><input type="text" name="fav-quotations" class="current-city" style="font-size:15px;border:1px solid #ccc;background-color:#f2f2f2;padding:5px;width:300px" placeholder="Enter your favourite quote"></p>
<p style="font-size:15px;padding:5px;">About me :</p><p style="margin-left:200px;margin-top:-25px;font-size:10px"><input type="text" name="about-me" class="current-city" style="font-size:15px;border:1px solid #ccc;background-color:#f2f2f2;padding:5px;width:300px" placeholder="Tell something about you.."></p>
<br>
<center><input type="submit" name="p-info" class="button blue" value="Update personal info"></center>
</form>
<hr style="margin-top:5px;margin-bottom:5px;">
<form action="#" method="post">
<center><h1 style="padding:5px;font-size:18px;color:#045dad">Contact Information</h1></center>
<hr style="margin-top:5px;margin-bottom:5px;">
<p style="font-size:15px;padding:5px;">Website :</p><p style="margin-left:200px;margin-top:-25px;font-size:10px"><input type="text" name="website" class="current-city" style="font-size:15px;border:1px solid #ccc;background-color:#f2f2f2;padding:5px;width:300px" placeholder="Enter your website"></p>
<br><center><input type="submit" name="web" class="button blue" value="Update contact info"></center>
</form>
<hr style="margin-top:5px;margin-bottom:5px;">
<form action="#" method="post">
<center><h1 style="padding:5px;font-size:18px;color:#045dad">Relationship Information</h1></center>
<hr style="margin-top:5px;margin-bottom:5px;">
<form action="#" method="post">
<p style="font-size:15px;padding:5px;">Relationship status :</p><p style="margin-left:200px;margin-top:-25px;font-size:10px"><select name="relationship" style="background-color:#f2f2f2;border:1px solid #ccc;width:200px;padding:5px;text-indent:5px;font-size:15px;"><option value="Single">Single</option><option value="In a relationship">In a relationship</option><option value="Engaged">Engaged</option><option value="Married">Married</option><option value="Not Interested">Not Interested</option><option value="Itss Complicated">Its Complicated</option></select></p>
<br><center><input type="submit" name="k" value="Update relationship info" class="button blue"></center>
<hr style="margin-top:5px;margin-bottom:5px;">
</form>
<center><h1 style="padding:5px;font-size:18px;color:#045dad">Education and Work Information</h1></center>
<hr style="margin-top:5px;margin-bottom:5px;">
<form action="#" method="post">
<p style="font-size:15px;padding:5px;">High school :</p><p style="margin-left:200px;margin-top:-25px;font-size:10px"><input type="text" name="high-school" class="current-city" style="font-size:15px;border:1px solid #ccc;background-color:#f2f2f2;padding:5px;width:300px" placeholder="Enter the name of your high school"></p>
<p style="font-size:15px;padding:5px;">Employer :</p><p style="margin-left:200px;margin-top:-25px;font-size:10px"><input type="text" name="employer" class="current-city" style="font-size:15px;border:1px solid #ccc;background-color:#f2f2f2;padding:5px;width:300px" placeholder="What is your job..?"></p>
<p style="font-size:15px;padding:5px;">Location :</p><p style="margin-left:200px;margin-top:-25px;font-size:10px"><input type="text" name="location" class="current-city" style="font-size:15px;border:1px solid #ccc;background-color:#f2f2f2;padding:5px;width:300px" placeholder="Where are you working...?"></p>
<center><input type="submit" name="kk" value="Update Education and Work info" class="button blue"></center>
</form>
<hr style="margin-top:5px;margin-bottom:5px;">
<center><h1 style="padding:5px;font-size:18px;color:#045dad">More Information</h1></center>
<form action="#" method="post">
<hr style="margin-top:5px;margin-bottom:5px;">
<p style="padding:10px;font-size:15px;font-weight:bold">I Am:<select class="cu" style="margin-left:235px;width:37%;" name="gender"><option>Male</option><option>Female</option></select></p>
<hr style="margin-top:5px;">
<p style="padding:10px;font-size:15px;font-weight:bold">Birthday:
<select class="cu" style="margin-left:200px;width:8%;text-indent:5px;"  name="month">
<option value="January">Jan</option>
<option value="Febuary">Feb</option>
<option value="March">Mar</option>
<option value="April">Apr</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">Aug</option>
<option value="September">Sep</option>
<option value="October">Oct</option>
<option value="November">Nov</option>
<option value="December">Dec</option>
</select>
<select class="cu" style="margin-left:0px;width:8%;text-indent:5px;" name="day">
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select class="cu" style="margin-left:0px;width:10%;text-indent:5px;" name="year">
<option  value="1950">1950</option>
<option value="1951">1951</option>
<option value="1952">1952</option>
<option value="1953">1953</option>
<option value="1954">1954</option>
<option value="1955">1955</option>
<option value="1956">1956</option>
<option value="1957">1957</option>
<option value="1958">1958</option>
<option value="1959">1959</option>
<option value="1960">1960</option>
<option value="1961">1961</option>
<option value="1962">1962</option>
<option value="1963">1963</option>
<option value="1964">1964</option>
<option value="1965">1965</option>
<option value="1966">1966</option>
<option value="1967">1967</option>
<option value="1968">1968</option>
<option value="1969">1969</option>
<option value="1970">1970</option>
<option value="1971">1971</option>
<option value="1972">1972</option>
<option value="1973">1973</option>
<option value="1974">1974</option>
<option value="1975">1975</option>
<option value="1976">1976</option>
<option value="1977">1977</option>
<option value="1978">1978</option>
<option value="1979">1979</option>
<option value="1980">1980</option>
<option value="1981">1981</option>
<option value="1982">1982</option>
<option value="1983">1983</option>
<option value="1984">1984</option>
<option value="1985">1985</option>
<option value="1986">1986</option>
<option value="1987">1987</option>
<option value="1988">1988</option>
<option value="1989">1989</option>
<option value="1990">1990</option>
<option value="1991">1991</option>
<option value="1992">1992</option>
<option value="1993">1993</option>
<option value="1994">1994</option>
<option value="1995">1995</option>
<option value="1996">1996</option>
<option value="1997">1997</option>
<option value="1998">1998</option>
<option value="1999">1999</option>
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2002</option>
<option value="2003">2003</option>
<option value="2004">2004</option>
<option value="2005">2005</option>
<option value="2006">2006</option>
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
</select>
</p>

<hr style="margin-top:5px;">
<p style="padding:10px;margin-left:0px;font-size:15px;font-weight:bold">Interested In:
<select class="cu" style="margin-left:165px;" name="interested-in">
<option>Men</option>
<option>Women</option>
<option>Not Interested</option>
</select>
</p>
<center><input type="submit" name="save" value="Save changes" class="button blue"></center>
<hr style="margin-top:5px;margin-bottom:10px;">
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
