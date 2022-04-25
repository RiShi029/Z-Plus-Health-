<!DOCTYPE html>
<html lang="en">
<head>
        <title> Z + </title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <!-- ........................Bootstrap linked..................................  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/26fe7db935.js" crossorigin="anonymous"></script>
</head>
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
            <a class="nav-link" href="index.php">Home</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="aboutus.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php" >Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Login
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="login.php">Doctor</a>
              <a class="dropdown-item" href="login.php">Patient</a>
              <a class="dropdown-item" href="login.php">Lab Assitant</a>
             
            </div>
          <!-- <a class="nav-link" href="">Login</a> -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php">Sign up</a>
            </li>
        </ul>
        </div>
    </nav>

    <!-- .......................................Carousel.................................................... -->
    <Section id="testimonials">
    <!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext"></div>
    <img src="images/medical-lab-technician-647.jpeg"  class="c-img">
    <div class="text">Caption Text</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext"></div>
    <img src="images/ambulance-services-wise-or-vice-usage.jpg"  class="c-img">
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext"></div>
    <img src="images/Appointment.jpg" class="c-img" >
    <div class="text">Caption Three</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
    </Section>

<section id="info">
  <div class="container-fluid">
    <h1>Who we are...!</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, quia totam esse ad earum, sit, eius architecto adipisci ut excepturi odit aliquid. Similique veniam ea eveniet nesciunt doloremque non fuga modi, dicta laboriosam, eos ab, minus atque quidem! Veniam repellendus quod repellat facere beatae perspiciatis cum voluptate aspernatur, nihil nulla!</p>
  </div>

</section>

<!-- ...................................icons..................................... -->

<section id="features">
  <div class="container-fluid">
  <div class="row row1">
    <div class="col-lg-3">
      <i class="fa-solid fa-arrow-up-from-bracket fa-5x  fas"></i>
      <h3 class="h33">Upload</h3>
    </div>
    <div class="col-lg-3">
      <i class="fa-solid fa-file-waveform fa-5x  fas"></i>
      <h3>Prescription</h3>
    </div>
    <div class="col-lg-3">
      <i class="fa-solid fa-flask fa-5x  fas"></i>
      <h3>Lab report</h3>
    </div>
    <div class="col-lg-3">
      <i class="fa-solid fa-handshake fa-5x  fas"></i>
      <h3>Consultation</h3>
    </div>
  </div>
  </div>
    </section>

      <!-- Footer -->

  <footer id="footer">
    <a href=""><i class="fab fa-twitter icon-color fa-lg"></i></a>
    <a href=""><i class="fab fa-facebook-f icon-color fa-lg"></i></a>
    <a href=""><i class="fab fa-instagram icon-color fa-lg"></i></a>
    <a href=""><i class="fas fa-envelope icon-color fa-lg f1"></i></a> 
        <p>© Copyright 2022 Z+ Health</p>
    
      </footer>
      <script src="index.js"></script>
    

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>