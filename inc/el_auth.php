<?php

if ($auth_level < $request_level)
{
    sleep(3);
   echo ("<center>");
   echo ("<font color=#FF0000 >");
   echo ("<hr><h2 class=\"red\">Access Denied.</h2><hr>");
   echo ("</font>");
   echo ("</center>");

}

?>