<?php
session_start();
if($_SESSION['user']){
?>
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
    <title>Post your House</title>

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
    if(empty($_POST['bedrooms'])){
        $bedrooms_err = "Bedrooms are Required";
    }
    else{
        $bedrooms = mysqli_real_escape_string($db,process_input($_POST['bedrooms']));
        
    }
    if(empty($_POST['livingroom'])){
        $livingroom_err = "Living Room is Required";
    }
    else{
        $livingroom = mysqli_real_escape_string($db,process_input($_POST['livingroom'])) ;
        
    }
    if(empty($_POST['dining'])){
        $dining_err = "Select Dining Room";
    }
    else{
        $dining = mysqli_real_escape_string($db, process_input($_POST['dining']));
        
    }
    if(empty($_POST['servant'])){
        $servant_err = "Select Servant Room";
    }
    else{
        $servant = mysqli_real_escape_string($db, process_input($_POST['servant']));
        
    }
    if(empty($_POST['kitchen'])){
        $kitchen_err = "Kitchen is Required";
    }
    else{
        $kitchen = mysqli_real_escape_string($db, process_input($_POST['kitchen']));

    }
    if(empty($_POST['parking'])){
        $parking_err = "Parking is Required";
    }
    else{
        $parking = mysqli_real_escape_string($db, process_input($_POST['parking']));
    }
    
    $attach_bathrooms = mysqli_real_escape_string($db, process_input($_POST['attach_bathrooms']));
    if($attach_bathrooms == 0){
        $attach_bathrooms = "No Attach Bathroom";
    }
        
    
    if(empty($_POST['common_bathrooms'])){
        $common_bathrooms_err = "Common bathrooms is Required";
    }
    else{
        $common_bathrooms = mysqli_real_escape_string($db, process_input($_POST['common_bathrooms']));
        
    }
    if(empty($_POST['balcony'])){
        $balcony_err = "Balcony is Required";
    }
    else{
        $balcony = mysqli_real_escape_string($db, process_input($_POST['balcony']));
    }
    if(empty($_POST['floor_type'])){
        $floor_type_err = "Floor type is Required";
    }
    else{
        $floor_type = mysqli_real_escape_string($db, process_input($_POST['floor_type']));
    }
    
   
    $level = mysqli_real_escape_string($db, process_input($_POST['level']));
    if($level == 0){
        $level = "Ground Floor";
    }
    //echo "Level : ".$level;

    if(empty($_POST['direction'])){
        $direction_err = "Direction is Required";
    }
    else{
        $direction = mysqli_real_escape_string($db, process_input($_POST['direction']));
    }
    if(empty($_POST['rent'])){
        $rent_err = "Rent is Required";
    }
    else{
        $rent = mysqli_real_escape_string($db, process_input($_POST['rent']));
    }
    if(empty($_POST['service_charge'])){
        $service_charge_err = "Service Charge is Required";
    }
    else{
        $service_charge = mysqli_real_escape_string($db, process_input($_POST['service_charge']));
    }
    if(empty($_POST['advance'])){
        $advance_err = "Advance is Required";
    }
    else{
        $advance = mysqli_real_escape_string($db, process_input($_POST['advance']));
    }
    if(empty($_POST['description'])){
        $description_err = "Description is Required";
    }
    else{
        $description = mysqli_real_escape_string($db, process_input($_POST['description']));
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
    if(empty($_POST['size'])){
        $size_err = "Size is Required";
    }
    else{
        $size = mysqli_real_escape_string($db, process_input($_POST['size']));
        
    }
    if(!isset($_FILES['file1']) || $_FILES['file1']['error'] == UPLOAD_ERR_NO_FILE){
        $file1_err = "Image is Required";
    }
    else{
        $files1 = $_FILES['file1'];
    }
    if(!isset($_FILES['file2']) || $_FILES['file2']['error'] == UPLOAD_ERR_NO_FILE){
        $file2_err = "Image is Required";
    }
    else{
        $files2 = $_FILES['file2'];
    }
    if(!isset($_FILES['file3']) || $_FILES['file3']['error'] == UPLOAD_ERR_NO_FILE){
        $file3_err = "Image is Required";
    }
    else{
        $files3 = $_FILES['file3'];
    }
    if(!isset($_FILES['file4']) || $_FILES['file4']['error'] == UPLOAD_ERR_NO_FILE){
        $file4_err = "Image is Required";
    }
    else{
        $files4 = $_FILES['file4'];
        
    }
    if(!isset($_FILES['file5']) || $_FILES['file5']['error'] == UPLOAD_ERR_NO_FILE){
        $file5_err = "Image is Required";
    }
    else{
        $files5 = $_FILES['file5'];
        
    }
    
    //set files
    if(isset($files1)){
        //echo"file_err_ext";
         $filename1 = $files1['name'];
         $fileerror1 = $files1['error'];
         $filetemp1 = $files1['tmp_name'];

         $file_ext1 = explode('.', $filename1);
         $filecheck1 = strtolower(end($file_ext1));
         $file_ext_allowed = array('jpg', 'png', 'jpeg');

         if(in_array($filecheck1, $file_ext_allowed)){
             $destination1 = 'house_for_rent_images/'.$filename1; 
         }
         else{
             $file1_err = $filecheck1." file is not allowed";
             
         }

    }
    if(isset($files2)){
        //echo"file_err_ext";
         $filename2 = $files2['name'];
         $fileerror2 = $files2['error'];
         $filetemp2 = $files2['tmp_name'];

         $file_ext2 = explode('.', $filename2);
         $filecheck2 = strtolower(end($file_ext2));
         $file_ext_allowed = array('jpg', 'png', 'jpeg');

         if(in_array($filecheck2, $file_ext_allowed)){
             $destination2 = 'house_for_rent_images/'.$filename2; 
         }
         else{
             $file2_err = $filecheck2." file is not allowed";
             
         }

    } if(isset($files3)){
        //echo"file_err_ext";
         $filename3 = $files3['name'];
         $fileerror3 = $files3['error'];
         $filetemp3 = $files3['tmp_name'];

         $file_ext3 = explode('.', $filename3);
         $filecheck3 = strtolower(end($file_ext3));
         $file_ext_allowed = array('jpg', 'png', 'jpeg');

         if(in_array($filecheck3, $file_ext_allowed)){
             $destination3 = 'house_for_rent_images/'.$filename3; 
         }
         else{
             $file3_err = $filecheck3." file is not allowed";
             
         }

    } if(isset($files4)){
        
         $filename4 = $files4['name'];
         $fileerror4 = $files4['error'];
         $filetemp4 = $files4['tmp_name'];

         $file_ext4 = explode('.', $filename4);
         $filecheck4 = strtolower(end($file_ext4));
         $file_ext_allowed = array('jpg', 'png', 'jpeg');

         if(in_array($filecheck1, $file_ext_allowed)){
             $destination4 = 'house_for_rent_images/'.$filename4; 
         }
         else{
             $file4_err = $filecheck4." file is not allowed";
             
         }

    } if(isset($files5)){
        //echo"file_err_ext";
         $filename5 = $files5['name'];
         $fileerror5 = $files5['error'];
         $filetemp5 = $files5['tmp_name'];

         $file_ext5 = explode('.', $filename5);
         $filecheck5 = strtolower(end($file_ext5));
         $file_ext_allowed = array('jpg', 'png', 'jpeg');

         if(in_array($filecheck5, $file_ext_allowed)){
             $destination5 = 'house_for_rent_images/'.$filename5; 
         }
         else{
             $file5_err = $filecheck5." file is not allowed";
             
         }

    }
    

     
    if(!isset($bedrooms_err) && !isset($livingroom_err) && !isset($dining_err)
    && !isset($servant_err) && !isset($kitchen_err) && !isset($parking_err) && !isset($common_bathrooms_err) && !isset($balcony_err)
    && !isset($floor_type_err) 
    && !isset($direction_err) && !isset($rent_err)&& !isset($service_charge_err) && !isset($advance_err) && !isset($description_err)
    &&!isset($area_err) && !isset($city_err) && !isset($address_err)&& !isset($size_err) && !isset($file1_err) && !isset($file2_err) && 
    !isset($file3_err) && !isset($file4_err) && !isset($file5_err)){
        
    
    if(isset($bedrooms) && isset($livingroom) && isset($dining) && isset($servant) && isset($kitchen) && isset($parking)
    && isset($attach_bathrooms) && isset($common_bathrooms) && isset($balcony) && isset($floor_type) && 
    isset($level) && isset($direction) && isset($rent) && isset($service_charge) && isset($advance) && isset($description)
    && isset($area) && isset($city) && isset($address) && isset($size) && isset($destination1) && isset($destination2) 
    && isset($destination3) && isset($destination4) && isset($destination5)){
            
        move_uploaded_file($filetemp1, $destination1);
        move_uploaded_file($filetemp2, $destination2);
        move_uploaded_file($filetemp3, $destination3);
        move_uploaded_file($filetemp4, $destination4);
        move_uploaded_file($filetemp5, $destination5);
        $renting_status = "Not Rented";
        $owner_id = $_SESSION['user_id'];
        
        $stmt = "INSERT INTO house_for_rent (bedrooms, livingrooms, dining, servant_room, kitchen, 
        parking, attach_bath, common_bath, balcony, floor_type, Level,direction,rent, 
        service_charge,advance,description,city,area,address, size, renting_status,img1,img2,img3,img4,img5, owner_id ) 
        VALUES('$bedrooms', '$livingroom', '$dining', '$servant', '$kitchen', '$parking', '$attach_bathrooms',
         '$common_bathrooms', '$balcony', '$floor_type', '$level', '$direction', '$rent', '$service_charge', '$advance', 
         '$description', '$city', '$area', 
         '$address', '$size', '$renting_status', '$destination1', '$destination2', '$destination3', '$destination4', '$destination5', '$owner_id')";

        $result = mysqli_query($db, $stmt);
        //echo $result;
        if($result){
            $success_msg = "Your Advertisement has been posted";

            
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
                            
                            
                        </div>
                    <?php }?>
                    <h4><a href="../" style="color: green; text-decoration: none;" >Switch to Home Page</a></h4>
                    <h2 class="title">Enter Details of your House for Rent</h2>
                    
                    <form method="POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Bedrooms</label>
                                    <select style="width:100px; height: 30px; text-align: center; font-size: 20px; background-color: DodgerBlue; " name= "bedrooms">
                                        <?php for($i = 1; $i<=10; $i++){?>
                                        <option value="<?php echo $i?>"><?php echo $i;?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <?php if(isset($bedrooms_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $bedrooms_err; ?>
                                </div>
                                <?php }?>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Living Room</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Yes
                                            <input type="radio" name="livingroom"<?php if (isset($livingroom) && $livingroom=="yes") echo "checked";?> value="yes">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">No
                                            <input type="radio" name="livingroom" <?php if (isset($livingroom) && $livingroom=="no") echo "checked";?> value="no">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <?php if(isset($livingroom_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $livingroom_err; ?>
                                </div>
                                <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                        <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Dining Room</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Yes
                                            <input type="radio" name="dining"<?php if (isset($dining) && $dining=="yes") echo "checked";?> value="yes">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">No
                                            <input type="radio" name="dining" <?php if (isset($dining) && $dining=="no") echo "checked";?> value="no">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <?php if(isset($dining_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $dining_err; ?>
                                </div>
                                <?php }?>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Servant Room</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Yes
                                        <input type="radio" name="servant"<?php if (isset($servant) && $servant=="yes") echo "checked";?> value="yes">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">No 
                                        <input type="radio" name="servant" <?php if (isset($servant) && $servant=="no") echo "checked";?> value="no">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <?php if(isset($servant_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $servant_err; ?>
                                </div>
                                <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Kitchens</label>
                                    <select style="width:100px; height: 30px; text-align: center; font-size: 20px; background-color: DodgerBlue; "name= "kitchen">
                                        <?php for($i = 1; $i<=3; $i++){?>
                                        <option value="<?php echo $i?>"><?php echo $i;?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <?php if(isset($kitchen_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $kitchen_err; ?>
                                </div>
                                <?php }?>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Parking</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Yes
                                            <input type="radio" name="parking"<?php if (isset($parking) && $parking=="yes") echo "checked";?> value="yes">
                                            <span class="checkmark"></span> 
                                        </label>
                                        <label class="radio-container">No
                                            <input type="radio" name="parking" <?php if (isset($parking) && $parking=="no") echo "checked";?> value="no">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <?php if(isset($parking_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $parking_err; ?>
                                </div>
                                <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Attach Bathrooms</label>
                                    <select id="attach" style="width:100px; height: 30px; text-align: center; font-size: 20px; background-color: DodgerBlue; "name= "attach_bathrooms">
                                        <?php for($i = 0; $i<=10; $i++){?>
                                        <option value="<?php echo $i?>"><?php echo $i;?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Common Bathrooms</label>
                                    <select id="common" style="width:100px; height: 30px; text-align: center; font-size: 20px; background-color: DodgerBlue; " name= "common_bathrooms">
                                        <?php for($i = 1; $i<=10; $i++){?>
                                        <option value="<?php echo $i?>"><?php echo $i;?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <?php if(isset($common_bathrooms_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $common_bathrooms_err; ?>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="row row-space">
                        <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Balcony</label>
                                    <select style="width:100px; height: 30px; text-align: center; font-size: 20px; background-color: DodgerBlue; "name= "balcony">
                                        <?php for($i = 1; $i<=10; $i++){?>
                                        <option value="<?php echo $i?>"><?php echo $i;?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <?php if(isset($balcony_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $balcony_err; ?>
                                </div>
                                <?php }?>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Floor Type</label>
                                    <input class="input--style-4" type="text" name="floor_type"  value="<?php if(isset($floor_type)){echo $floor_type;}?>">
                                </div>
                                <?php if(isset($floor_type_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $floor_type_err; ?>
                                </div>
                                <?php }?>
                                
                            </div>
                            
                        </div>
                        <div class="row row-space">
                        <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Level</label>
                                    <select style="width:100px; height: 30px; text-align: center; font-size: 20px; background-color: DodgerBlue; "name= "level">
                                        <?php for($i = 0; $i<=40; $i++){?>
                                        <option value="<?php echo $i?>"><?php echo $i;?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Direction</label>
                                    <input class="input--style-4" type="text" name="direction"  value="<?php if(isset($direction)){echo $direction;}?>">
                                </div>
                                <?php if(isset($direction_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $direction_err; ?>
                                </div>
                                <?php }?>
                                
                            </div>
                            
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Rent (per Month)</label>
                                    <input class="input--style-4" type="text" name="rent"  value="<?php if(isset($rent)){echo $rent;}?>">
                                    
                                </div>
                                <?php if(isset($rent_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $rent_err; ?>
                                </div>
                                <?php }?>
                            </div>
                           
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Service Charge</label>
                                    <input class="input--style-4" type="text" name="service_charge"  value="<?php if(isset($service_charge)){echo $service_charge;}?>">
                                </div>
                                <?php if(isset($service_charge_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $service_charge_err; ?>
                                </div>
                                <?php }?>
                                
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Advance</label>
                                    <input class="input--style-4" type="advance" name="advance">
                                </div>
                                <?php if(isset($advance_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $advance_err; ?>
                                </div>
                                <?php }?>    
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Description</label>
                                    <textarea style="font-size: 20px;"name="description" rows="5" cols="22"  value="<?php if(isset($description)){echo $description;}?>"></textarea>
                                </div>
                                <?php if(isset($description_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $description_err; ?>
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
                                <textarea style="font-size: 20px;"name="address" rows="5" cols="48"  value="<?php if(isset($address)){echo $address;}?>"></textarea>
                        </div>
                        <?php if(isset($address_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $address_err; ?>
                                </div>
                                <?php }?>
                        <div class="input-group">
                                <label class="label">Size (sqft.)</label>
                                <input class="input--style-4" type="text" name="size"  value="<?php if(isset($size)){echo $size;}?>">
                                
                        </div>
                            <?php if(isset($size_err)){ ?>
                            <div style="color: red;">
                                <?php echo $size_err; ?>
                            </div>
                            <?php }?>
                        
                        <div class="input-group">
                                <label class="label" for="file1">Your House Picture</label>
                                <input type="file" name="file1">
                        </div>
                        <?php if(isset($file1_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $file1_err; ?>
                                </div>
                        <?php }?>

                        <div class="input-group">
                                <label class="label" for="file2">Your House Picture</label>
                                <input type="file" name="file2">
                        </div>
                        <?php if(isset($file2_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $file2_err; ?>
                                </div>
                        <?php }?>

                        <div class="input-group">
                                <label class="label" for="file3">Your House Picture</label>
                                <input type="file" name="file3">
                        </div>
                        <?php if(isset($file3_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $file3_err; ?>
                                </div>
                        <?php }?>

                        <div class="input-group">
                                <label class="label" for="file4">Your House Picture</label>
                                <input type="file" name="file4">
                        </div>
                        <?php if(isset($file4_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $file4_err; ?>
                                </div>
                        <?php }?>

                        <div class="input-group">
                                <label class="label" for="file5">Your House Picture</label>
                                <input type="file" name="file5">
                        </div>
                        <?php if(isset($file5_err)){ ?>
                                <div style="color: red;">
                                    <?php echo $file5_err; ?>
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
    
    <!-- <script>
    $(document).ready(function(){
         $("#attach").change(function(){
             var value = $("#attach").val();
             
             if(value<3){
                 for(var i = 0; i<10; i++){
                    $('#common').html("<option value='"+i+"'>"+i+"</option>");   
                 }
                //   $('#common').html("<option value='3'>3</option>");
                //   $('#common').html("<option value='4'>4</option>");
             }
         }).change(function(){
            var value = $("#attach").val();
             if(value>3){
                $('#common').html("<option value='9'>9</option>");
             }
         })
         
    });
    </script> -->



</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
<?php
}
else{
    
    header('location: ../login_form/');
}
?>