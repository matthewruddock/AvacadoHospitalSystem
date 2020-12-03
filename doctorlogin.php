   <?php 
   session_start();
   if(isset($_SESSION['errflag']))
	{
		foreach($_SESSION as $key => $value)	//store SESSION values in to local variables
		{
			$$key = $value;
		}
		//session_destroy();		//destroys the session once the values are loaded. REFRESH to clear the fields
	}
	else
	{
		
		

		// default error message
		$fnerr = "";
		$lnerr = "";
		$pwerr = "";
		$emlerr = "";
		$mstaterr = "";
		$bioerr = "";
		$doberr = "";
		$imgerr = "";
		$err = " ";
		session_destroy();
	}
   
   ?>
  
   
   <!DOCTYPE html>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<!-- Add icon library -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="amc_style.css">

          <html>
       <head>
	   
          <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
					
                         </style>
                   <header>
			    <nav>
							<div class="header"></br>
								  <img src="logo.png" style="width:10%">
								  </div>

								  <div class="header">

								  </div>
								  <div class="header">

		  
								 <div class="header-right">
								<a href="index.php"> <i class="glyphicon glyphicon-home"></i>HOME</a>
								
								 
                                </div>
				 </nav>
	         
          </head>
              
     <body class ="amc">
                       <div class="bg-img">
                       
			<main>	<br/>	   
                    <div id="page-wrapper">
 
	                 <section id="region-main" class="col-12">

							   <div align = "center">
							   
								 <form method="POST" action="includes/login.inc.php"> 
										 <div class="imgcontainer">
										 <img src="davatar.jpg" alt ="logo" style="width:100px">  
										  </div>

										   
											<label for="uname"><b>Username</b></label>
											<input type="text" placeholder="Enter Username" title="No Space OR Numbers is allowed" name="mailuid" pattern="[a-zA-Z0-9]+" required></br>

											<label for="psw"><b>Password</b></label>
											<input type="password" placeholder="Enter Password" name="pwd" required></br>
											 <?php echo $err; ?>
							
											<button type="submit" class="loginbtn">Login </button>
											<label>
											<input type="checkbox" checked="checked" name="remember"> Remember me</br>
											 <span class="psw">Forgot <a href="#">password?</a></span>		 
											</label></br></br></br>
                         
						                       </div>
                                       </form>
						       </section> 
			               </div>
					    </div>
           </main>

       </body>
	 </header>    
</html>

