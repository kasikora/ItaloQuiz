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
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Results</h1>
                    </div>
                </div>
            </div>
           
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <center>
                <h1>All Quiz Results</h1>
                </center>
                <?php
                $count=0;
                $res=mysqli_query($link,"select * from quiz_results order by id desc");
                $count=mysqli_num_rows($res);

                if($count==0)
                {
                    ?>
                    <center>
                        <h1>You haven't solved any italian quiz yet!</h1>
                    </center>

                    <?php
                }
                else
                {
                    echo "<table class='table table-bordered'>";
                    echo "<tr style='background-color: #006df0; color:white'>";
                    echo "<th>"; echo "email"; echo "</th>";
                    echo "<th>"; echo "quiz name"; echo "</th>";
                    echo "<th>"; echo "number of questions"; echo "</th>";
                    echo "<th>"; echo "correct answers"; echo "</th>";
                    echo "<th>"; echo "wrong answers"; echo "</th>";
                    echo "<th>"; echo "quiz time"; echo "</th>";
                    echo "</tr>";

                
                    while($row=mysqli_fetch_array($res))
                    {
                        echo "<tr>";
                        echo "<td>"; echo $row["email"]; echo "</td>";
                        echo "<td>"; echo $row["type"]; echo "</td>";
                        echo "<td>"; echo $row["total_question"]; echo "</td>";
                        echo "<td>"; echo $row["correct_answer"]; echo "</td>";
                        echo "<td>"; echo $row["wrong_answer"]; echo "</td>";
                        echo "<td>"; echo $row["time"]; echo "</td>";
                        echo "</tr>";   
                    }

                    echo "</table>";
                }

                ?>
                                

                            </div>
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->

                    
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->

<?php 
include "footer.php";
?>