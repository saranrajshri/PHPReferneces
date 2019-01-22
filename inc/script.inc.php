<?php 

		if (isset($_GET['profile_id'])) {
		$username= mysql_real_escape_string($_GET['profile_id']);
		if(ctype_alnum($username)) {
		//
		$check=mysql_query("SELECT * FROM users WHERE id='$username' ");
		if (mysql_num_rows($check)===1) {
		$get= mysql_fetch_assoc($check);
		$typ_user_name =$get['username'];
		$typ_first_name=$get['firstname'];
		$typ_last_name=$get['lastname'];
		$username=$get['id'];
		}
	else
	{
		header("location:search_error.php");
		exit();
		}
		}
}

?>

