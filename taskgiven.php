 <?php

require_once 'connect.php';


if (!isset($_SESSION['user_name']))
  header('Location: index.php');
if($_SESSION['user_rank']!=1) {
  $user->redirect();
}
$query2 = $user->getMyTask($_SESSION['user_name']);
$alertCount = $user->getAlertsCount($_SESSION['user_name']);

?>


 <div class="container" ><br>
        <h1 class="headd">Given Tasks</h1>
  <div class="carousel"><?php  
$user->makePanel($query2);








?>

<!--  <script type="text/javascript">$(document).ready(function(){
      $('.carousel').carousel();
    });</script> -->
<script type="text/javascript" src="js/script.js"></script>       
