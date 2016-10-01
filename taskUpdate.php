<?php
require_once 'connect.php';

if (!isset($_SESSION['user_name']))
  header('Location: index.php');
if($_SESSION['user_rank']!=1) {
  $user->redirect();
}
if(isset($_POST['taskUpdt']))

{
 	
	if($_POST['taskUpdt']==1)
	{
	 	$taskid = $_POST['taskid'];
	 	$task = $_POST['task'];
	 	$user->updateTask($taskid,$task);
	 	echo "Updated!";

	 }

	 else if($_POST['taskUpdt']==2)
	 {
	 	$taskid = $_POST['taskid'];
	 	$user->delTask($taskid);
	 	echo "Deleted!";
	 }

}


?>