<?php 
session_start();
include "header.php";
include "../connection.php";

if(!isset($_SESSION["admin"]))
{
    ?>
        <script type="text/javascript">
            window.location="login.php";
        </script>
    <?php
}

$id=$_GET["id"];
$res=mysqli_query($link, "select * from categories where id=$id");
while($row=mysqli_fetch_array($res))
{
    $quiz_category=$row["category"];
    $quiz_time=$row["quiz_time_mins"];
}
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit quiz category</h1>
                    </div>
                </div>
            </div>
           
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form name="form1" action="" method="post">
                            <div class="card-body">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Edit quiz category</strong>
                                        </div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="company" class=" form-control-label">Quiz Category</label><input type="text" id="company" placeholder="e.g. grammar" class="form-control" name="quizname" value="<?php echo $quiz_category; ?>"></div>
                                            <div class="form-group"><label for="vat" class=" form-control-label">Quiz Time in minutes</label><input type="text"  placeholder="1, 2, 3..." class="form-control" name="quiztime" value="<?php echo $quiz_time; ?>"></div>
                                            <div class="form-group">
                                                <input type="submit" name="submit1" value="Change Quiz" class="btn btn-success">
                                            </div>               

                                    </div>
                                </div>
                                

                            </div>
                            
                        </div> <!-- .card -->
                        </form>

                    </div>
                    

                    
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

<?php
if (isset($_POST["submit1"]))
{
    mysqli_query($link,"update categories set category='$_POST[quizname]', quiz_time_mins='$_POST[quiztime]' where id=$id") or die(mysqli_error($link));
    ?>
    
    <script type="text/javascript">
        window.location.href="quiz_category.php";
    </script>

    <?php
}
?>


<?php 
include "footer.php";
?>