<?php

//check login name

require_once "connect_to_db1.php";

$w_db = new elt_db;

$w_login_name = trim(urldecode($_GET["x_login_name"]));

$w_query = "select id from user_auth where username = '$w_login_name'";
$w_db->query($w_query);

if ($w_db->num_rows() >0)
{
	//already there
	echo "error-1";
}
else
{
	echo "error-0";
}
	
?>