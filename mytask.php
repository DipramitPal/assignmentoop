 <?php

require_once 'connect.php';


if (!isset($_SESSION['user_name']))
  header('Location: index.php');
if($_SESSION['user_rank']!=2) {
  $user->redirect();
}
$query2 = $user->getMyTaskUser($_SESSION['user_name']);
  
?>
<style type="text/css">.card-panel{height: 400px !important;width: 400px !important;}</style>

 <div class="container" ><br>
        <h1 class="headd">Given Tasks</h1>
  <div class="carousel"><?php  
$user->makePanel($query2);








?>
 
 <script type="text/javascript">$(document).ready(function(){
      $('.carousel').carousel();
    });</script>
       
  </div>