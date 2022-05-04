<?php
    session_start();  
    include("./connection2.php");    
      
    $email = $_POST['email']; 
    $password =$_POST['password']; 
    
    $sql = "SELECT * FROM users WHERE email = '".$email."' and  password = '".$password."'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();
        //echo $row['email_id'];
        $_SESSION["emailid"] =  $row['email'];  
        if($row['category'] == 'user')
        {
            header("Location: ../home.php"); 
        }
        else if($row['category'] == 'admin')
        {
            header("Location: ../admin/adminhome.php");
        }
    } 
    else 
    {
        header('Location: ./index.html');
    }
    $conn->close();
?>