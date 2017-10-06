<?php

include "./inc/mz_user_classes.php";
include "./inc/connect_to_db.php";

$w_search_key = urldecode($_GET["x_search_key"]);

$mz_member = new mz_user;

//$mz_member->mz_get_user($w_search_key, $mz_db);

print <<< endprint

<head>
  <title>Test MZone Ajax</title>
  <meta name="GENERATOR" content="GreenwareIT hand crafted">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script type="text/javascript" src="./jscript/mz_ajax_f_01.js"></script>
</head>
<body>
<script type="text/javascript">

//var mz_data = new ajax_request();

function get_mz_data(f_search_key)
{
	mz_get_user(f_search_key);

	//document.getElementById("response_div").innerHTML=mz_data_response;
	//document.getElementById("response_div").innerHTML="response_div";
}	
</script>

<div id="response_div">
<br>

Surname: <input type="text" id="x_surname" style="font-size:1.2em;">
<input type="button" 
	value="Get Data" 	
	onclick=mz_get_user(document.getElementById("x_surname").value)>
	
</div>

<div id="rd2">
</div>


<!--script>
	//mz_test_alert();
	mz_get_user(document.getElementById("x_surname").value);
</script-->

endprint;


?>
