<?php
session_start();
include "connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ItaloQuizz</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon1.ico">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="css1/owl.carousel.css">
    <link rel="stylesheet" href="css1/owl.theme.css">
    <link rel="stylesheet" href="css1/owl.transitions.css">
    <link rel="stylesheet" href="css1/animate.css">
    <link rel="stylesheet" href="css1/normalize.css">
    <link rel="stylesheet" href="css1/main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css1/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>Login Form</h3>

			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" name="form1" method="POST">
                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you email" required="" value="" name="email" id="email" class="form-control">

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">

                            </div>

                            <button type="submit" name="login" class="btn btn-success btn-block loginbtn">Login</button>
                            <a class="btn btn-success btn-block loginbtn" href="register.php">Register</a>
                            <div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none">
							    <strong>Doesn't work!</strong> Invalid email or password. You don't have an account? Click Register!
						    </div>
                        </form>
                    </div>
                </div>
			</div>

		</div>   
    </div>

    <?php

if(isset($_POST["login"])) {
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
    
    // Retrieve hashed password from the database
    $res = mysqli_query($link, "SELECT password FROM registration WHERE email ='$email'");
    
    if ($res) {
        if(mysqli_num_rows($res) == 1) {
            $row = mysqli_fetch_assoc($res);
            
            $hashedPasswordFromDatabase = $row["password"];
      

            // Verify the provided password against the hashed password
            if(password_verify($password, $hashedPasswordFromDatabase)) {
                $_SESSION["email"] = $email;
                
                header("Location: select_quiz.php");
                exit();
            } else {
                ?>
                <script type="text/javascript">
                    document.getElementById("failure").style.display = "block"; 
                </script>
                <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                document.getElementById("failure").style.display = "block"; 
            </script>
            <?php
        }
    } else {
        echo "Error executing query: " . mysqli_error($link);
    }
}


    ?>

    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    


</body>

</html>