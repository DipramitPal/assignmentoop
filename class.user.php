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
}
<<<<<<< HEAD




class subHeads {

  private $name;
  private $taskbusy; //Save 0 if Free and 1 Task is already Assigned!


  public function __construct($uname)
  {
    $query = $DB_con->prepare("SELECT * FROM data WHERE given_to=:uname LIMIT 1");
    $query->execute(array(':uname'=>$uname));
    $userRow=$query->fetch(PDO::FETCH_ASSOC);
    if(userRow['completed']==1)
      $this->taskbusy=0;
    else if(userRow['completed']==0)
      $this->taskbusy=1;
    $this->name = $uname;
  

  }

  public function getName()
    {
      return $this->name;

    }

    public function getBusyStatus()
    {
      return $this->taskbusy;
    }

    public function addTask($task,$id,$hname)
    {
      if(($this->taskbusy)==0)
      {
        
        $query = $DB_con->prepare("INSERT INTO data (taskid,given_by,given_to,textdata,alert,completed) values (:taskid,:hname,($this->name),:task,0,0))";
        $query->execute(array(':taskid'=>$id,':hname'=>$hname,':task'=>$task));
      }
    }


}
=======
>>>>>>> 63d03b85aa7f1e7b953f55f5d983793e21b8275f
?>