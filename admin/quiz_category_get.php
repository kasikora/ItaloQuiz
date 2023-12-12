<?php 
session_start();
include "header.php";
include "../connection.php";

if(!isset($_SESSION["admin"]))
{
    ?>
        <script type="text/javascript">
            window.location="index.php";
        </script>
    <?php
}
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Create quiz category</h1>
                    </div>
                </div>
            </div>
           
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form name="form1" action="" method="get">
                            <div class="card-body">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Add quiz category</strong>
                                        </div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="company" class=" form-control-label">New Quiz Category</label><input type="text" id="company" placeholder="e.g. grammar" class="form-control" name="quizname"></div>
                                            <div class="form-group"><label for="vat" class=" form-control-label">Quiz Time in minutes</label><input type="text"  placeholder="1, 2, 3..." class="form-control" name="quiztime"></div>
                                            <div class="form-group">
                                                <input type="submit" name="submit1" value="Create Quiz" class="btn btn-success">
                                            </div>               

                                    </div>
                                </div>
                                

                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                    <strong class="card-title">Quiz Categories</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Quiz Name</th>
                                                <th scope="col">Quiz Time</th>
                                                <!-- <th scope="col">Owner</th> -->
                                                <th scope="col">Edit</th>
                                                <th scope="col">Delete</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $count=0;
                                        $res=mysqli_query($link,"select * from categories");
                                        while($row=mysqli_fetch_array($res))
                                        {
                                            $count=$count+1;
                                            ?>
                                             <tr>
                                                <th scope="row"><?php echo $count; ?></th>
                                                <td><?php echo $row["category"]; ?></td>
                                                <td><?php echo $row["quiz_time_mins"]; ?></td>
                                                <!-- <td><?php echo $_SESSION["admin"]; ?></td> -->
                                                <td><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                                                <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                                               
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                           
                                        </tbody>
                                        </table>
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
if (isset($_GET["submit1"]))
{
    mysqli_query($link,"insert into categories values(NULL,'$_GET[quizname]','$_GET[quiztime]')") or die(mysqli_error($link));
    ?>
    
    <script type="text/javascript">
        //alert("Quiz was added successfully");
        window.location.href="quiz_category_get.php";
    </script>

    <?php
}
?>


<?php 
include "footer.php";
?>