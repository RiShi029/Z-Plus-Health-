<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: index.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: index.php");
                            
                        }
                    }

                }

    }
}    


}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link rel="stylesheet" href="index.css">

  </head>
  <style>
    form {
      border: 3px solid #f1f1f1;
    }
    input[type="text"],
    input[type="password"] {
      width: 40%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    button {
      background-color: #04aa6d;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 40%;
    }
    button:hover {
      opacity: 0.8;
    }
    .imgcontainer {
      margin-left: 10%;
    }
    img.avatar {
      width: 20%;
      border-radius: 50%;
    }
    img.login_image {
      float: right;
      margin-top: -38%;
      width: 58%;
      height: 580px;
    }
    .container {
      padding: 16px;
    }
    span.psw {
      /* margin-left: 20%; */
      float: left;
      padding-top: 16px;
    }
    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }
    }
  </style>
  <body>
    <form method="post">
      <div class="imgcontainer">
        <img src="img_avatar2.png" alt="Avatar" class="avatar" />
      </div>

      <div class="container">
        <label for="username"><b>Username/Phone</b></label
        ><br />
        <input
          type="text"
          placeholder="Enter Username/Phone"
          name="username"
          required
        /><br />

        <label for="password"><b>Password</b></label
        ><br />
        <input
          type="password"
          placeholder="Enter Password"
          name="password"
          required
        /><br />

        <button type="submit">Login</button><br />
        <label>
          <input type="checkbox" name="remember"  /> Remember me
        </label>
      </div>
      <!-- <img
        src="captcha_code_file.php?rand=<?php echo rand(); ?>"
        id="captchaimg"
      />
      <label for="message">Enter the code above here :</label>
      <input id="6_letters_code" name="6_letters_code" type="text" /> -->

      <!-- <div class="container" style="background-color:#f1f1f1"> -->
      <span class="psw">Forgot <a href="#">password?</a></span>
      <!-- </div> -->
    </form>
    <img class="login_image" src="digital-india-main.jpg" />
  </body>
</html>
