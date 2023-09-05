<?php
session_start();
if(!isset($_SESSION["email"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
?>

<?php
include "connection.php";
include "header.php";

?>

        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
                <center>
                <h1>Select Quiz to solve it:</h1>
                </center>
                <?php
                $res=mysqli_query($link,"select * from categories");
                while($row=mysqli_fetch_array($res))
                {
                    ?>
                    <input type="button" class="btn btn-success form-control" value="<?php echo $row["category"]; ?>" style="margin-top: 10px; background-color: blue; color: white" onclick="set_quiz_type_session(this.value);">
                    <?php
                }
                ?>
            </div>
        </div>

<?php
include "footer.php";
?>

<script type="text/javascript">
    function set_quiz_type_session(categories)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                window.location="dashboard.php";
            }
        };
        xmlhttp.open("GET","forajax/set_quiz_type_session.php?categories="+categories,true);
        xmlhttp.send(null);
    }
</script>