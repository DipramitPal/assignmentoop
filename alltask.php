   <?php

require_once 'connect.php';


if (!isset($_SESSION['user_name']))
  header('Location: index.php');

$query3 = $user->getAllTask($_SESSION['user_name']);
if($_SESSION['user_rank']==1)
  $alertCount = $user->getAlertsCount($_SESSION['user_name']);
?>

  <div class="container" ><br>
    <h1 class="headd">All Tasks</h1>
    <table>
      <thead>
        <tr>
      	<td>Given To</td>
      	<td>Given By</td>
      	<td>Task</td>
      	<Td>Status</Td></tr>
      </thead>
      <tbody><?php  
    $user->makeTable($query3);
    ?>
    </tbody>  
     </table>

           
    </div>
    <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Edit Task</h4>
      
      <p> <div class="row">
        <div class="input-field col s12">
        Task ID:
          <input disabled id="disabled" type="text" class="validate modal-taskid" name="taskid">
          </div>
          <div class="input-field col s12">
          Task:
          <textarea id="textarea2" class="materialize-textarea modal-task" name="task"></textarea>          
          
        </div>
      </div></p>
    </div>
    
    <div class="modal-footer">
    <button class="btn waves-effect waves-light btn-taskUpdt" name="btn-taskUpdt">Save</button>
    
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
  </div>
  
<script type="text/javascript" src="js/script.js"></script>
