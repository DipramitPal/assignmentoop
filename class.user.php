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