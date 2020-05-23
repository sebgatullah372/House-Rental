
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Sign Up for House Rental</title>
    
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>
<?php
require '../includes/db_connection.php';
function process_input($data){
    
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
    if(empty($_POST['first_name'])){
        $firstname_err = "First Name is Required";
    }
    else{
        $firstname = mysqli_real_escape_string($db,process_input($_POST['first_name']));
        if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
            $firstname_err = "Only letters and white space allowed";
          }
    }
    if(empty($_POST['last_name'])){
        $lastname_err = "Last Name is Required";
    }
    else{
        $lastname = mysqli_real_escape_string($db,process_input($_POST['last_name'])) ;
        if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
            $lastname_err = "Only letters and white space allowed";
          }
    }
    if(empty($_POST['birthday'])){
        $birthday_err = "Select your Birthday";
    }
    else{
        $birthday = mysqli_real_escape_string($db, process_input($_POST['birthday']));
        //echo $birthday;
    }
    if(empty($_POST['gender'])){
        $gender_err = "Select your Gender";
    }
    else{
        $gender = mysqli_real_escape_string($db, process_input($_POST['gender']));
        //echo $gender;
    }
    if(empty($_POST['email'])){
        $email_err = "Email is Required";
    }
    else{
        $email = mysqli_real_escape_string($db, process_input($_POST['email']));
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_err = "Invalid Email address";
        }

    }
    if(empty($_POST['phone'])){
        $phone_err = "Phone is Required";
    }
    else{
        $phone = mysqli_real_escape_string($db, process_input($_POST['phone']));
    }
    if(empty($_POST['password'])){
        $password_err = "Password is Required";
    }
    else{
        $password = mysqli_real_escape_string($db, process_input($_POST['password']));
        
    }
    if(empty($_POST['conpass'])){
        $conpass_err = "Password Confirmation is Required";
    }
    else{
        $conpass = mysqli_real_escape_string($db, process_input($_POST['conpass']));
        
    }
    if(empty($_POST['area'])){
        $area_err = "Area is Required";
    }
    else{
        $area =mysqli_real_escape_string($db, process_input($_POST['area']));
    }
    if(empty($_POST['city'])){
        $city_err = "City is Required";
    }
    else{
        $city = mysqli_real_escape_string($db, process_input($_POST['city']));
    }
    if(empty($_POST['address'])){
        $address_err = "Address is Required";
    }
    else{
        $address = mysqli_real_escape_string($db, process_input($_POST['address']));
    }
    if(!isset($_FILES['file']) || $_FILES['file']['error'] == UPLOAD_ERR_NO_FILE){
        $file_err = "Image is Required";
    }
    else{
        $files = $_FILES['file'];
    }
    
    if(isset($email)){
        //echo $email; 
        $emailquery = "SELECT * FROM user WHERE email = '$email'";
        $query = mysqli_query($db, $emailquery);
        
        $email_count = mysqli_num_rows($query);
        if($email_count>0){
            $email_err = "Email: ".$email." already exists!";
        }

    }
    if(isset($password) && isset($conpass)){
        if($password !== $conpass){
            
            $password_err = "Password confirmation not matching"; 
        }
       
    }

    if(isset($files)){
        //echo"file_err_ext";
         $filename = $files['name'];
         $fileerror = $files['error'];
         $filetemp = $files['tmp_name'];

         $file_ext = explode('.', $filename);
         $filecheck = strtolower(end($file_ext));
         $file_ext_allowed = array('jpg', 'png', 'jpeg');

         if(in_array($filecheck, $file_ext_allowed)){
             $destination = 'user_images/'.$filename; 
         }
         else{
             $file_err = $filecheck." file is not allowed";
             
         }

    }

    if(!isset($firstname_err) && !isset($lastname_err) && !isset($birthday_err) && !isset($gender_err) && !isset($email_err) && isset($phone)
    && !isset($password_err) && !isset($conpass_err) && !isset($area_err) && !isset($city_err) && !isset($address_err) && !isset($file_err)){

    if(isset($firstname) && isset($lastname) && isset($birthday) && isset($gender) && isset($email) && isset($phone)
    && isset($password) && isset($conpass) && isset($area) && isset($city) && isset($address) && isset($destination)){
            
        move_uploaded_file($filetemp, $destination);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = "INSERT INTO user (first_name, last_name, email, password, contact, City, Area, gender, birthday, Address, user_photo) 
        VALUES('$firstname', '$lastname', '$email', '$password', '$phone', '$city', '$area', '$gender', '$birthday', '$address', '$destination')";

        $result = mysqli_query($db, $stmt);
        if($result){
            $success_msg = "You are Registered Successfully!!";

            
        }

    }
}

    

}


?>
<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                
                    <?php if(isset($success_msg)){ ?>
                        <div style="color: green;">
                            <?php echo $success_msg; ?>
                            
                            <p>You can Log in from <a href="../login_form/">here</a>/p>
                            
                        </div>
                    <?php }?>
                    <h4><a href="../" style="color: green; text-decoration: none;" >Switch to Home Page</a></h4>
                    <h2 class="title">Sign Up Here</h2>
                    <form method="POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="first_name" value="<?php if(isset($firstname)){echo $firstname;}?>">

                                </div>
                                <?php if(isset($firstname_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $firstname_err; ?>
                                </div>
                                <?php }?>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="last_name" value="<?php if(isset($lastname)){echo $lastname;}?>">
                                </div>
                                <?php if(isset($lastname_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $lastname_err; ?>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday" value="<?php if(isset($birthday)){echo $birthday;}?>" >
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                    <?php if(isset($birthday_err)){ ?>
                                     <div style="color: red;">
                                        <?php echo $birthday_err; ?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" name="gender"<?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <?php if(isset($gender_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $gender_err; ?>
                                </div>
                                <?php }?>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email"  value="<?php if(isset($email)){echo $email;}?>">
                                </div>
                                <?php if(isset($email_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $email_err; ?>
                                </div>
                                <?php }?>
                            </div>
                           
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone"  value="<?php if(isset($phone)){echo $phone;}?>">
                                </div>
                                <?php if(isset($phone_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $phone_err; ?>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="password">
                                </div>
                                <?php if(isset($password_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $password_err; ?>
                                </div>
                                <?php }?>    
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Confirm Password</label>
                                    <input class="input--style-4" type="password" name="conpass">
                                </div>
                                <?php if(isset($conpass_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $conpass_err; ?>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Area</label>
                                    <input class="input--style-4" type="text" name="area"  value="<?php if(isset($area)){echo $area;}?>">
                                </div>
                                <?php if(isset($area_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $area_err; ?>
                                </div>
                                <?php }?>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">City</label>
                                    <input class="input--style-4" type="text" name="city"  value="<?php if(isset($city)){echo $city;}?>">
                                </div>
                                <?php if(isset($city_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $city_err; ?>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                            
                        <div class="input-group">
                                <label class="label">Full Address</label>
                                <textarea name="address" rows="5" cols="76"  value="<?php if(isset($address)){echo $address;}?>"></textarea>
                        </div>
                        <?php if(isset($address_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $address_err; ?>
                                </div>
                                <?php }?>
                        
                        <div class="input-group">
                                <label class="label" for="file">Your Photo</label>
                                <input type="file" name="file">
                        </div>
                        <?php if(isset($file_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $file_err; ?>
                                </div>
                        <?php }?>

                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    



</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->