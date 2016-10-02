<?php
require_once 'connect.php';

if (!isset($_SESSION['user_name']))
  header('Location: index.php');
if($_SESSION['user_rank']!=1) {
  $user->redirect();
}
if(isset($_POST['btn-taskSbmt']))

{
 	

 	$hname = $_SESSION['user_name'];
 	$task = $_POST['task'];
 	$subHeads = $_POST['subHeads'];
 	$id=$user->getMaxTaskid();
 	$id++;
 
	foreach($subHeads as $names)
	{
		$user->addTask($task,$names,$hname,$id);
	}

header('Location: head.php');

}


?>