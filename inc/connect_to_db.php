<?php

/*if (!isset($_SESSION["MZuserid"]))
{
	die("MemberZone error:<br>Your login session has expired. Please restart the application session and login again.");
}
*/

/*if (isset($_SESSION["MZuserid"]))
{
	
}
else
{
	echo ("User session has been closed or has expired.  Please <a href=\"/mrs/login.php\">login</a> again<br>");
	die();
}
*/
$mz_db = new PDO("pgsql:host=localhost;dbname=mrsdb;user=postgres;password=sqlcgi");

$w_http_base_dir = $_SERVER["DOCUMENT_ROOT"];


?>
