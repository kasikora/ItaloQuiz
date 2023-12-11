<?php
session_start();


?>

<!doctype html>

<html class="no-js" lang="en">


<head>
    <title>log in</title>

</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo" style="color: white">
                    Please log in
                </div>
                <div class="login-form">
                    <form name="form1" action="" method="post">
                        <div class="form-group">
                        
                            <label>Email address</label>
                            <input type="text" name="email" class="form-control" placeholder="example@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="*****" required>
                        </div>
                            <button type="submit" name="submit1" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>


<?php 
if (isset($_POST["submit1"]))
{
    $link=mysqli_connect("localhost","root","");
    mysqli_select_db($link,"posting");
    $count=0;
    $email=mysqli_real_escape_string($link,$_POST["email"]);
    $password=mysqli_real_escape_string($link,$_POST["password"]);

    $res=mysqli_query($link, "select * from login where email='$email' && password='$password'");
    $count=mysqli_num_rows($res);
    if ($count==0)
    {
        ?>
        <script type="text/javascript">
            document.getElementById("failure").style.display="block";
        </script>
        <?php
    }
    else
    {
        $_SESSION["name"]=$email;
        ?>
        <script type="text/javascript">
            window.location="mainpage.php";
        </script>
        <?php
    }
}

?>