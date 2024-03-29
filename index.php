<!DOCTYPE html>
<?php session_start();
$_SESSION["role"]="Doctor";
if($_SESSION["role"]=="Guest"){
$rowcol="w3-row w3-large w3-light-grey";
$navClass="w3-col s3";
$AClass="w3-button w3-block";
}else if(($_SESSION["role"]=="Doctor")||($_SESSION["role"]=="Nurse")){
  $navClass="row";
  $rowcol="col-md-8";
  $AClass="col-md-2 cell";
};
?>
<html>
<head>
<title>Avacodo Hospital System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="amc_style.css">
</head>


<body class="amc">



<!-- Links (sit on top) -->
<div class="w3-top">

  <div class=<?php echo '"'.$rowcol.'"';?>>
  <ul>
    <div class=<?php echo '"'.$navClass.'"';?>>
	
      <li><a href="#" class=<?php echo '"'.$AClass.'"';?>>Home</a></li>
    </div>
    <div class=<?php echo '"'.$navClass.'"';?>>
      <li><a href="#plans" class=<?php echo '"'.$AClass.'"';?>>Appointments</a><li>
    </div>
    <div class=<?php echo '"'.$navClass.'"';?>>
      <li><a href="#about" class=<?php echo '"'.$AClass.'"';?>>About</a></li>
    </div>
	
    <?php if(($_SESSION["role"]=="Doctor")||($_SESSION["role"]=="Nurse")||($_SESSION["role"]=="Admin")){
    echo "  <div class= '$navClass'>
        <li><a href='#' class='$AClass'>Edit Profile</a></li>
      </div>
      <div class='$navClass'>
         <li><a href='#' class='$AClass'>Login Patient</a></li>
       </div>
       <div class='$navClass'>
          <li><a href='#' class='$AClass'>Register Patient</a></li>
        </div>
        <div class='$navClass'>
          <li><a href='#' class='$AClass'>Search Patient</a></li>
         </div>";
    };?>
	<li><a href="#contact" class="w3-button w3-block" style = 'color:white'>Contact</a></li>
	</ul>
    <?php ?>
    <div class="w3-col s3">

	  <div class="dropdown">
	 <a> <button class="dropbtn"><img src="login.jfif" style="width:25%"></button></a>
	  <div class="dropdown-content">
		<a href="doctorlogin.php">Doctor Login</a>
		<a href="nurselogin.php">Nurse Login</a>
		<a href="login.php">Admin Login</a>
	  </div>
	</div>
      

    </div>

  </div>
</div>

