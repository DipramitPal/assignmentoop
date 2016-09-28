 <?php

require_once 'connect.php';


if (!isset($_SESSION['user_name']))
  header('Location: index.php');

$query3 = $user->getAllTask($_SESSION['user_name']);
  
?>


 <div class="container" ><br>
        <h1 class="headd">All Tasks</h1>
  <div class="carousel">
  <table>
  <thead><tr>
  	<td>Given To</td>
  	<td>Given By</td>
  	<td>Task</td>
  	<Td>Status</Td></tr>
  </thead><?php  
$user->makeTable($query3);








?>
 </table>

       
  </div>