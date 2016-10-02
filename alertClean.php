<?php

require_once 'connect.php';
if (!isset($_SESSION['user_name']))
  header('Location: index.php');
$user->redirect();

if(isset($_POST['alertClean'])&& $_SESSION['user_rank']==1)
	$user->clearAlert($_SESSION['user_name']);

?>