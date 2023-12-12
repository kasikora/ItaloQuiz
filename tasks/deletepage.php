<?php
session_start();

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"posting");

if(!isset($_SESSION["name"]))
{
    ?>
        <script type="text/javascript">
            window.location="loginpage.php";
        </script>
    <?php
}
$id=$_GET["id"];
mysqli_query($link, "delete from posts where id=$id");
?>

<script type="text/javascript">
    window.location="mainpage.php";
</script>