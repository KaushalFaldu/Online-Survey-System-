<?php 

    require_once("Uconnection.php");
    $UserID = $_GET['GetID'];
    $query = " select * from records where User_ID='".$UserID."'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $UserID = $row['User_ID'];
        $TitleName = $row['Title'];
        $Questions = $row['Question'];
        $OptionA = $row['Option_A'];
        $OptionB = $row['Option_B'];
        $OptionC = $row['Option_C'];
        $OptionD = $row['Option_D'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <style>
             * {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
            box-sizing: border-box;
            font-family: "Roboto", sans-serif;
        }


        .wrapper .header {
            z-index: 1;
            background: #22242A;
            position: fixed;
            width: calc(100% - 0%);
            height: 70px;
            display: flex;
            top: 0;
        }

        .wrapper .header .header-menu {
            width: calc(100% - 0%);
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .wrapper .header .header-menu .title {
            color: #fff;
            font-size: 25px;
            text-transform: uppercase;
            font-weight: 900;
            padding-top:4px;
        }

        .wrapper .header .header-menu .title span {
            color: #e6bd08;
        }

        .wrapper .header .header-menu .sidebar-btn {
            color: #fff;
            position: absolute;
            margin-left: 240px;
            font-size: 22px;
            font-weight: 900;
            cursor: pointer;
            transition: 0.3s;
            transition-property: color;
        }

        .wrapper .header .header-menu .sidebar-btn:hover {
            color: #4CCEE8;
        }

        .wrapper .header .header-menu ul {
            display: flex;
        }

        .wrapper .header .header-menu ul li a {
            background: #072ea1;
            color: rgb(238, 237, 241);
            display: block;
            margin: 0 30px;
            font-size: 18px;
            width: 34px;
            height: 0px;
            line-height: 35px;
            text-align: center;
            border-radius: 50%;
            transition: 0.3s;
            transition-property: background, color;
        }

        .wrapper .header .header-menu ul li a:hover {
            background: #4CCEE8;
            color: #22242a;
        }

        .wrapper .sidebar {
            z-index: 1;
            background: #2F323A;
            position: fixed;
            top: 70px;
            width: 250px;
            height: calc(100% - 9%);
            transition: 0.3s;
            transition-property: width;
            overflow-y: auto;
        }

        .wrapper .sidebar .sidebar-menu {
            overflow: hidden;
        }

        .wrapper .sidebar .sidebar-menu .list img {
            margin: 20px 0;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .wrapper .sidebar .sidebar-menu .list p {
            color: #bbb;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .wrapper .sidebar .sidebar-menu .item {
            width: 250px;
            overflow: hidden;
        }

        .wrapper .sidebar .sidebar-menu .item .menu-btn {
            display: block;
            color: #fff;
            position: relative;
            padding: 25px 20px;
            transition: 0.3s;
            transition-property: color;
        }

        .wrapper .sidebar .sidebar-menu .item .menu-btn:hover {
            color: #4CCEE8;
        }

        .wrapper .sidebar .sidebar-menu .item .menu-btn i {
            margin-right: 20px;
        }

        .wrapper .sidebar .sidebar-menu .item .menu-btn .drop-down {
            float: right;
            font-size: 12px;
            margin-top: 3px;
        }

        .wrapper .sidebar .sidebar-menu .item .sub-menu {
            background: #3498DB;
            overflow: hidden;
            max-height: 0;
            transition: 0.3s;
            transition-property: background, max-height;
        }

        .wrapper .sidebar .sidebar-menu .item .sub-menu a {
            display: block;
            position: relative;
            color: #fff;
            white-space: nowrap;
            font-size: 15px;
            padding: 20px;
            transition: 0.3s;
            transition-property: background;
        }

        .wrapper .sidebar .sidebar-menu .item .sub-menu a:hover {
            background: #55B1F0;
        }

        .wrapper .sidebar .sidebar-menu .item .sub-menu a:not(last-child) {
            border-bottom: 1px solid #8FC5E9;
        }

        .wrapper .sidebar .sidebar-menu .item .sub-menu i {
            padding-right: 20px;
            font-size: 10px;
        }

        .wrapper .sidebar .sidebar-menu .item:target .sub-menu {
            max-height: 500px;
        }

        .wrapper .main-container {
            width: (100% - 250px);
            margin-top: 70px;
            margin-left: 250px;
            padding: 15px;
            background: url(background.jpg)no-repeat;
            background-size: cover;
            height: 100vh;
            transition: 0.3s;
        }

        .wrapper.collapse .sidebar {
            width: 70px;
        }

        .wrapper.collapse .sidebar .list img,
        .wrapper.collapse .sidebar .list p,
        .wrapper.collapse .sidebar a span {
            display: none;
        }

        .wrapper.collapse .sidebar .sidebar-menu .item .menu-btn {
            font-size: 23px;
        }

        .wrapper.collapse .sidebar .sidebar-menu .item .sub-menu i {
            font-size: 18px;
            padding-left: 3px;
        }

        .wrapper.collapse .main-container {
            width: calc(100% - 70px);
            margin-left: 70px;
        }

        .wrapper .main-container .card {
            background: rgb(36, 12, 12);
            padding: 15px;
            margin-bottom: 10px;
            font-size: 14px;
        }
        .k1{
            margin-top:7%;
            margin-left:1%;
            padding:10px 20px;
        }
        .k2{
            margin-top:-1.4%;
            margin-left:64%;
            padding:65px 80px;
        }
        .k3{
            margin-top:6%;
            margin-left:3%;
        }
        .k4{
            margin-top:2%;
            margin-left:64%;
        }
        .k5{
            margin-top:2%;
            margin-left:64%;
        }
        .k6{
            margin-top:2%;
            margin-left:64%;
        }
        .k8{
            margin-top:5%;
            margin-left:89%;
        }
        .l1{
            margin-left:20%;
        }
        .l2{
            margin-left:58%;
        }
        .l3{
            margin-left:35%;
        }
        </style>
</head>
<body class="E-file">
<div class="class1">
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title">Update Your <span>Question</span></div>
                    <!-- <div class="sidebar-btn">
                        <i class="fas fa-bars"></i>
                    </div> -->
                    <ul>
                        <li><a href="./index.html"><i class="fas fa-power-off"></i></a></li>
                        
                    </ul>
                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="detail">
                <div class="sidebar">
                    <div class="sidebar-menu">
                        <li class="item">
                        </li>
                        <li class="item">
                            <a href="../home.php" class="menu-btn">
                                <i class="fas fa-desktop"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li class="item" id="list">
                            <a href="../admin/adminview.php" class="menu-btn">
                                <i class="fas fa-clipboard"></i><span> Survey List
                            </a>
                        </li>
                        <li class="item" id="messages">
                            <a href="#messages" class="menu-btn">
                                <i class="fas fa-clone"></i><span>Category<i
                                        class="fas fa-chevron-down drop-down"></i></span>
                            </a>
                            <!-- <div class="sub-menu">
                                <a href="#"><i class="fas fa-envelope"></i><span>New</span></a>
                                <a href="#"><i class="fas fa-envelope-square"></i><span>Sent</span></a>
                                <a href="#"><i class="fas fa-exclamation-circle"></i><span>Spam</span></a>
                            </div> -->
                        </li>
                        <li class="item" id="settings">
                            <a href="#settings" class="menu-btn">
                                <i class="fas fa-cog"></i><span>Settings <i
                                        class="fas fa-chevron-down drop-down"></i></span>
                            </a>
                            <div class="sub-menu">
                                <a href="#"><i class="fas fa-lock"></i><span>Password</span></a>
                                <a href="#"><i class="fas fa-language"></i><span>Language</span></a>
                            </div>
                        </li>
                        <li class="item">
                            <a href="#" class="menu-btn">
                                <i class="fas fa-info-circle"></i><span>Survey Report</span>
                            </a>
                        </li>
                    </div>
                </div>

        <div class="index">
            <div class="row2">
                <div class="editfile">
                    <div class="d1">
                        <div class="d2">
                        </div>
                        <div class="d3">
                            

                            <form action="update.php?ID=<?php echo $UserID ?>" method="post">
                            <label class="l1">
                                <span>Title </span>
                             </label>
                           
                                <input type="text" class="k1" placeholder="Title " name="title" value="<?php echo $TitleName ?>">
                                <br>
                                <label class="l2">
                                <span>Question </span>
                                </label>
                                <input type="text" class="k2" placeholder=" Question " name="question" value="<?php echo $Questions ?>">
                                <br>
                                <div class="l3">
                                <label class="l3">
                                <span>Options </span>
                                </label>
                                <input type="text" class="k3" placeholder=" Option - A " name="Option_A" value="<?php echo $OptionA ?>">
                                </div>
                                
                                <input type="text" class="k4" placeholder=" Option - B " name="Option_B" value="<?php echo $OptionB ?>">
                                <br>
                                <input type="text" class="k5" placeholder=" Option - C " name="Option_C" value="<?php echo $OptionC ?>">
                                <br>
                                <input type="text" class="k6" placeholder=" Option - D " name="Option_D" value="<?php echo $OptionD ?>">
                                <button class="k8" name="update" >Update</button>
                            </form>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>