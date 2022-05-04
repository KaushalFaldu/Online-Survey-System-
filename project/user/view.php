<?php 
    include("Uconnection.php");
    $count1 = mysqli_query($con,"SELECT COUNT(*) as total FROM records WHERE status=1");
    $row = $count1->fetch_assoc();
    // echo $row['total'];

    // exit(0);
    $size=1;
    $start=0;
    $totalpage = ceil($row['total']/$size);
    if(isset($_POST['paging'])){
    $start = (($_POST['paging'])-1)*$size;
    }
    // require_once("Uconnection.php");
    $query = " select * from records where status=1 limit $start,$size";
    $result = $con->query($query);
    $result12 = ($con->query($query))->fetch_assoc()["User_ID"];
    if(isset($_POST['submit_data'])){
 
    $answer = $_POST['options'];
    $user_id = $_POST['userid'];
    
    
    $q = mysqli_query($con, "insert into survey_table(answer,user_id)
values('{$answer}','{$user_id}')");
    if($q){
        echo ".location='view.php';";
    }
    }
    

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Records</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
        .a2{
           
            width: 70%;
            padding: 20px 20px;
            margin-left:220px;
            border-radius:0.3em;
        }
        .a1{
            border-radius:0.3em;
        }
        .btn1{
            border-radius:0.3em;
            height: 25px;
            width: 28px;
            align:center;
        }
    </style>
</head>
<body class="v-file">
    
<input type="hidden" name="user_id" id="useridhidden" value=<?php echo $result12; ?> />
<div class="class1">
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title">Question <span>List</span></div>
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
                            <a href="#" class="menu-btn">
                                <i class="fas fa-clipboard"></i><span> Survey List
                            </a>
                        </li>
                        <li class="item" id="messages">
                            <a href="../admin/adminviewcopy.php" class="menu-btn">
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
                                <a href="#"><i class="fas fa-language"></i><span>language</span></a>
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
            <div class="row3">
                <div class="viewofpage">
                    <div class="a1">
                        <center>
                        <table class="a2" >
                            <h1 ><br></h1>
                            <tr>
                                <!-- <td style="background-color: rgb(220,220,220)"> User ID </td> -->
                                <br>
                                <!-- <td style="background-color: rgb(211,211,211)"> Title </td> -->
                                <br>
                                <!-- <td style="background-color: rgb(192,192,192)"> Question </td> -->
                                <br>
                                <!-- <td style="background-color:rgb(169,169,169)"> Option - A </td> -->
                                <br>
                                <!-- <td style="background-color: rgb(128,128,128)"> Option - B </td> -->
                                <br>
                                <!-- <td style="background-color: rgb(105,105,105)"> Option - C </td> -->
                                <br>
                                <!-- <td style="background-color: rgb(119,136,153)"> Option - D </td> -->
                                <br>
                                
                                
                            </tr>

                            <form action="./view.php" method="post">
                            <input type="hidden" name="paging" value=<?php if(isset($_POST["paging"])){ echo $_POST["paging"];}else{echo "";} ?>>
                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $UserID = $row['User_ID'];
                                        $_SESSION["hiddenId"] = $UserID;
                                        $TitleName = $row['Title'];
                                        $Questions = $row['Question'];
                                        $OptionA = $row['Option_A'];
                                        $OptionB = $row['Option_B'];
                                        $OptionC = $row['Option_C'];
                                        $OptionD = $row['Option_D'];
                            ?>
                                    <tr>
                                        <!-- <td><?php echo $UserID ?></td> -->
                                        <td><?php echo $TitleName ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $Questions ?></td>
                                    </tr>
                                    <tr>
                                    <input class="text_1" type="hidden" name="userid" id="userid"  value="<?php echo $UserID ?>">
						
                                    
                                        <td>
                                            <input class="text_1" type="radio" name="options" class="options" id="options_1" value="<?php echo $OptionA ?>" checked>
							                <label class="input_options" for="options_1"><?php echo $OptionA ?></label>
                                            </td>
                                            </tr>  
                                            <tr>      
                                        <td>
                                            <input class="text_1" type="radio" name="options" class="options" id="options_2" value="<?php echo $OptionB ?>" checked>
							                <label class="input_options" for="options_2"> <?php echo $OptionB ?></label> 
                                        </td>
                                        </tr> 
                                        <tr>
                                        <td>
                                            <input class="text_1" type="radio" name="options" class="options" id="options_3" value="<?php echo $OptionC ?>" checked>
							                <label class="input_options" for="options_3"> <?php echo $OptionC ?></label> 
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>
                                            <input class="text_1" type="radio" name="options" class="options" id="options_4" value="<?php echo $OptionD ?>" checked>
							                <label class="input_options" for="options_4"> <?php echo $OptionD ?></label> 
                                        </td>
                                        </tr>
                                        <div  style="width:82%; margin-left:17%; margin-top:-9%;"class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card mt-4">
                                                        <div class="card-header">Pie Chart</div>
                                                        <div class="card-body">
                                                            <div class="chart-container pie-chart">
                                                                <canvas id="pie_chart"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card mt-4">
                                                        <div class="card-header">Doughnut Chart</div>
                                                        <div class="card-body">
                                                            <div class="chart-container pie-chart">
                                                                <canvas id="doughnut_chart"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card mt-4 mb-4">
                                                        <div class="card-header">Bar Chart</div>
                                                        <div class="card-body">
                                                            <div class="chart-container pie-chart">
                                                                <canvas id="bar_chart"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <td> </td>
                                         <div class="form-group">
                                             <button  style=" margin-bottom:-20%; margin-left:60%;"type="submit" name="submit_data" class="btn btn-primary">Submit</button>
					                    </div>
                                    
                                       
                                        <!-- <td style="background-color: rgb(80, 185, 255); border-radius:0.3em; text-align:center"><a href="edit.php?GetID=<?php echo $UserID ?>">Edit</a></td> -->
                                        <!-- <td style="background-color: rgb(221, 235, 99); border-radius:0.3em;  text-align:center"><a href="update.php?Del=<?php echo $UserID ?>">Delete</a></td> -->
                                    </tr>  
                            </form><!-- comment -->
                                   
                                    
<script>
	
$(document).ready(function(){

	$('#submit_data').click(function(){

		var answer = $('input[name=options]:checked').val();
                //var user_id = 65;

		$.ajax({
			url:"data.php",
			method:"POST",
			data:{action:'insert', answer:answer},
            data:{action:'insert', user_id:user_id},
			beforeSend:function()
			{
				$('#submit_data').attr('disabled', 'disabled');
			},
			success:function(data)
			{
				$('#submit_data').attr('disabled', false);

				$('#options_1').prop('checked', 'checked');

				$('#options_2').prop('checked', false);

				$('#options_3').prop('checked', false);

                $('#options_4').prop('checked', false);

				alert("Your Feedback has been send...");

				makechart();
			}
		})

	});

	makechart();

	function makechart()
	{
        let quesid = $("#useridhidden").val();
        
		$.ajax({
			url:"./data.php",
			method:"POST",
			data:{action:'fetch',quesId:quesid},
			success:function(data)
			{
                console.log(data);
                data = JSON.parse(data);
				var answer = [];
				var total = [];
				var color = [];
                var user_id = [];
                                
				for(var count = 0; count < data.length; count++)
				{   
                    user_id.push(data[count].user_id);
                    answer.push(data[count].answer);
					total.push(data[count].total);
					color.push(data[count].color);
				}
                                
                                
    				var chart_data = {
					labels:answer,
					datasets:[
						{
							label:'Vote',
							backgroundColor:color,
							color:'#fff',
							data:total
						}
					]
				};
                            

				var options = {
					responsive:true,
					scales:{
						yAxes:[{
							ticks:{
								min:0
							}
						}]
					}
				};

				var group_chart1 = $('#pie_chart');

				var graph1 = new Chart(group_chart1, {
					type:"pie",
					data:chart_data
				});

				var group_chart2 = $('#doughnut_chart');

				var graph2 = new Chart(group_chart2, {
					type:"doughnut",
					data:chart_data
				});

				var group_chart3 = $('#bar_chart');

				var graph3 = new Chart(group_chart3, {
					type:'bar',
					data:chart_data,
					options:options
				});
			}
		})
	}

});

$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  
  var form_data = $(this).serialize();
  
  $.ajax({
   url:"add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});

</script>
                            <?php 
                                    }  
                                    echo "<table><tr>";
                                    for ($i=1; $i <= $totalpage ; $i=$i+1) { 
                                        echo "<td %nbsp;>
                                        <form method='post' action='./view.php'>
                                            <input type='hidden' name='paging' value='$i'></input>
                                            <button class='btn1' type='submit' name='submit' value='$i' style='background-color: rgb(255, 150, 80);;%nbsp;'>$i</button>
                                        </form>
                                        </td>";
                                        
                                    }
                                    echo "</tr></table>";
                            ?>                                                                    
                                   

                        </table>
                        
                        <center>
                            <!-- <a href= "./view.php?paging=1">1<a> <br> -->
                            <!-- <a href= "./view.php?paging=2">2<a> <br> -->
                            <!-- <a href= "./view.php?paging=3">3<a>  -->
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" id="comment_form">
            <h4 style="margin-left: 19%; margin-top:5%;">Leave Your Commnets Over Regarding The Questions And Any Other Suggestions Required.</h4>
            <h3 style="margin-left: 19%;"> Comment Here</h3>
            <div class="form-group">
                <input type="text" name="comment_name" id="comment_name" class="form-control" style="margin-left: 19%;width: 78%;" placeholder="Enter Name" />
            </div>
            <div class="form-group">
                <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5" style="margin-left: 19%;width: 78%;"></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" name="comment_id" id="comment_id" value="0" />
                <input type="submit" name="submit" id="submit" style="margin-left: 88%;" class="btn btn-info" value="Submit" />
            </div>
        </form>
    </div>
    <span id="comment_message"></span>
   <br />
   <div id="display_comment"></div>
    
</body>
</html>