<?php
class USER
{
    private $db;
 
    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
 
   
 
    public function login($uname,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM login WHERE name=:uname LIMIT 1");
          $stmt->execute(array(':uname'=>$uname));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if($upass == $userRow['pass'])
             {
                $_SESSION['user_id'] = $userRow['id'];
                $_SESSION['user_name'] = $userRow['name'];
                $_SESSION['user_rank'] = $userRow['category'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_name']))
      {
         return true;
      }
   }
 
   public function redirect()
   {
       if($_SESSION['user_rank'] == 1)
        header('Location: head.php');
      else if($_SESSION['user_rank']==2)
        header('Location: sub.php');
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_category']);
        return true;
   }

   public function getBusyStatus($uname)
    {
      $query = $this->db->prepare("SELECT * FROM data WHERE given_to=:uname ORDER BY taskid DESC LIMIT 1");
      $query->execute(array(':uname'=>$uname));
      if($query->rowCount())
      {
        $userRow=$query->fetch(PDO::FETCH_ASSOC);

        if($userRow['completed']==0)
          echo "disabled";
      }
      
        
        
    }

  public function getSubs()
    {
      $query= $this->db->prepare("SELECT name FROM login WHERE category=2");
      $query->execute();
      return $query;
    }
    public function getMyTask($uname)
    {
     $query2 = $this->db->prepare("SELECT * FROM data WHERE given_by=:uname ORDER BY id DESC ");
      $query2->execute(array(':uname'=>$uname));
      return $query2;
    }
     public function getMyTaskUser($uname)
    {
     $query2 = $this->db->prepare("SELECT * FROM data WHERE given_to=:uname ORDER BY id DESC ");
      $query2->execute(array(':uname'=>$uname));
      return $query2;
    }

public function optionss($query){
 while($userRow=$query->fetch(PDO::FETCH_ASSOC))
                       {

                          echo "<option value='".$userRow['name']."'";
                          $user->getBusyStatus($userRow['name']);
                          echo ">";
                          echo $userRow['name'];
                          echo "</option>";

                        }
                       }

public function makePanel($query2){
    while($userRow2=$query2->fetch(PDO::FETCH_ASSOC))
                       {
echo "<div class='carousel-item'>
    <div class='row'>
      <div class='col s12 m12'>
        <div class='card-panel teal'> 
          <span class='white-text'> "
.$userRow2["given_to"]."<br>".$userRow2["textdata"]."<br>";
if($userRow2["completed"]==0){echo "Not Completed<form><input type='hidden' name='hid' value='".$userRow2["taskid"]."'>  <a class='waves-effect waves-light btn' type='submit' name='submit2'>Click to complete</a>";

}
else{echo "completed";}


      echo     "</span>
        </div>
      </div>
    </div> </div>";
}
if(isset($_POST['submit2'])){
  $hid=$_POST['hid'];
  
$user->changecomp($hid);


header("Refresh:0");

}





}
 public function changecomp($uname){

 $query3 = $this->db->prepare(" UPDATE `data` SET `completed` = '1' WHERE `data`.`taskid` = :uname");
   $query3->execute(array(':uname'=>$uname));
   $query3->execute();
      return $query3;


}

  public function getAllTask($uname)
    {
     $query3 = $this->db->prepare("SELECT * FROM data  ORDER BY id DESC ");
      $query3->execute(array(':uname'=>$uname));
      return $query3;
    }


public function makeTable($query3){
    while($userRow3=$query3->fetch(PDO::FETCH_ASSOC))
                       {
echo "<tr> <td>"
.$userRow3["given_to"]."</td><td>".$userRow3["given_by"]."</td><td>".$userRow3["textdata"]."</td>";
if($userRow3["completed"]==0){echo "<td>Not Completed</td>";}
else{echo "<td>completed</td>";}


      echo     "</tr>";
}}




 public function getMaxTaskid()
    {
       $query = $this->db->prepare("SELECT max(taskid) FROM data");
        $query->execute();
        $id = $query->fetchColumn();
        return $id;
     }
 
     public function addTask($task,$uname,$hname,$id)
     {
        
        
       
        $query = $this->db->prepare("INSERT INTO data (taskid,given_by,given_to,textdata,alert,completed) values (:taskid,:hname,:uname,:task,0,0)");
        
        $query->execute(array(':taskid'=>$id,':hname'=>$hname,':task'=>$task,':uname'=>$uname));
     }
}
  





// class subHeads {

//   private $name;
//   private $taskbusy; //Save 0 if Free and 1 Task is already Assigned!
//   private $db;


//   public function __construct($uname)
//   {
    
    
//     $this->name = $uname;
  

//   }

//   public function getName()
//     {
//       return $this->name;

//     }

    

//     public function addTask($task,$id,$hname)
//     {
//       if(($this->taskbusy)==0)
//       {
        
//         $DB_con = $USER->returnDb();
//         $query = $DB_con->prepare("INSERT INTO data (taskid,given_by,given_to,textdata,alert,completed) values (:taskid,:hname,($this->name),:task,0,0)");
//         $query->execute(array(':taskid'=>$id,':hname'=>$hname,':task'=>$task));
//       }
//     }


// }
?>