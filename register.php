<?php
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
		<div class="text-center custom-login">
			<h3>Register Now</h3>

		</div>
		<div class="content-error">
			<div class="hpanel">
                <div class="panel-body">
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" name="form1" method="post">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Your name</label>
                                <input type="text" name="firstname" class="form-control">
                            </div>
                            <div class="form-group col-lg-12">
								<label>Email</label>
								<input type="text" name="email" class="form-control">
							</div>
                            <div class="form-group col-lg-12">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
							</div>
							<div class="center-container">
								<!-- div to show reCAPTCHA -->
								<div class="g-recaptcha" 
									data-sitekey="6LfustcnAAAAAFkw6ZVbyBwNHzwMBXU_0Bu_1V62">
								</div>
							</div>
						<br>
                       
                        <div class="text-center">
                            <button type="submit" name="submit1" class="btn btn-success loginbtn">Register</button>
                        </div>
						<div class="alert alert-success" id="success" style="margin-top: 10px; display: none">
							<strong>Success!</strong> Account was succesfully created!
						</div>
						<div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none">
							<strong>Failure!</strong> Account already exists!
						</div>
						<div class="alert alert-danger" id="failure_recaptcha" style="margin-top: 10px; display: none">
							<strong>Failure!</strong> Please verify reCAPTCHA!
						</div>
                    </form>
                </div>
            </div>
		</div>

	</div>   
</div>
	
<?php
if(isset($_POST["submit1"]))
{
	
	$recaptchaSecretKey = "6LfustcnAAAAAE5uXXo6v_d1WwrnbBNy1HgfHW9Z"; 

    // Verify reCAPTCHA response
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    $recaptchaVerify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecretKey&response=$recaptchaResponse");
    $recaptchaData = json_decode($recaptchaVerify);
	if($recaptchaData->success) {
		
		$firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_SPECIAL_CHARS);
		$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
		$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
		$hash = password_hash($password, PASSWORD_DEFAULT); 	
		$count=0;
		$res=mysqli_query($link, "select * from registration where email='$email'") or die(mysqli_error($link));
		$count=mysqli_num_rows($res);
			
		if($count>0)
		{
			?>
				
			<script type="text/javascript">
				document.getElementById("success").style.display = "none";
				document.getElementById("failure").style.display = "block";
			</script>
				
			<?php
				
		} else{
			
			mysqli_query($link,"insert into registration values(NULL,'$firstname','$email','$hash')");
			?>
			<script type="text/javascript">
				document.getElementById("success").style.display = "block";
				document.getElementById("failure").style.display = "none";
			</script>
			<?php
		}
		
	} else {
        // reCAPTCHA validation failed, display an error message
        ?>
				
			<script type="text/javascript">
				document.getElementById("failure_recaptcha").style.display = "block";
			</script>
				
			<?php
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
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>

</html>