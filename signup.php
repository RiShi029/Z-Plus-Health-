<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);
            $param_email = trim($_POST['email']);
            $param_profession = trim($_POST['profession']);
            // $param_password = trim($_POST['password']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                    // echo $username_err;
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
              echo '<script type ="text/JavaScript">';  
              echo 'alert("Something went wrong")';  
              echo '</script>';    
              // <script> alert("") </script>;
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
    
}
else{
    $password = trim($_POST['password']);
}
// echo $password_err;

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['psw-repeat'])){
    $password_err = "Passwords should match";
    // echo $password_err;
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, email, profession, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ssss", $param_username,$param_email,$param_profession, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_email = $email;
        $param_profession = $profession;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <!-- ........................Bootstrap linked..................................  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/26fe7db935.js" crossorigin="anonymous"></script>
</head>
<style>
    * {box-sizing: border-box}

  input[type=text], input[type=password], input[type=number] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
button:hover {
  opacity:1;
}
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}
.container {
  padding: 16px;
}
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}
</style>
<body>
  <!-- .............................navbar created.......................................... -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Z+</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.html">Home</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="D:\WebTech Project\Z_PLUS-main\aboutus.html">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="D:\WebTech Project\Z_PLUS-main\contact.html" >Contact</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Doctor</a>
          <a class="dropdown-item" href="#">Patient</a>
          <a class="dropdown-item" href="D:\WebTech Project\Z_PLUS-main\lab.html">Lab Assitant</a>
         
        </div>
      <!-- <a class="nav-link" href="">Login</a> -->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.html">Sign up</a>
        </li>
    </ul>
    </div>
</nav>

    <form action="" method="post" style="border:1px solid #ccc">
        <div class="container">
          <h1>Sign Up</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>
          <label for="username"><b>Username*</b></label><br>
          <input type="text" placeholder="Enter Phone number" name="username" id="username4" required><br>
      
          <label for="email"><b>Email</b></label><br>
          <input type="text" placeholder="Enter Email" id="email" name="email" required><br>
          
          <label for="email"><b>Profession</b></label><br>
          <input type="text" placeholder="Patient, Doctor, Lab assistant" id="profession" name="profession" required><br>
          <label><br>
      
          <label for="psw"><b>Password*</b></label><br>
          <input type="password" placeholder="Enter Password" id="password4" name="password" required><br>
      
          <label for="psw-repeat"><b>Repeat Password*</b></label><br>
          <input type="password" placeholder="Repeat Password" id="password41" name="psw-repeat" required><br>
      
            <input type="checkbox" name="remember" style="margin-bottom:15px" required> Remember me
          </label><br>
      
          <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
      
          <div class="clearfix">
            <button type="button" id="cncl" class="cancelbtn">Cancel</button>
            <button type="submit" id="sin" class="signupbtn">Sign Up</button>
          </div>
        </div>
      </form>
</body>
</html>