<!-- Content -->
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
  <br>
  <br>
  <div class="w3-panel">
    <h1><b><img src="logo.png" style="width:20%">Avacodo Hospital System</b></h1>
    <p></p>
  </div>

  <!-- Slideshow -->
  <div class="w3-container">
    <div class="w3-display-container mySlides">
      <img src="nursing.png" style="width:100%">
      <div class="w3-display-topleft w3-container w3-padding-32">
        <span class="w3-white w3-padding-large w3-animate-bottom">Welcome</span>
      </div>
    </div>
    <div class="w3-display-container mySlides">
      <img src="Black-Nurse.jpg" style="width:100%">
      <div class="w3-display-middle w3-container w3-padding-32">
        <span class="w3-white w3-padding-large w3-animate-bottom">Welcome</span>
      </div>
    </div>
    <div class="w3-display-container mySlides">
      <img src="nurse.jpg" style="width:100%">
      <div class="w3-display-topright w3-container w3-padding-32">
        <span class="w3-white w3-padding-large w3-animate-bottom">Welcome</span>
      </div>
    </div>

    <!-- Slideshow next/previous buttons -->
    <div class="w3-container w3-dark-grey w3-padding w3-xlarge">
      <div class="w3-left" onclick="plusDivs(-1)"><i class="fa fa-arrow-circle-left w3-hover-text-teal"></i></div>
      <div class="w3-right" onclick="plusDivs(1)"><i class="fa fa-arrow-circle-right w3-hover-text-teal"></i></div>

      <div class="w3-center">
        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
      </div>
    </div>
  </div>

  <!-- Grid -->
  <div class="w3-row w3-container">
    <div class="w3-center w3-padding-64">
      <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">What We Offer</span>
    </div>
    <div class="w3-col l3 m6 w3-light-grey w3-container w3-padding-16">
      <h3>Body Mass Index </h3>
	  <p> Body mass index (BMI) is a measure of body fat based on height and weight that applies to adult men and women . </P>
      <p> <a href="BMI.php"> Calculate Body Mass Index Here</a></p>

    </div>



    <div class="w3-col l3 m6 w3-grey w3-container w3-padding-16">
      <h3>X-Rays</h3>
      <p>An X-ray, or X-radiation, is a penetrating form of high-energy electromagnetic radiation. Most X-rays have a wavelength ranging from 10 picometres </p>
    </div>

    <div class="w3-col l3 m6 w3-dark-grey w3-container w3-padding-16">
      <h3>Consultation</h3>
      <p>Online Doctor Consultations with 200+ Doctors through chat, call & get answers to all your medical issues online. Talk to a doctor Online 24X7 from anywhere. </p>
    </div>

    <div class="w3-col l3 m6 w3-black w3-container w3-padding-16">
      <h3>MRI Scan</h3>
      <p>Magnetic resonance imaging (MRI) is a type of scan that uses strong magnetic fields and radio waves to produce detailed images of the inside of the body.</p>
    </div>
  </div>
 <br/> <br/> <br/>
  <!-- Grid -->
  <div class="w3-row-padding" id="plans">
    <br/> <br/><div class="w3-center w3-padding-64">
      <h3><b><u>Appointments</b></u></h3>
      <p><strong>Make an appointments which suits you.</strong></p>
    </div>

    <div class="w3-third w3-margin-bottom"> 
      <ul class="w3-ul w3-border w3-center w3-hover-shadow w3-white">
        <li class="w3-black w3-xlarge w3-padding-32">Dental Service</li>
        <li class="w3-padding-16"><b>Teeth</b> Cleaning </li>
        <li class="w3-padding-16"><b>Teeth</b> Filling</li>
        <li class="w3-padding-16"><b>Extraction</b> </li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h3 class="w3-wide">Enjoy </h3>
		  <h4 class="w3-wide"> Cheap Rates</h4>
          <span class="w3-opacity"></span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-green w3-padding-large"> <a href="appointment.php"> Click Here </a></button>
        </li>
      </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-center w3-hover-shadow w3-white">
        <li class="w3-dark-grey w3-xlarge w3-padding-32">Doctor Consultation</li>
        <li class="w3-padding-16"><b>What To Expect</b></br></br> When you come to us, you will complete a patient medical history form that will help the surgeons understand your medical history and current concerns. It is possible that they will require some diagnostic studies, such as an ultra sound to help diagnose the extent of your venous disease. Once your doctor understands your medical needs, they will discuss and develop a plan of care specific to you. You will meet with our support staff that will assist you with insurance questions, financing and scheduling of your treatment.</li>


        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-green w3-padding-large"><a href="appointment.php"> Click Here </a></button>
        </li>
      </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-center w3-hover-shadow w3-white">
        <li class="w3-black w3-xlarge w3-padding-32">MRI/X-RAY</li>
        <li class="w3-padding-16"><b>X-ray radiography</b>Detects bone fractures, certain tumors and other abnormal masses, pneumonia, some types of injuries, calcifications, foreign objects, dental problems. </li>
        <li class="w3-padding-16"><b>Mammography</b> A radiograph of the breast that is used for cancer detection and diagnosis.</li>
        <li class="w3-padding-16"><b>Fluoroscopy</b>Uses x-rays and and a fluorescent screen to obtain real-time images of movement within the body or to view diagnostic processes, such as following the path of an injected or swallowed contrast agent </li>


        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-green w3-padding-large"><a href="appointment.php"> Click Here </a></button>
        </li>
      </ul>
    </div>
	<br/> <br/><br/> <br/>
  </div>

  <!-- Grid -->
  <div class="w3-row-padding" id="about">
    <div class="w3-center w3-padding-64">
     <br/> <br/> <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16"><strong>Who We Are</strong></span>
    </div>

    <div class="w3-third w3-margin-bottom">
      <div class="w3-card-4">
        <img src="open.jfif" alt="John" style="width:100%">
        <div class="w3-container">
        </div>
      </div>
    </div>

    <div class="w3-third w3-margin-bottom w3-dark-grey"> 
      <div class="w3-card-4">
        <img src="logo.png" alt="Mike" style="width:40%">
        <div class="w3-container">
          <h4>Avacodo Medical Center </h4>
          <h3><p class="w3-opacity">Was Founded IN 1997.</p></h3>
          <p></bold>Mission:</bold>
             To serve our patients and the community in a way that is second to none </p>

              <p><bold>  Vision:</bold>
               To be the premier integrated healthcare delivery system by providing the highest quality, most cost effective service, which is accessible and sensitive to all.</p>

        </div>
      </div>
    </div>

    <div class="w3-third w3-margin-bottom w3-grey">
      <div class="w3-card-4">
        <img src="news.png" alt="Jane" style="width:33%">
        <div class="w3-container">
          <h3>News And Post</h3>
          <p class="w3-opacity"></p>
          <p>Due To Covid-19 Mask must be worn at all times at our locations. </p>

        </div>
      </div>
    </div>

  </div>

  <!-- Contact -->
  <div class="w3-center w3-padding-64" id="contact">
    <br/> <br/><span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16"><b>Contact Us</b></span>
  </div>

  <form class="w3-container" action="/action_page.php" target="_blank">
    <div class="w3-section">
      <label>Name</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Name" required>
    </div>
    <div class="w3-section">
      <label>Email</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Email" required>
    </div>
    <div class="w3-section">
      <label>Subject</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Subject" required>
    </div>
    <div class="w3-section">
      <label>Message</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Message" required>
    </div>
    <button type="submit" class="w3-button w3-block w3-black">Send</button>
  </form>

</div>


<!-- Footer -->

<footer class="w3-container w3-padding-32 w3-light-grey w3-center">
  <h4>Footer</h4>
  <a href="#" class="w3-button w3-black w3-margin"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>

  <p>Powered by <a href="Rover.html" title="W3.CSS" target="_blank" class="w3-hover-text-green">Rover</a></p>
</footer>


<script>
// Slideshow
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demodots");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-white";
}
</script>

</body>
</html>
