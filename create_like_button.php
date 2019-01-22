<?php
include("./inc/header.inc.php");
?>
<form action="#" method="post">
<input type="text"style="margin:10px;font-size:15px;padding:5px;border:1px solid #ccc;width:300px" name="like_button_url" value="Enter the url..." onclick="value=''">
<input type="submit" name="create" class="button blue" value="Create"/>
</form>
<?php
if(isset($_POST['like_button_url'])){
	$like_button_url =strip_tags($_POST['like_button_url']);
	$like_button_url2=strstr($like_button_url, 'www.');

	$username=$user;
	$typ_user_name=$log_user_name;
	$date=date("y-m-d");
	$uid=rand(87684476542, 999999999999999999999999999999999999999999999999999999999999999);
	$uid=md5($uid);
	$e_check = mysql_query("SELECT page_url FROM like_button WHERE page_url='$like_button_url' ");
	$email_check= mysql_num_rows($e_check);
	if ($email_check >=1) {
	echo"Already exists...";
	}
	
else
{
	if($like_button_url2){
	$create_button=mysql_query("INSERT INTO like_button VALUES('','$typ_user_name','$username','$like_button_url','$date','$uid')");
	$insert_like=mysql_query("INSERT INTO likes VALUES('','$user','-1','$uid')");

	echo'
	<div style="width:400px;height:250px;border:1px solid #ccc;">
	&lt;iframe src="http://localhost/jumbonetwork/like_but_frame.php?uid='.$uid.'" style="border:0px;height:auto;width:auto;"&gt;
	 
	&lt/;iframe&gt;
	</div> 
	';
	}
	else{
	$like_button_url="http://".$like_button_url;
	$create_button=mysql_query("INSERT INTO like_button VALUES('','$typ_user_name','$username','$like_button_url','$date','$uid')");
	$insert_like=mysql_query("INSERT INTO likes VALUES('','$user','-1','$uid')");
		echo'
	<div style="width:400px;height:250px;border:1px solid #ccc">
	&lt;iframe src="http://localhost/jumbonetwork/like_but_frame.php?uid='.$uid.'" style="border:0px;height:auto;width:auto;"&gt;
	 
	&lt;/iframe&gt;
	</div> 
	';
}    

	}
}
?>