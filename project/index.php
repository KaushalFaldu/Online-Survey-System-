<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<?php
    include("./php/connection2.php");

    if(isset($_POST["login"])){
        $secret = "6LfgK5UfAAAAAGqznTUtxZM7gVxipMhOylHGThkN";
        $response = $_POST['g-recaptcha-response'];
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
        $data = file_get_contents($url);
        $row = json_decode($data, true);
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        $password = trim($_POST['password']);
        
        $sql = $conn->query("SELECT * FROM login where email = '$email'");
        
        $count = mysqli_num_rows($sql);
       
            if($count > 0){
                $fetch = mysqli_fetch_assoc($sql);
                $hashpassword = $fetch["password"];
                
                if($fetch["status"] == 0){
                    ?>
                    <script>
                        alert("Please verify email account before login.");
                    </script>
                    <?php
                }
                else if(password_verify($password, $hashpassword)){   
                    if ($sql->num_rows > 0) {
                            if($fetch['category'] == 'user' && $row['success'] == 'true'){
                                header('Location: ./home.php');
                            }
                            if($fetch['category'] == 'admin' && $row['success'] == 'true'){
                                header('Location: ./admin/adminhome.php');
                            }
                             

                        
                    }
                }else{
                    ?>
                    <script>
                        alert("email or password invalid, please try again.");
                    </script>
                    <?php
                }
                
            }
            else {
                echo "<script>alert('Oops you are a robot ');</script>";
              } 
           
        }

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">

<head>
<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.container {
  background: white;
  padding: 30px;
  width: 400px;
}
.row123{
    margin-left:34%;
}
.printbutton{
    visibility:visible;
    .print{
        visibility:hidden;
    }
}

    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> -->

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
  
    <title>Login Form</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#" style="margin-left: -97%;margin-top:6%; color: brown;">Online Survey System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"
                            style="font-weight:bold; color:black; text-decoration:underline; margin-left: 690px;">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./php/register.php">Register</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <main class="login-form" >
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8" >
                    <div class="card" style="box-shadow: -1px 4px 28px 0px rgb(76 201 220 / 75%);">
                        <div class="card-header" >Login</div>
                        <div class="card-body" style="box-shadow: -1px 4px 28px 0px rgba(6, 9, 33, 0.75);">
                            <form action="./index.php" method="POST" name="login">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail
                                        Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email" required
                                            autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password"
                                            required>
                                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                    <div class="row123">
                                    <div class="g-recaptcha" data-sitekey="6LfgK5UfAAAAAMqiMvdJ-aQP04G-q2-4bbzeNItd"></div>
                                    </div>
                                    <!-- <button class="btn wave-effect wave-light" type="submit" name="submit">Check</button> -->
                                <br>
                                    <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Login" name="login" style="width: 18%; background: -webkit-linear-gradient(left, #758aff,  #c5b1c0); border-radius: 18px;">
                                    <a href="./php/recover_psw.php" class="btn btn-link">
                                        Forgot Your Password?
                                    </a>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>
    <button class="printbutton"onClick="window.print()">Print this page »</button>
    
</body>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function () {
        if (password.type === "password") {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>
</html>