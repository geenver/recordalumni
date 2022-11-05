<?php 
  require 'db/connect.php';

  session_start();

  $username = "";
  $password = "";

  
  if(isset($_POST['username'])){
    $username = $_POST['username'];
  }
  if (isset($_POST['password'])) {
    $password = $_POST['password'];

  }
  
  echo $username ." : ".$password;

  

 $q = 'SELECT * FROM admin WHERE username=:username AND password=:password';

  $query = $dbh->prepare($q);

  $query->execute(array(':username' => $username, ':password' => $password));


  if($query->rowCount() == 0){
    header('Location: index.php?err=1');
  }else{

    $row = $query->fetch(PDO::FETCH_ASSOC);

    session_regenerate_id();
    
    $_SESSION['sess_sess_username'] = $row['username'];


    session_write_close();

    
     if( $_SESSION['sess_name'] == "admin"){
      header('Location: /Alumni/Dashboard/students.php');
    }else{
       header('Location: /Alumni/Dashboard/students.php');
    }
  
    
    
  }


?>