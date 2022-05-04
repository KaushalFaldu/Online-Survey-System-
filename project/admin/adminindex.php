<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin index</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <style>
        body{
            background-color:#dcdcdc;
        }
        .f1{
            text-align: center;
            margin-top:  1% ;
            border-radius:5%;
            margin-left:25%;
            background: -webkit-linear-gradient(left, #75e3ff, #b653a0);
            height: 30px;
            width:20%;
            
        }
        .f2{
            height: 130px;
            width: 300px;
            text-align: center;
            margin-left:60%;
            margin-top:-4%;
            border-radius: 15%;
        }
        .f7{
            margin-top:80px;
            margin-left:80%;
        }
        .f3{
            margin-left:60%;
        }
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
            background: #22242A;
            color: rgb(238, 237, 241);
            display: block;
            margin: 0 30px;
            font-size: 18px;
            width: 34px;
            height: 33px;
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
            border-radius: 5px;
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

        #button__icon {
            font-size: 1.5em;
            background: rgba(0, 0, 0, 0.08);
        }
        .p1{
            margin-top:8%;
            height:0px;
            width:400px;
            margin-left:25%;
            background: rgba(0, 0, 0, 0.08);
            
        }
        h2{
            height: 20px;
            width: 280px;
            margin-left:25%;
            margin-top:4%;
        }
        .back li a i{
            color: red;
            margin-left:70%;
            margin-top:5%;
            /* background:red; */
            height: 10%;
            width: 10%;
        }
       
    </style>
</head>
<body class="I-file">
        <div class="index">
            <div class="row1">
                <div class="indexfile">
                    <div class="c1">
                        <div class="c2">
                        </div>
                        <div class="c3">

                            <form action="adminin.php" method="post">
                            <div class="wrapper">

                            <div class="detail">
                <div class="sidebar">
                    <div class="sidebar-menu">
                        <li class="item">
                            <a href="./adminhome.php" class="menu-btn">
                                <i class="fas fa-desktop"></i><span>Admin Dashboard</span>
                            </a>
                        </li>
                        <li class="item" id="list">
                            <a href="../user/viewcopy.php" class="menu-btn">
                                <i class="fas fa-clipboard"></i><span> Survey List
                            </a>
                        </li>
                        <li class="item" id="messages">
                            <a href="./adminview.php" class="menu-btn">
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
                            <a href="./adminsearch.php" class="menu-btn">
                                <i class="fas fa-cog"></i><span>Search<i
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
                                <div class="header">
                                 <div class="header-menu">
                                     <div class="title">Create <span>Question</span>
                                    </div>
                                        
                                        <ul>
                                          <li><a href="../index.html"><i class="fas fa-power-off"></i></a></li>

                                         </ul>
                                        </div>
                                     </div>
                             </div>
                             
                                <div class="he">
                                </div>
                                <p class="p1"> Here , you can create your question and put your opinion</p>
                                <h2>Create Question Here </h2>
                                <input type="text" class="f1" placeholder=" Title " name="title">
                                <div class="oA">
                                    <br>
                                    
                                <input   type="text" class="f2" placeholder=" Question " name="question"></div>
                                <br>
                                <br>
                                <br>
                                <input type="text" class="f3" placeholder=" Option - A " name="Option_A">
                                <br>
                                <br>
                                <input type="text" class="f3" placeholder=" Option - B " name="Option_B">
                                <br>
                                <br>
                                <input type="text" class="f3" placeholder=" Option - C " name="Option_C">
                                <br>
                                <br>
                                <input type="text" class="f3" placeholder=" Option - D " name="Option_D">
                                <br>

                                <!-- <button class="f7" name="submit">Submit</button> -->
                                <input type="submit" value="Submit" class="f7" name="submit">

                                  
                                </form>
                                
                        </div>
                        <button  class="f8" name="submit"> <a href="home.php"></a>Back</button>
                    </div>
                </div>
            </div>
            
        </div>
    
</body>
</html>