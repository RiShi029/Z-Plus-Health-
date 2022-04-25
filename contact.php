<?php
// require_once "config.php";

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$Phone=$_POST['Phone'];
$city=$_POST['city'];
$subject=$_POST['subject'];

// $sql="INSERT INTO `contact`.`contact` (`fname`, `lname`, `Phone`, `city`, `subject`) VALUES ('$fname', '$lname', '$Phone', '$city', '$subject');";
// // if($con->query($sql) == true){
// //   echo "Successfully inserted";}
  
// // $con->close();

$insert = false;
if(isset($_POST['fname'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $Phone=$_POST["Phone"];
    $city=$_POST["city"];
    $subject=$_POST["subject"];
    // $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    $sql="INSERT INTO contact (`fname`, `lname`, `Phone`, `city`, `subject`) VALUES ('$fname', '$lname', '$Phone', '$city', '$subject');";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact</title>
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/26fe7db935.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}
/* * {margin: 0%;} */

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}
input[type=number] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 15px;
  background-color: #f2f2f2;
  padding: 40px;
  width: 60%;

}
/* Navbar CSS */
.topnav {
    background-color: #333;
    overflow: hidden;
    width: 102%;
    margin: -1%;
}
.topnav a {

  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active  {
  background-color: #04AA6D;
  color: white;
}

.topnav-right {
  float: right;
}
.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
  .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

#footer {
  margin-top: 28%;
    background-color: #343a40;
    padding: 2% 2% .5%;
    color: white;
    text-align: center;
  }
  #footer p{
    margin-top: 8px;  
    
  }
  .icon-color {
    color: rgb(121, 120, 120);
    padding: 3px;
  }
  .icon-color:hover {
    color: red;
  }
  .f1{
      margin-left: 0;
  }
</style>
</head>
<body>
  <section style="margin-top: 1.3%;">
  <div class="topnav">
    <a class="active" href="#home">Z+</a>
    
    <div class="topnav-right">
     <a href="index.html">Home</a>
     <a href="aboutus.html">About</a>
      <a class="active" href="contact.html">Contact us</a>
      <div class="dropdown">
        <button class="dropbtn">Login  </button>
        <div class="dropdown-content">
          <a target="_blank" href="loginform.html">Patient</a>
          <a target="_blank" href="loginform.html">Doctor</a>
          <a target="_blank" href="loginform.html">Lab</a>
        </div>
    </div>
      <a target="_blank" href="signup.html">Sign up</a>
    </div>
  </div>
</section>
<h2 style="text-align: center; margin-top: 3%;">Contact Form</h2>
<p style="margin-left: 5% ; margin-right: 5%;">If you would like to get in touch with a doctor from a specific department,
     would like some specific information about the services we provide or just have
     a question for us, please fill up the Form given below and we will get back to you.</p>
     <img src="contact.webp" weight="40%" height="100%"/>

<div class="container" style="float: right;">
  <form action="" method="POST">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="fname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lname" placeholder="Your last name..">
    
    <label for="Phone">Phone</label>
    <input type="number" id="Phone" name="Phone" placeholder="Your Phone number...">

    <label for="city">city</label>
    <select id="city" name="city">
      <option value="city">Select your current city</option>
      <option value="Jaipur">Jaipur</option>
      <option value="Delhi">Delhi</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>

<footer id="footer">
  <a href=""><i class="fab fa-twitter icon-color fa-lg"></i></a>
  <a href=""><i class="fab fa-facebook-f icon-color fa-lg"></i></a>
  <a href=""><i class="fab fa-instagram icon-color fa-lg"></i></a>
  <a href=""><i class="fas fa-envelope icon-color fa-lg f1"></i></a> 
      <p>© Copyright 2022 Z+ Health</p>
  
    </footer>
    <script src="index.js"></script>
</body>
</html>