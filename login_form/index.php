
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login to House Rental</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<?php
	session_start();
	require '../includes/db_connection.php';
	/*if(isset($_SESSION['user'])){
		//header("location: ../index.php");
		}*/
	function process_input($data){
    
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
	
		return $data;
	}
    if(isset($_POST['submit'])){
		$email = mysqli_real_escape_string($db, process_input($_POST['email']));
		$password = mysqli_real_escape_string($db, process_input($_POST['password']));
		$emailquery = "SELECT * FROM user WHERE email = '$email'";
        $query = mysqli_query($db, $emailquery);
        
        $email_count = mysqli_num_rows($query);
        if($email_count == 1){
			$result = mysqli_fetch_assoc($query);
			$db_password = $result['password'];
			$password_decode = password_verify($password, $db_password);
            if($password_decode){
				$_SESSION['user'] = $result['first_name'];
				$_SESSION['user_id'] = $result['user_id'];
				header('location: ../index.php');
			}
			else{
				$failed_msg = "Incorrect Password!";
			}
			
		}
		else{
			
			$failed_msg = "Incorrect Email or Password!";
		}
		

	} 
	?>

	
	<div class="limiter">
		<div class="container-login100">
		
			<div class="wrap-login100">
			
				<div class="login100-pic js-tilt" data-tilt>
				<h1><a href="../" style="color: green; text-decoration: none;" >Switch to Home Page</a></h1>
					<img src="images/img-01.png" alt="IMG">
					
				</div>
				
				<form class="login100-form validate-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit">
							Login
						</button>
					</div>
					<?php
					if(isset($failed_msg)){
					?>
                     <div class="text-center p-t-12">
					<span class="txt2" style="color: red;">
							<?php echo "<h4>".$failed_msg."</h4>"; ?>
						</span>
					</div>
					<?php
					}
					?>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>
					<div class="text-center p-t-12">
					<span class="txt2">
							Don't Have an Account?
						</span>
					</div>
					<div class="text-center p-t-10">
					   
						<a class="txt2" href="../Registration_form/">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>