<?php
require_once 'connect.php';

if (!isset($_SESSION['user_name']))
  header('Location: index.php');

$id=$_POST["id"];

$user->changecomp($id);
echo "Updated!";

?>