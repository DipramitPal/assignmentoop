<?php

require_once 'connect.php';


if (!isset($_SESSION['user_name']))
  header('Location: index.php');
if($_SESSION['user_rank']!=1) {
  $user->redirect();
}
$query = $user->getSubs();
	
?>

<!DOCTYPE html>
<html>
<head>
<title>| Add a New Task</title>
<!-- 
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/> -->
</head>
<body>

	<div class="anyForm">
					<div class="container white z-depth-5">
						<div class="row">
							<h2 class="center">Add a New Task</h2>
							<form class="col s10 offset-s1" method="POST" action="">
								<div class="row">
									<div class="input-field col s12">
										<textarea id="textarea1" class="materialize-textarea"></textarea>
										<label for="textarea1">Task</label>
									</div>
								</div>
								<div class="row">
										<div class="center">
											<button class="btn waves-effect waves-light btn-logIn"  name="btn-logIn">Submit
															<i class="material-icons right">send</i>
  											</button>
										</div>
								</div>
								

									<div class="input-field col s12">
										<select multiple>
											<option value="" disabled selected>Select Sub-Heads</option>
											<?php 

											 while($userRow=$query->fetch(PDO::FETCH_ASSOC))
											 {

											  	echo "<option value='".$userRow['name']."'";
											  	$user->getBUsyStatus($userRow['name']);
											  	echo ">";
											  	echo $userRow['name'];
											  	echo "</option>";

											 	
											 }



											?>
											
										</select>
										<label>Materialize Multiple Select</label>
									</div>


								
								
							</form>
						</div>
					</div>
	</div>



	<!-- <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script> -->
</body>
</html>