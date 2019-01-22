<style>
*{
font-size:15px;
font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
font-weight:bold;
}
</style>
		<script language="javascript">
		function toggle(){
			var else = document.getElementById("toggleComment");
			var text = document.getElementById("displayCommment");
			if(ele.style.display == "block"){
				ele.style.display = "none";
			}
			else{
				ele.style.display ="block";
			}
		}
		</script>

<?php
include("./inc/connect.inc.php");
$getid=$_GET['id'];
?>
<a href="#" onClick="toggle()"><div style='float:right;display:inline;font-size:15px;color:#6484b4;'>Write a comment</div></a> 
<div id="toggleComment" style="display:none">
<form action="./home.php" method="post">
<textarea rows="50" cols="50" style="height:100px;"></textarea>
</form>
</div>
<?php
	$get_comments=mysql_query("SELECT * FROM post_comments WHERE post_id='$getid' ORDER BY id DESC");
	$count=mysql_num_rows($get_comments);
	if($count != 0){
	while($comment=mysql_fetch_array($get_comments)){
		$comment_body =$comment['post_body'];
		$posted_to=$comment['posted_to'];
		$posted_by=$comment['posted_by'];
		$removed=$comment['post_removed'];
		$name=mysql_query("SELECT * FROM users WHERE id='$posted_by'");
		while($run=mysql_fetch_array($name)){
		$name=$run['username'];
		$pic=$run['profile_pic'];
		if($pic==''){
			$pic="./img/default.jpg";
		}
		else{
			$pic="./userdata/profile_pics/".$pic;
		}
			echo "
			<div id='pic'>
			<img src='$pic' width='50' height='50'>
			</div>
			<div style='margin-left:60px;margin-top:-50px'>
			<a href='#' style='text-decoration:none;'>$name : </a>
			<h1 style='margin-left:110px;margin-top:-18px;'>".$comment_body."</h1> 
			</div>
			<hr style='margin-top:40px'>";
			}
	}
	}
	else{
		Echo"No comments";
	}
	?>