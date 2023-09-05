<?php
session_start();
include "header.php";
include "connection.php";
if(!isset ($_SESSION["email"]))
{
    ?>
        <script type="text/javascript">
            window.location="login.php";
        </script>
    <?php
}
?>

        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">

                <center>
                <h1>All Quiz Results</h1>
                </center>
                <?php
                $count=0;
                $res=mysqli_query($link,"select * from quiz_results where email='$_SESSION[email]' order by id desc");
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
        </div>

<?php
include "footer.php";
?>