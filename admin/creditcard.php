<?php 
session_start();
include "header.php";
include "../connection.php";

if(!isset($_SESSION["admin"]))
{
    ?>
        <script type="text/javascript">
            window.location="http://localhost/quiz_app_WasilewskiSikora/admin";
        </script>
    <?php
}
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add credit card to upgrade to PREMIUM!</h1>
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
                            <div class="card-header"><strong>Add</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="credit_card" class="form-control-label">Credit Card Number</label>
                                    <input type="text" placeholder="Credit Card Number" class="form-control" name="number">
                                </div>
                                <div class="form-group">
                                    <label for="cvv" class="form-control-label">CVV</label>
                                    <input type="text" placeholder="CVV" class="form-control" name="cvv">
                                </div>
                                <div class="form-group">
                                    <label for="expiration_date" class="form-control-label">Expiration Date</label>
                                    <input type="text" placeholder="MM/YYYY" class="form-control" name="date">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit1" value="Add Credit Card" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                    <strong class="card-title">Your credit cards</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Number</th>
                                                <th scope="col">CVV</th>
                                                <th scope="col">Date of expiration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $count=0;
                                        $res=mysqli_query($link,"select * from credit_cards where owner='$_SESSION[admin]'");
                                        while($row=mysqli_fetch_array($res))
                                        {
                                            $count=$count+1;
                                            ?>
                                             <tr>
                                                <th scope="row"><?php echo $count; ?></th>
                                                <td><?php echo $row["number"]; ?></td>
                                                <td><?php echo $row["cvv"]; ?></td>
                                                <td><?php echo $row["date"]; ?></td>
                                                
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
if (isset($_POST["submit1"]))
{
    mysqli_query($link,"insert into credit_cards values(NULL,'$_POST[number]','$_POST[cvv]', '$_POST[date]', '$_SESSION[admin]')") or die(mysqli_error($link));
    ?>
    
    <script type="text/javascript">
        //alert("Quiz was added successfully");
        window.location.href="creditcard.php";
    </script>

    <?php
}
?>


<?php 
include "footer.php";
?>