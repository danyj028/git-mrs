<?php
// mz_blurb_save

require_once "connect_to_db1.php";

$w_service_array = array();

$w_userid = urldecode($_REQUEST["x_userid"]);

$w_user_tag_line = pg_escape_string(urldecode($_REQUEST["x_tag_line"]));
$w_user_blurb = pg_escape_string(urldecode($_REQUEST["x_blurb"]));  //note we encode!!
$w_user_url = pg_escape_string(urldecode($_REQUEST["x_url"]));

// delete existing entries for user if present.
$w_query0 = "delete from mz_user_profile where user_id = '$w_userid'";

$mz_db->beginTransaction();
$w_stm0 = $mz_db->prepare($w_query0);
$w_stm0->execute();
$mz_db->commit();

//Save data
$w_query = "insert into mz_user_profile values('$w_userid', '$w_user_blurb', '$w_user_url', '', '$w_user_tag_line')";
$w_query2= "update mz_user_profile set profile_vector=to_tsvector(profile) where user_id = '$w_userid'";

//echo $w_query;

$mz_db->beginTransaction();
$w_stm = $mz_db->prepare($w_query);
$w_stm->execute();
$w_stm2 = $mz_db->prepare($w_query2);
$w_stm2->execute();
$mz_db->commit();

print <<< endprint

Profile saved and indexed.

<script type/text="javascript">
alert("Profile saved  and indexd. Continue.");
window.history.back();
</script>

endprint;


?>
