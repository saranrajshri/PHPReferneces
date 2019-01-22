<?php 
include("./inc/connect.inc.php");
include("./inc/script.inc.php");
?>
<?php 

		if (isset($_GET['name'])) {
		$name= mysql_real_escape_string($_GET['name']);
		if(ctype_alnum($name)) {
		//
		$check=mysql_query("SELECT id FROM users WHERE username='$name'");
		if (mysql_num_rows($check)===1) {
		$get= mysql_fetch_assoc($check);
		$name_id=$get['id'];
		
		}
	else
	{
		header("location:noresults.php");
		exit();
		}
		}
}

?>
<?php
header("location:search_friend_page.php?name=$name");
?>

