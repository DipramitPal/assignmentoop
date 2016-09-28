<?php

require_once 'connect.php';

if (!isset($_SESSION['user_name']))
  header('Location: index.php');
if($_SESSION['user_rank']!=2) {
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
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css">
            
      <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
  </head>
  <body>
    <div class="navbar-fixed">
      <nav>
      
        <div class="nav-wrapper">
          <a href="#" class="brand-logo">Logo</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li id="alltask"><a href="#">All Tasks</a></li>
             <li id="mytask"><a href="#taskgiven">My Task</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <div id="page">
      


    </div>

  </body>
</html>