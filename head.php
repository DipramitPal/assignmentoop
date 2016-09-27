<?php

require_once 'connect.php';

if (!isset($_SESSION['user_name']))
  header('Location: index.php');
if($_SESSION['user_rank']!=1) {
  $user->redirect();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>| Head's Page</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
     <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
            
      <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
      
  </head>
  <body>
    <div class="navbar-fixed">
      <nav>
      
        <div class="nav-wrapper">
          <a href="#" class="brand-logo">Logo</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#one">Add Task</a></li>
            <li><a href="#two">All Tasks</a></li>
            <li><a href="#">Alerts</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </body>
</html>