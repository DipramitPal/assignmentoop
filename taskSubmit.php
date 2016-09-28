<?php
require_once 'connect.php';

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