<?php
session_start();  
?>
<html>

<head>

    <title>Dashboard</title>
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
            padding-top:20px;
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

        .btn {
            margin-top: 20%;
            margin-left: 20%;
        }


        .button {
            display: flex;
            margin-top: 9%;
            margin-left: 20%;

            height: 50px;
            padding: 0;
            background: #009578;
            border: none;
            outline: none;
            border-radius: 16px;
            overflow: hidden;
            font-family: "Quicksand", sans-serif;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
        }
        .button1 {
            display: flex;
            margin-top: 4%;
            margin-left: 21%;

            height: 100px;
            width: 225px;
            padding: 0;
            background: grey;
            border: none;
            outline: none;
            border-radius: 16px;
            overflow: hidden;
            font-family: "Quicksand", sans-serif;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
        }

        .button:hover {
            background: #008168;
        }

        .button:active {
            background: #006e58;
        }

        .button__text,
        #button__icon {
            display: inline-flex;
            align-items: center;
            padding: 0 24px;
            color: #fff;
            height: 100%;
        }
        .button__text2,
        #button__icon2 {        
            display: inline-flex;
            align-items: center;
            padding: 32px 17px;
            color:#808080;
            width: 128px;
            margin-left:50px;
        }

        #button__icon {
            font-size: 1.5em;
            background: rgba(0, 0, 0, 0.08);
        }
        #button__icon2 {
            font-size: 1.5em;
            background: rgba(0, 0, 0, 0.08);
        }
        @mixin media() {
    @media (min-width: 768px) {
        @content;
    }
}

body, html {
  font-family: 'Vollkorn', serif;
  font-weight: 400;
  line-height: 1.3;
  font-size: 16px;
}

.siteTitle {
  display: block;
  font-weight: 900;
  font-size: 30px;
  margin: 90px 0;
  
  @include media {
    font-size: 60px;
  }
}

header,
main,
footer {
  max-width: 400px;
  margin: 7%;
  margin-left:19%;

}

.card {
  height: 200px;
  position: relative;
  padding: 20px;
  box-sizing: border-box;
  display: flex;
  align-items: flex-end;
  text-decoration: none;
  border: 4px solid #b0215e;
  margin-bottom: 20px;
  background-image: url('img/OIP.jpg');
    background-size: cover;
  
  @include media {
    height: 500px;
    margin-left:20%;
  }
}

.inner {
  height: 50%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center; 
  background: white;
  box-sizing: border-box;
  padding: 40px;
  
  @include media {
    width: 50%;
    height: 100%;
  }
}

.title {
  font-size: 24px;
  color: black;  
  text-align: center;
  font-weight: 700;
  color: #181818;
   /* text-shadow: 0px 2px 2px #a6f8d5;  */
  position: relative;
  margin: 0 0 20px 0;
  
  @include media {
    font-size: 30px;
  }
}

.subtitle {
  color: #b0215e;
  text-align: center;
}

.card2 {
  background-image: url('https://images.unsplash.com/photo-1496317556649-f930d733eea3?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
}

.card3 {
  background-image: url('https://images.unsplash.com/photo-1557576842-3bc6093a5085?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
}

footer {
  display: flex;
  justify-content: center;
  margin: 40px 0;
}

.footerLink {
  margin-right: 12px;
  color: #181818;
  text-decoration: none;
  position: relative;
  
  &:after {
    content: "";
    position: absolute;
    width: 100%;
    height: 4px;
    background-color: rgba(#b0215e, 0.3);
    left: 0;
    bottom: 0;
  }
  
  &:last-child {
    margin-right: 0;
  }
}   
.usern{
    /* color:red; */
    margin-top:20px;
}
.usern i{
    color: #d8ff00;
    margin-left:20px;
    padding-bottom:20%;
}
    </style>
</head>

<body>
        <?php
            include("./user/Uconnection.php");
            
            $count1 = mysqli_query($con,"SELECT * FROM login WHERE email='".$_SESSION['emailid']."'");
            $row = $count1->fetch_assoc();

            // echo $row['email'];
            // echo "<script>console.log("$row['email']")</script>";
        ?>
    <div class="class1">
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title">Online <span>Survey</span></div>
                    <div class="sidebar-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                    <ul>
                        <li><a href="./index.php"><i class="fas fa-power-off"></i></a></li>
                        
                    </ul>
                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="detail">
                <div class="sidebar">
                    <div class="sidebar-menu">
                        <!-- <li class="item">
                            <a href="#" class="menu-btn1">
                               <li class="usern"><i class="fas fa-user ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><?php echo $row['username'];?></span></i></li>
                            </a>
                        </li> -->
                        <li class="item">
                            <a href="./home.php" class="menu-btn">
                                <i class="fas fa-desktop"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li class="item" id="list">
                            <a href="user\view.php" class="menu-btn">
                                <i class="fas fa-clipboard"></i><span> Survey List
                            </a>
                        </li>
                        <li class="item" id="messages">
                            <a href="./admin/adminviewcopy.php" class="menu-btn">
                                <i class="fas fa-clone"></i><span>Category<i
                                        ></i></span>
                            </a>
                            <!-- <div class="sub-menu">
                                <a href="#"><i class="fas fa-envelope"></i><span>New</span></a>
                                <a href="#"><i class="fas fa-envelope-square"></i><span>Sent</span></a>
                                <a href="#"><i class="fas fa-exclamation-circle"></i><span>Spam</span></a>
                            </div> -->
                        </li>
                        <li class="item" id="settings">
                            <a href="#settings" class="menu-btn">
                                <i class="fas fa-cog"></i><span>Search <i
                                        ></i></span>
                            </a>
                            <!-- <div class="sub-menu">
                                <a href="#"><i class="fas fa-lock"></i><span>Password</span></a>
                                <a href="#"><i class="fas fa-language"></i><span>Language</span></a>
                            </div> -->
                        </li>
                        <li class="item">
                            <a href="#" class="menu-btn">
                                <i class="fas fa-info-circle"></i><span>Survey Report</span>
                            </a>
                        </li>
                    </div>
                </div>
                <form action="./user/index.php" method="post">
                    <button type="button" class="button">
                        <span class="button__text"> <a
                                style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-style: inherit; color: #22242A;"
                                href="user\index.php">Create Your Survey </span>
                        <ion-icon name=" fas fa-file"></ion-icon>
                        <a href="user\index.php"><i id="button__icon" class="fas fa-file"></i></a>
                        </span>
                    </button>

                    <button type="button" class="button1">
                        <span class="button__text2"> <a
                                style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-style: inherit; color: #22242A;"
                                href="user\index.php">Survey Tips </span>
                        <!-- <ion-icon name=" fas fa-file"></ion-icon> -->
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function () {
            $(".sidebar-btn").click(function () {
                $(".wrapper").toggleClass("collapse");
            });
        });
    </script>
    <br><br><br><br><br><br><br><br><br><br><br><br>
                    <footer style="margin-left: 75%;"><p style="color:black;">Developed By: Kaushal Faldu</p></footer>
</body>

</html>