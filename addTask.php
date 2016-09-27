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
								
							</form>
						</div>
					</div>
	</div>



	<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>