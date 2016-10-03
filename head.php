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
        <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
     <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="js/materialize.min.js"></script>
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
            <li id="addTask"><a href="#">Add Task</a></li>
             <li id="taskgiven"><a href="#">Task Given By Me</a></li>
            <li id="alerts"><a href="#">Alerts <span id="alertCount"></span></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <div id="page">
    <script type="text/javascript">$("#page").load('taskgiven.php');</script>


    </div>
    <div id="modal2" class="modal bottom-sheet">
    <div class="modal-content">
     <ul class="collection alertSection"> 
     <?php $user->alertSection($_SESSION['user_name']); ?>
     
     </ul>
    </div>
    
  </div>
          

  </body>
</html>