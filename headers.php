<?php
error_reporting(0);
include("dbconnection.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");
?>
<!DOCTYPE html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <html>
           
			 <style>
					* {box-sizing: border-box;}

					body { 
					  margin: 0;
					  font-family: Arial, Helvetica, sans-serif;
					}

					.header {
					  overflow: hidden;
					  background-color: #f1f1f1;
					  padding: 0px 10px;
					}

					.header a {
					  float: left;
					  color: black;
					  text-align: center;
					  padding: 12px;
					  text-decoration: none;
					  font-size: 12px; 
					  line-height: 12px;
					  border-radius: 4px;
					}

					.header a.logo {
					  font-size: 20px;
					  font-weight: bold;
					}

					.header a:hover {
					  background-color: #ddd;
					  color: black;
					}

					.header a.active {
					  background-color: dodgerblue;
					  color: white;
					}

					.header-right {
					  float: right;
					}

					@media screen and (max-width: 500px) {
					  .header a {
						float: none;
						display: block;
						text-align: left;
					  }
					  
					  .header-right {
						float: none;
					  }
					}
             </style>
          <style>
							body {font-family: Arial, Helvetica, sans-serif;}
							* {box-sizing: border-box;}

							/* Full-width input fields */
							input[type=text], input[type=password] {
							  width: 30%;
							  padding: 15px;
							  margin: 5px 0 22px 0;
							  display: inline-block;
							  border: none;
							  background: #f1f1f1;
							}

							/* Add a background color when the inputs get focus */
							input[type=text]:focus, input[type=password]:focus {
							  background-color: #ddd;
							  outline: none;
							}

							/* Set a style for all buttons */
							button {
							  background-color: #4CAF50;
							  color: white;
							  padding: 7px 10px;
							  margin: 8px 0;
							  border: none;
							  cursor: pointer;
							  width: 50%;
							  opacity: 0.9;
							}

							button:hover {
							  opacity:1;
							}

							/* Extra styles for the cancel button */
							.cancelbtn {
							  padding: 7px 10px;
							  background-color: #f44336;
							}

							/* Float cancel and signup buttons and add an equal width */
							.cancelbtn, .signupbtn {
							  float: left;
							  width: 10%;
							}

							/* Add padding to container elements */
							.container {
							  padding: 16px;
							}

							/* The Modal (background) */
							.modal {
							  display: none; /* Hidden by default */
							  position: fixed; /* Stay in place */
							  z-index: 1; /* Sit on top */
							  left: 0;
							  top: 0;
							  width: 50%; /* Full width */
							  height: 50%; /* Full height */
							  overflow: auto; /* Enable scroll if needed */
							  background-color: #474e5d;
							  padding-top: 50px;
							}

							/* Modal Content/Box */
							.modal-content {
							  background-color: #fefefe;
							  margin: 5% auto 10% auto; /* 5% from the top, 3% from the bottom and centered */
							  border: 1px solid #888;
							  width: 80%; /* Could be more or less, depending on screen size */
							}

							/* Style the horizontal ruler */
							hr {
							  border: 1px solid #f1f1f1;
							  margin-bottom: 25px;
							}
							 
							/* The Close Button (x) */
							.close {
							  position: absolute;
							  right: 35px;
							  top: 15px;
							  font-size: 40px;
							  font-weight: bold;
							  color: #f1f1f1;
							}

							.close:hover,
							.close:focus {
							  color: #f44336;
							  cursor: pointer;
							}

							/* Clear floats */
							.clearfix::after {
							  content: "";
							  clear: both;
							  display: table;
							}

							/* Change styles for cancel button and signup button on extra small screens */
							@media screen and (max-width: 300px) {
							  .cancelbtn, .signupbtn {
								 width: 100%;
							  }
							  
							}
                    </style>
                 <style>
							   .bg-img {
							  /* The image used */
							  background-image: url("nurse.jpg");

							  min-height: 580px;

							  /* Center and scale the image nicely */
							  background-position: ;
							  background-repeat: no-repeat;
							  background-size: cover;
							  position: relative;
							}
                </style>
<style>
divs {
  background-color: gray;
  width: 300px;
  border: 15px solid black;
  padding: 50px;
  margin: 20px;
}
</style>
           <header>
						<nav>
                          <div class="header"></br>
                         <img src="logo.png" alt ="logo" style="width:10%"> 
                          </div>

                          <div class="header">

                          </div>
                          <div class="header">

  
                         <div class="header-right">
                        <a href="index.php"> <i class="glyphicon glyphicon-home"></i>LOG OUT</a>
						<a href="patientdatadisplay.php"> <img src="avatar2.png" style="width:3%"></i>Registered Patient</a>
                       
						 
								   </div>
					    </nav>
						<br/><br/><br/><br/><br/><br/><br/>
<script type="application/javascript">
(function(document) {
	'use strict';

	var LightTableFilter = (function(Arr) {

		var _input;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}

		function _filter(row) {
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});

})(document);
</script>
<style>
input[type=submit]{
background-color: #4CAF50; /* Green */ border: none; 
cursor:pointer;
color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;
}
input[type=reset]{
background-color: #4CAF50; /* Green */ border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;
}
input[type=text]{
	display: block;
    width: 75%;
    height: 24px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
input[type=password]{
	display: block;
    width: 75%;
    height: 24px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}

input[type=number]{
	display: block;
    width: 75%;
    height: 24px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
</style>
</head>

  <div id="head">
    	 
   
  </div>
      <div style="text-align:center">
<?php
if(isset($_SESSION[adminid]))
{
include("menu.php");
}
if(isset($_SESSION[patientid]))
{
include("menu.php");
}
if(isset($_SESSION[doctorid]))
{
include("menu.php");
}

?>
</div>
</div>
