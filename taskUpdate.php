<?php
require_once 'connect.php';

if (!isset($_SESSION['user_name']))
  header('Location: index.php');
if($_SESSION['user_rank']!=1) {
  $user->redirect();
}
if(isset($_POST['taskUpdt']))

{
 	

 	$taskid = $_POST['taskid'];
 	$task = $_POST['task'];
 	$user->updateTask($taskid,$task);
 	echo "Task Updated!";



}


?>