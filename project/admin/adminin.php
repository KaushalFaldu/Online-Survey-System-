<?php

include("../user/Uconnection.php");

    if(isset($_POST['submit']))
    {
        if(empty($_POST['title']) || empty($_POST['question']) || empty($_POST['Option_A']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            $TitleName = $_POST['title'];
            $Questions = $_POST['question'];
            $OptionA = $_POST['Option_A'];
            $OptionB = $_POST['Option_B'];
            $OptionC = $_POST['Option_C'];
            $OptionD = $_POST['Option_D'];

            $query = " insert into admin_que(Title, Question,Option_A,Option_B,Option_C,Option_D,status) values('$TitleName','$Questions','$OptionA','$OptionB','$OptionC','$OptionD','1')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:adminview.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        header("location:index.php");
    }



?>

