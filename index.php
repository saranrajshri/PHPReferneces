<?php include("./inc/header.inc.php"); ?>
<?php
$loading='<h1 style="position:absolute;top:480px;right:150px;font-size:15px;">Loading....</h1>';
$reg= @$_POST['reg'];
$fn=strip_tags(@$_POST['fname']);
$ln=strip_tags(@$_POST['lname']);

$em=strip_tags(@$_POST['email']);
$em2=strip_tags(@$_POST['email2']);
$pswd=strip_tags(@$_POST['password']);
$d=date ("y-m-d");//Year-Month-Day
//Registration form code
if($reg)
{
if($fn&&$ln&&$em&&$em2&&$pswd){
if(filter_var($em , FILTER_VALIDATE_EMAIL) == true){
$e_check = mysql_query("SELECT email FROM users WHERE email='$em' ");
$email_check= mysql_num_rows($e_check);
if ($email_check==0) {
if($em==$em2){
$pswd=md5($pswd);
//inserting the data into the database
$query=mysql_query("INSERT INTO users VALUES('','$fn $ln','$fn','$ln','$em','$pswd','','','$d','','','','No status','Not defined','Not defined','Not defined','Not defined','Not defined','Not defined','Not defined','Not defined','Not defined','Not defined','Not defined','yes','no','-','-','-','','Not defined')");
//Check for existence
$sql=mysql_query("SELECT * From users WHERE email='$em' AND password='$pswd'  LIMIT 1");//
$user_count= mysql_num_rows($sql);
if ($user_count==1) {
while($row=mysql_fetch_array($sql)) {
$id=$row["id"];
$u_name=$row["username"];
$u_firstname=$row["firstname"];
$u_lastname=$row["lastname"];
$u_email=$row["email"];
}
header("location:verifyyouraccountandlaststeps.php?profile_id=$id");
exit();
}
else
{
echo"error";
}
}
//email match
else"<img src='./img/symbol_error.png' width='50' height='50' style='position:absolute;top:300px;right:60px;'>";
echo"<img src='./img/symbol_error.png' width='50' height='50' style='position:absolute;top:250px;right:60px;'>";
}
else{
//already email
echo"<img src='./img/symbol_error.png' width='50' height='50' style='position:absolute;top:250px;right:60px;'>";
}
}
else{
echo"<img src='./img/symbol_error.png' width='50' height='50' style='position:absolute;top:250px;right:60px;'>";
}
}
else
{
echo"<img src='./img/symbol_error.png' width='50' height='50' style='position:absolute;top:200px;right:60px;'>";
echo"<img src='./img/symbol_error.png' width='50' height='50' style='position:absolute;top:250px;right:60px;'>";
echo"<img src='./img/symbol_error.png' width='50' height='50' style='position:absolute;top:300px;right:60px;'>";
echo"<img src='./img/symbol_error.png' width='50' height='50' style='position:absolute;top:350px;right:60px;'>";
}
}
else
{
	
}
//Login form PHP Code
if (isset($_POST["user_login"])&& isset($_POST["password_login"])) {
$user_login= strip_tags(@$_POST['user_login']);
$password_login= preg_replace('#[^A-Za-z0-9]#i','',$_POST["password_login"]);//
$password_login_md5=md5($password_login);
$sql=mysql_query("SELECT * From users WHERE email='$user_login' AND password='$password_login_md5'  LIMIT 1");//
//Check for existence
$user_count= mysql_num_rows($sql);
if ($user_count==1) {
while($row=mysql_fetch_array($sql)) {
$id=$row["id"];
}
$_SESSION["user_login"]=$user_login;
header("location:home.php?profile_id=$id");
exit();
}
else
{
die('<div class="center"><div id="message"><center><p>The information is incorrect</p></center></div><div id="getnew"></div></div>');
}
}
?>
<img src="./img/welcome.png" width="400" height="300" style="position:absolute;top:120px;left:30px;min-width:0px;">
<div class="signup">
<p class="signupp">Create an Account</p>
<p class="itsfree" style="font-size:20px;">It's free it always be</p>
<div id="form">
<form action="#" method="post">
<div id="one">
<input type="text" name="fname"  placeholder="Firstname" style="position:absolute;right:305px;top:25px;text-indent:5px;">
<input type="text" name="lname"  placeholder="Surname" style="position:absolute;right:100px;top:25px;text-indent:5px;">
</div>
<div id="rest">
<input type="text" name="email"  placeholder="Enter your email" style="position:absolute;right:100px;top:25px;text-indent:5px;">
<input type="text" name="email2"  placeholder="Re-enter your email" class="position" style="position:absolute;right:100px;top:75px;text-indent:5px;">
<input type="password" name="password"  placeholder="Password" style="position:absolute;right:100px;top:125px;text-indent:5px;">
</div>
<div id="button">
<input type="submit" name="reg" value="Create my Account" onclick="loadingfb()"class="myButton" style="position:absolute;right:330px;top:450px;">
</div>
</form>
</div>
<div id="foot">
</div>
<div id="loadingfb" style="display:none">
<img src="./img/ajax-loader_2.gif" width="30" height="30" style="position:absolute;top:425px;right:180px;">
</div>
<script>
function loadingfb(){
var whitebg = document.getElementById("loadingfb");
var dlg =   document.getElementById("loadingfb");
whitebg.style.display = "block";
dlg.style.display ="block"; 
var winWidth = window.innerWidth;
var winHeight = window.innerHeight;

dlg.style.left = (winWidth/2) - 480/2 + "px";
dlg.style.top = "150px";
}
</script>
<div id="foot" style="position:fixed;top:637px;border-top-left-radius:10px;border-top-right-radius:10px;right:450px;background:#6484b4;height:30px;width:500px;padding:5px;">
<p style="font-size:15px;font-weight:bold;color:#f2f2f2;padding-top:3px;padding-left:5px;word-spacing:5px;">This website is created by Shrisaranraj and <a href="jumboteam.php" style="color:#f2f2f2;font-size:15px;">jumbo team</a></p>
</div>