<?php

$host='localhost';
$username='importli_centralUser';
$user_pass='%3}tz9)ybr~W';
$database_in_use='importli_central';

$con = mysqli_connect($host,$username,$user_pass,$database_in_use);
if (!$con)
{
    echo"not connected";
}
if (!mysqli_select_db($con,$database_in_use))
{
    echo"database not selected";
}
?>