<?php
require_once 'connect.php';

if (!isset($_SESSION['user_name']))
  header('Location: index.php');

$taskid=$_POST["taskid"];

$user->changecomp($taskid);

?>