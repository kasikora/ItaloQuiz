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
$quiz_category='';
$res=mysqli_query($link, "select * from categories where id=$id");
while($row=mysqli_fetch_array($res))
{
    $quiz_category=$row["category"];
}
?>

        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Question inside quiz category: <?php echo "<font color='blue'>" .$quiz_category. "</font>"; ?></h1>
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
                                <div class="col-lg-6">
                                    <form name="form1" action="" method="post">
                                    <div class="card">
                                        <div class="card-header"><strong>Add New Closed-ended Question</strong>
                                        </div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="company" class=" form-control-label">Question</label><input type="text" id="company" placeholder="e.g. what's blue?" class="form-control" name="question"></div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Add Answer1</label><input type="text" id="company" placeholder="carrot" class="form-control" name="opt1"></div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Add Answer2</label><input type="text" id="company" placeholder="mango" class="form-control" name="opt2"></div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Add Answer3</label><input type="text" id="company" placeholder="apple" class="form-control" name="opt3"></div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Add Answer4</label><input type="text" id="company" placeholder="blueberry" class="form-control" name="opt4"></div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Add Answer5</label><input type="text" id="company" placeholder="banana" class="form-control" name="opt5"></div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Correct Answer</label><input type="text" id="company" placeholder="blueberry" class="form-control" name="answer"></div>
                                            <div class="form-group">
                                                <input type="submit" name="submit1" value="Add Question" class="btn btn-success">
                                            </div>               

                                    </div>
                                </div>
                                </form>
                                

                            </div>
                            <div class="col-lg-6">
                                    <form name="form2" action="" method="post">
                                    <div class="card">
                                        <div class="card-header"><strong>Add New Open-ended Question</strong>
                                        </div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="company" class=" form-control-label">Question</label><input type="text" id="company" placeholder="e.g. what's blue?" class="form-control" name="question"></div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Correct Answer</label><input type="text" id="company" placeholder="blueberry" class="form-control" name="answer"></div>
                                            <div class="form-group">
                                                <input type="submit" name="submit2" value="Add Question" class="btn btn-success">
                                            </div>               

                                    </div>
                                </div>
                                </form>
                                

                            </div>
                                

                            </div>
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->

                    
                                            </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Number</th>
                                        <th>Questions</th>
                                        <th>Answer1</th>
                                        <th>Answer2</th>
                                        <th>Answer3</th>
                                        <th>Answer4</th>
                                        <th>Answer5</th>
                                        <th>Correct Answer</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>

                                <?php

                                    $res=mysqli_query($link,"select * from questions where category='$quiz_category' order by question_no asc");
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        echo "<tr>";
                                        echo "<td>"; echo $row["question_no"]; echo "</td>";
                                        echo "<td>"; echo $row["question"]; echo "</td>";
                                        echo "<td>"; echo $row["opt1"]; echo "</td>";
                                        echo "<td>"; echo $row["opt2"]; echo "</td>";
                                        echo "<td>"; echo $row["opt3"]; echo "</td>";
                                        echo "<td>"; echo $row["opt4"]; echo "</td>";
                                        echo "<td>"; echo $row["opt5"]; echo "</td>";
                                        echo "<td>"; echo $row["answer"]; echo "</td>";
                                        echo "<td>"; 
                                        ?>
                                            <a href="edit_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Edit</a>
                                        <?php
                                        echo "</td>";
                                        echo "<td>"; 
                                        ?>
                                            <a href="delete_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Delete</a>
                                        <?php
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                ?>
                                </table>
                </div>
                    </div>
                        </div>
                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
<?php 
if (isset($_POST["submit1"]))
{
    $loop=0;
    $count=0;
    $res=mysqli_query($link, "select * from questions where category='$quiz_category' order by id asc") or die(mysqli_error($link));
    $count=mysqli_num_rows($res);
    if($count==0)
    {

    }
    else 
    {
        while($row=mysqli_fetch_array($res))
        {
            $loop=$loop+1;
            mysqli_query($link, "update questions set question_no='$loop' where id=$row[id]");
        }
    }

    $loop=$loop+1;
    mysqli_query($link, "insert into questions values(NULL,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[opt5]','$_POST[answer]','$quiz_category')") or die(mysqli_error($link));

    ?>


    <script type="text/javascript">
        window.location.href=window.location.href;
    </script>
    <?php
}

if (isset($_POST["submit2"]))
{
    $loop = 0;
    $count = 0;
    
    // Update question numbers for existing questions
    $res = mysqli_query($link, "SELECT * FROM questions WHERE category='$quiz_category' ORDER BY id ASC") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    
    if ($count > 0) {
        while ($row = mysqli_fetch_array($res)) {
            $loop++;
            mysqli_query($link, "UPDATE questions SET question_no='$loop' WHERE id=$row[id]");
        }
    }
    
    // Insert the new open-ended question and answer
    $loop++;
    $question = mysqli_real_escape_string($link, $_POST['question']);
    $answer = mysqli_real_escape_string($link, $_POST['answer']);
    
    mysqli_query($link, "INSERT INTO questions (id, question_no, question, answer, category) VALUES (NULL, '$loop', '$question', '$answer', '$quiz_category')") or die(mysqli_error($link));

    ?>
    
     
    <script type="text/javascript">
        window.location.href=window.location.href;
    </script> 
    <?php
}

?>


<?php 
include "footer.php";
?>