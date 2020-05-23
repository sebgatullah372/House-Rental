<?php
  $db = new mysqli("localhost", "root", "", "houserent");
  if(mysqli_connect_errno()){
      echo "Connection Failed";
  }
  else{
      //echo "Database connected Succesfully"; 
  }

?>