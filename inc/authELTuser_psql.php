<?php

echo "dada"

?>

some html

<?php
//Program version
$w_elt_version= "eLTver.01";

// Authenticating user at lever $x_userlevel

$w_username = trim(substr(urldecode($_REQUEST["x_username"]),0,10));
$w_password = trim(substr(urldecode($_REQUEST["x_password"]),0,20));
$w_xfer_page = trim(urldecode($_REQUEST["xfer_page"]));


//echo $w_xfer_page; die();

require "connect_to_db1.php";

     $db = new elt_db;

     $db->query("select * from user_auth where username = '$w_username'");

     //$e_password = crypt($w_password, "XY");
    $e_password = substr(md5($w_username.$w_password),0,20);


if ($db->num_rows() > 0)
{

$db->next_record();

$stored_password =  $db->f("password");
$w_user_level = $db->f("level");
$w_userID = $db->f("id");
$w_dbxxx = $db->f("exl_db");
$w_acc_status = $db->f("account_status");

if ($w_dbxxx == "")
{
  $w_dbxxx = "elt001";
}

$w_need_pwd_change = $db->f("need_pwd_change");
$w_change_pwd_msg = "Please change your Password immediately, then login again when requested.";

if ($w_need_pwd_change  == 't' ) //forcing a password change if first time login ..
{
   //$w_page = "/elt01/el_pwd_change.php:SSL?x_username=".$w_username."&x_forced_change=t'";
   $w_page = "/elt01/el_pwd_change.php?x_username=".$w_username."&x_forced_change=t'";
}
else
{
##$w_page = $w_xfer_page.":NOSSL";  // not sure why NOSSL was added
$w_page = $w_xfer_page; 
}

if ($e_password != $stored_password)     // invalid password
  {



      sleep(10);
   echo ("<center>");
   echo ("<font color=#FF0000 >");
   echo ("<hr>Access Denied.<hr>");
   echo ("</font>");
   echo ("</center>");

// force end to script execution if wrong password..
   die();
  }
}
else    // invalid username
{
      sleep(10);

print <<< endprint
   <br>
   <center>
   <hr>
   <span style="background-color: #FFFFFF; color: #FF0000; font: bold;
                             font-size: 20; 
                             font-family: arial, helvetica, sans-serif; font-style: oblique;
                             text-align: center;
                            ">
         <br>Access Denied.<br>
   </span>
   <hr>
  </center>

endprint;

// force end to script execution if fail authentification ...
   die();
}


//check rec_status in eltuser
$w_query = "select rec_status from eltuser where id = '$w_userID'";

$db->query($w_query);

if ($db->num_rows() > 0)
{

$db->next_record();

$w_rec_status = $db->f("rec_status");

if ($w_rec_status == "-1")  // user status = inactive
  {
      sleep(10);

print <<< endprint
   <br>
   <center>
   <span style="background-color: #493D7A; color: #FF0000; font: bold;
                             font-size: 20; line-height: 1;
                             font-family: arial, helvetica, sans-serif; font-style: oblique;
                             text-align: center;
                             padding-left: 15; padding-right: 15;
                            padding-bottom: 15; padding-top: 15; ">
         <hr><br>Access Denied.<br><hr>
   </span>
  </center>

endprint;

// force end to script execution if user status = inactive
   die();
  }
}


ob_start(); //Allows the cookie to be set after the code.

//Start session and register some variables
//session_start();

//if (!$PHPSESSID)
{

$ELuserid=$w_userID;
$ELauth=$w_user_level;
$EL_loginname = $w_username;
$EL_prog_version = $w_elt_version;
$EL_dbxxx = $w_dbxxx;
$EL_acc_status = $w_acc_status;

$_SESSION['ELT_eLiveTrain_host']=$_SERVER["SERVER_NAME"];
$_SESSION['ELTuserid']=$ELuserid;
$_SESSION['ELTauth']=$ELauth;
$_SESSION['ELT_loginname']=$EL_loginname;
$_SESSION['ELT_prog_version']=$EL_prog_version;
$_SESSION['ELT_dbxxx']=$EL_dbxxx;
$_SESSION['ELT_acc_status']=$EL_acc_status;
$_SESSION['ELT_do_announcement']=true; 

$_SESSION['ELTcomponent_id'] = ""; //??
$_SESSION['ELTprogram_id']= ""; //??
$_SESSION['ELT_do_announcement']=true; // this determines if annoucement is done.

if ($w_rec_status == 11)
{
	$EL_no_pwd_change = true;
	$_SESSION['ELT_no_pwd_change']=true;
}

}

//$f ="/home/httpd/html/elt01/eLiveTrain_host.conf";
//$EL_eLiveTrain_host = trim(fread(fopen($f, "r"), filesize($f)));
//$EL_eLiveTrain_host = $SERVER_NAME;
$EL_eLiveTrain_host = $_SERVER["SERVER_NAME"]; //$SERVER_NAME;
// set cookie for authorisation and misc.
//if  (!isset($ELauth))
{

setcookie("ELTuserid",$w_userID,0, "/elt01", "");
setcookie("ELTauth", $w_user_level,0, "/elt01", "");
setcookie("ELTuser_rec_status", $w_rec_status, 0, "/elt01", "");
setcookie("ELT_loginname", $w_username, 0, "/elt01", "");
setcookie("ELT_dbxxx", $w_dbxxx, 0, "/elt01", "");
setcookie("ELT_eLiveTrain_host", $EL_eLiveTrain_host, 0,"/elt01","");
setcookie("ELT_acc_status",$w_acc_status, 0,"/elt01","");

## echo "no auth";

// session_start();

/*$ELuserid=$w_userID;
$ELauth=$w_user_level;
$EL_loginname = $w_username;
$EL_prog_version = "Exlver.001";
$EL_dbxxx = $w_dbxxx;
$EL_acc_status = $w_acc_status; */
//$EL_do_announcement = true;

}


/*
$short_session_id = substr($PHPSESSID,0,15);
$w_timestamp = date( "Y-m-d, h:m:s", time() );

echo $short_session_id;die();
//Log user in log file.
$w_query = "insert into el_log01 (id, log_date_time,log_session) values ('$w_userID',  '$w_timestamp', '$short_session_id')";
$db->query($w_query);
*/

//echo $w_page;
//die();

print <<< endprint

<html>
<head>
   <META HTTP-EQUIV="Refresh" CONTENT="2;URL=$w_page">
   <META HTTP-EQUIV="content-type" CONTENT="No-cache; text/html; charset=utf-8">
    <!--META HTTP-EQUIV="Refresh" CONTENT="2;URL=$w_page:NOSSL"-->
</head>

<body>
<br>
<br>
<br>
<center>
<span style="background-color: #607e15; color: #FFED2B; font: bold;
                             font-size: 20; line-height: 1;
                             font-family: arial, helvetica, sans-serif; font-style: bold;
                             text-align: center;
                             padding-left: 15; padding-right: 15;
                            padding-bottom: 15; padding-top: 15; ">
         Successful login. Please wait while loading next screen ...
 </span>
 </center>

</body>

</html>

endprint;

ob_end_flush();


?>
