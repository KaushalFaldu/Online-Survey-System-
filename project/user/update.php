<?php 

    require_once("Uconnection.php");

    if(isset($_POST['update']))
    {
        $UserID = $_GET['ID'];
        $TitleName = $_POST['title'];
        $Questions = $_POST['question'];
        $OptionA = $_POST['Option_A'];
        $OptionB = $_POST['Option_B'];
        $OptionC = $_POST['Option_C'];
        $OptionD = $_POST['Option_D'];
        

        $query = " update records set Title = '".$TitleName."', Question='".$Questions."',Option_A='".$OptionA."',Option_B='".$OptionB."',Option_C='".$OptionC."',Option_D='".$OptionD."' where User_ID='".$UserID."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("Location: viewcopy.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("Location: viewcopy.php");
    }


?>
<?php

require_once("Uconnection.php");
if(isset($_GET['Del']))
         {
             $UserID = $_GET['Del'];
             $query = " update records set status=0 where User_ID = '".$UserID."'";
             $result = mysqli_query($con,$query);
             if($result)
             {
                 header("location:viewcopy.php");
             }
             else
             {
                 echo ' Please Check Your Query ';
             }
        }
         else
         {
             header("location:viewcopy.php");
         }
?>