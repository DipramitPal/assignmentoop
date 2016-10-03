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

   private function getBusyStatus($uname)
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

public function getAvailablesubs($query){
while($userRow=$query->fetch(PDO::FETCH_ASSOC))
                       {

                          echo "<option value='".$userRow['name']."'";
                          $this->getBusyStatus($userRow['name']);
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
if($userRow2["completed"]==0){echo "Not Completed <form method='POST' ><input type='hidden' name='hid' value='".$userRow2["taskid"]."'>  <input class='waves-effect waves-light btn submit22' type='submit' name='".$userRow2["taskid"]."' value='Click To Complete'></form>";

}
else{echo "completed";}


      echo     "</span>
        </div>
      </div>
    </div> </div>";
}






}
 public function changecomp($uname){

 $query3 = $this->db->prepare(" UPDATE `data` SET `completed` = '1',  `alert` = '1' WHERE `data`.`taskid` = :uname");
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
echo '<tr class="taskrow'.$userRow3['taskid'].'"> <td>'
.$userRow3["given_to"].'</td><td>'.$userRow3["given_by"].'</td><td class="task'.$userRow3['taskid'].'">'.$userRow3["textdata"]."</td>";
if($userRow3["completed"]==0)
  {
    echo "<td>Not Completed</td>";
    if($_SESSION['user_rank']==1)
      echo '<td class="editTask" id="'.$userRow3['taskid'].'"><i class="material-icons">mode_edit</i></td><td class="delTask" id="'.$userRow3['taskid'].'"><i class="material-icons">delete</i></td>';
  }
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

  public function getAlertsCount($hname)
    {
      $query = $this->db->prepare("SELECT COUNT(*) FROM data WHERE given_by = :hname AND alert = 1");
      $query->execute(array(':hname'=>$hname));
      $userRow = $query->fetchColumn();
      $this->displayAlertCount($userRow);

    }

    private function displayAlertCount($alertCount)
    {

      if($alertCount>0)
      {
        
        echo '<script type="text/javascript">$("#alertCount").html("'.$alertCount.'New");</script>';
        
      }
    }

    public function updateTask($taskid,$task)
    {
      $query = $this->db->prepare("UPDATE data SET textdata = :task WHERE taskid = :taskid");
      $query->execute(array(":task" => $task, ":taskid" => $taskid));

    }

    public function delTask($taskid)
    {
      $query = $this->db->prepare("DELETE FROM data WHERE taskid = :taskid");
      $query->execute(array(":taskid" => $taskid));

    }

    public function alertSection($hname)
    {
      $query = $this->db->prepare("SELECT taskid,given_to,textdata FROM data WHERE given_by = :hname AND alert = 1");
      $query->execute(array(":hname"=>$hname));
      while($userRow = $query->fetch(PDO::FETCH_ASSOC))
      {
        echo '<li class="collection-item avatar"><img src="css/info.png" class="circle"><span class="title">'.$userRow["given_to"].'</span>
         <p>Task ID:'.$userRow["taskid"].' :'.$userRow['textdata'].' <br>
         Completed
      </p>';
      }



    }
   public function clearAlert($hname)
    {
      $query = $this->db->prepare("UPDATE data SET alert = 0 WHERE given_by = :hname");
      $query->execute(array(":hname"=>$hname));
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