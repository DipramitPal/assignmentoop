<?php
require_once 'connect.php';

if($user->is_loggedin()!="")
{
 $user->redirect();
}

if(isset($_POST['btn-logIn']))
{
 $uname = $_POST['uname'];

 $upass = $_POST['pass'];
  
 if($user->login($uname,$upass))
 {
  $user->redirect();
 }
 else
 {
  ?>
<script type="text/javascript">alert('Wrong Username/Password Combination!')</script>

 <?php
 } 
}
?>


<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
	    	    <div class="anyForm">
					<div class="container white z-depth-5">
						<div class="row">
							<h2 class="center">Login</h2>
							<form class="col s10 offset-s1" method="POST" action="">
								<div class="row">
									<div class="input-field col s8 offset-s2">
										<i class="material-icons prefix">account_circle</i>
										<input id="userName" type="text" class="validate" name="uname" required>
										<label for="userName">User Name</label>
									</div>
									<div class="input-field col s8 offset-s2">
										<i class="material-icons prefix">vpn_key</i>
			          					<input id="password" type="password" class="validate" name="pass" required>
			          					<label for="password">Password</label>
									</div>
								</div>
								<div class="row">
										<div class="center">
											<button class="btn waves-effect waves-light btn-logIn" type="submit" name="btn-logIn">Submit
															<i class="material-icons right">send</i>
  											</button>
										</div>
								</div>
								
							</form>
						</div>
					</div>
				</div>

    	


      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>
