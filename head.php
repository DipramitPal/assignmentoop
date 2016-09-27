<!DOCTYPE html>
<html>
<head>
	<title>Head Page</title>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	 <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
          
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <style type="text/css">.card-panel{height: 400px !important;width: 400px !important;}
    .carousel {margin-top: -50px;}
    .headd{text-align: center;}
    </style>
<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=assign", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }



    $sql = "SELECT * from login where name='Ankit Saini'";
$result = $conn->query($sql);

while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
$name=$row['name'];
}
?>















</head>
<body>
<div class="navbar-fixed">
  <nav>
  
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><?php echo $name; ?></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="#one">Tasks Given</a></li>
        <li><a href="#two">All Tasks</a></li>
        <li><a href="#three">Alert</a></li>
        <li><a href="#four">Give Task</a></li>
        <li><a href="collapsible.html">My Info</a></li>
      </ul>
    </div>
  </nav></div>
        <div class="container" id="one"><br><br><br>
        <h1 class="headd">Given Tasks</h1>
  <div class="carousel"><?php  $sql2 = "SELECT * from data where given_by='Ankit Saini'";
$result2 = $conn->query($sql2);

while ($row2 = $result2->fetch(PDO::FETCH_ASSOC))
{
echo "<div class='carousel-item'>
    <div class='row'>
      <div class='col s12 m12'>
        <div class='card-panel teal'> 
          <span class='white-text'> "
.$row2["given_to"]."<br>".$row2["textdata"]."<br>";
if($row2["completed"]==0){echo "Not Completed";}
else{echo "completed";}


      echo     "</span>
        </div>
      </div>
    </div> </div>";
}






?>
 
 
       
  </div>
  <div class="row"><br><br><br></div>
  </div><div class="container">
  <hr></div>
  <div class="container" id="two">
    <h1 class="headd">All Tasks</h1>
  <div class="carousel">
 <?php  $sql3 = "SELECT * from data ";
$result3 = $conn->query($sql3);

while ($row3 = $result3->fetch(PDO::FETCH_ASSOC))
{
echo "<div class='carousel-item'>
    <div class='row'>
      <div class='col s12 m12'>
        <div class='card-panel teal'> 
          <span class='white-text'> "
.$row3["given_to"]."<br>".$row3["textdata"]."<br>";
if($row3["completed"]==0){echo "Not Completed";}
else{echo "completed";}


      echo     "</span>
        </div>
      </div>
    </div> </div>";
}






?>
  </div>
  <div class="row"><br><br><br></div>
  </div><div class="container">
  <hr></div>
   <div class="container" id="three">
    <h1 class="headd">Alert</h1>
  <div class="carousel">
 <?php  $sql2 = "SELECT * from data where given_by='Ankit Saini'";
$result2 = $conn->query($sql2);


while ($row2 = $result2->fetch(PDO::FETCH_ASSOC))
{
echo "<div class='carousel-item'>
    <div class='row'>
      <div class='col s12 m12'>
        <div class='card-panel teal'> 
          <span class='white-text'> "
.$row2["given_to"]."<br>".$row2["textdata"]."<br>";
if($row2["completed"]==0){echo "Not Completed";}
else{echo "completed";}


      echo     "</span>
        </div>
      </div>
    </div> </div>";
}






?>
  </div>
  <div class="row"><br><br><br></div>
  </div><div class="container">
  <hr></div>
  <div class="container" id="four">
    <h1 class="headd">Give Task</h1>
<div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Textarea</label>
        </div>
      </div>
      
        <div class="input-field col s12"><select multiple>
      <option value="" disabled selected>Choose your option</option> 

      <?php  $sql4 = "SELECT * from peopledata ";
$result4 = $conn->query($sql4);

while ($row4 = $result4->fetch(PDO::FETCH_ASSOC))
{
echo "<option value=".$row4["id"]." ";
if($row4["busyornot"]==0){echo "disabled>";}
else{echo ">";}
echo 
$row4["name"].

        "</option>";
}






?>
    
     
      
    </select>
    <label>Materialize Multiple Select</label>
  </div>
      
    </form>
     <button class="btn waves-effect waves-light col offset-l6"  name="action">Submit

  </button>
  </div>



  </div>
   <div class="row"><br><br><br></div>
  </div><div class="container">
  <hr></div>
      <script type="text/javascript"> $(document).ready(function(){
      $('.carousel').carousel();
    });

  $(document).ready(function() {
    $('select').material_select();
  });
</script>
</body>
</html>