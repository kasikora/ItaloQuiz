<?php
session_start();
include "../connection.php";
$categories=$_GET["categories"];
$_SESSION["categories"]=$categories;

$res=mysqli_query($link, "select * from categories where category='$categories'");
while($row=mysqli_fetch_array($res))
{
    $_SESSION["quiz_time"]=$row["quiz_time_mins"];
}
date_default_timezone_set('Europe/Warsaw');
$date=date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[quiz_time] minutes"));
$_SESSION["quiz_start"]="yes";
?>