<?php
error_reporting(E_ALL ^ E_DEPRECATED);
mysql_connect("localhost","root","") or die ("Could Not Connect To Mysql Server");
mysql_select_db("facebook") or die ("Count Not Select Database");
?>

