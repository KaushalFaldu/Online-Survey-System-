<?php 

include("../user/Uconnection.php");
$con=$GLOBALS["con"];

    if(isset($_POST['update']))
    {
        $UserID = $_GET['ID'];
        $TitleName = $_POST['title'];
        $Questions = $_POST['question'];
        $OptionA = $_POST['Option_A'];
        $OptionB = $_POST['Option_B'];
        $OptionC = $_POST['Option_C'];
        $OptionD = $_POST['Option_D'];
        

        $query = " update admin_que set Title = '".$TitleName."', Question='".$Questions."',Option_A='".$OptionA."',Option_B='".$OptionB."',Option_C='".$OptionC."',Option_D='".$OptionD."' where User_ID='".$UserID."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            // exit(0);
            header("location: adminview.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("location:adminview.php");
    }


?>
<?php

include("../user/Uconnection.php");
if(isset($_GET['Del']))
         {
             $UserID = $_GET['Del'];
             $query = " update admin_que set status=0 where User_ID = $UserID";
             $result = mysqli_query($con,$query);
             if($result)
             {
                 header("location: adminview.php");
             }
             else
             {
                 echo ' Please Check Your Query ';
             }
        }
         else
         {
             header("location: adminview.php");
         }
?>