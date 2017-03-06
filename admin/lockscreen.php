<?php
if(!isset($_COOKIE['user']) || !isset($_COOKIE['user_email']) || !isset($_COOKIE['logged_in'])){
    //Go to the login page
    header('Refresh: 0; url=login.php');
    exit();
}

include "connection.php";
session_start();

$user_name = $_COOKIE['user'];
$user_email = $_COOKIE['user_email'];

$SQL = "SELECT * FROM users WHERE user_name='$user_name' AND user_email='$user_email'";
$result = $conn->query($SQL);

while($row = mysqli_fetch_assoc($result)){
    $user_image = $row['user_image'];
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="lockscreen.php"><b>Admin</b>MHE</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?php echo $user_name;?></div>
    <?php
        if(!isset($_GET['action']) || $_GET['action'] == 0){
    ?>
          <!-- START LOCK SCREEN ITEM -->
          <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
              <img src="<?php echo $user_image;?>" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form class="lockscreen-credentials" action="lockscreen.php?action=1" method="Post">
              <div class="input-group">
                <input type="hidden" class="form-control" value="<?php echo $user_email; ?>" name="user_email">
                <input type="password" class="form-control" placeholder="wachtwoord" name="user_pass">

                <div class="input-group-btn">
                  <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                </div>
              </div>
            </form>
            <!-- /.lockscreen credentials -->

          </div>
          <!-- /.lockscreen-item -->
          <div class="help-block text-center">
            Voer je wachtwoord in om verder te gaan
          </div>
    <?php
        }elseif($_GET['action'] == 1){
            //Create Variables
                $user_email = htmlentities($_POST['user_email']);
                $user_pass = sha1(htmlentities($_POST['user_pass']));
            
                $SQL = "SELECT user_id, user_name, user_email, user_image FROM users WHERE user_email ='$user_email' AND  user_pass ='$user_pass'";
                $result = $conn->query($SQL);
                    if(!$result){
                    echo '<div class="alert alert-danger"><strong>Mislukt :(</strong><br>Sorry er is iets mis gegaan, probeer het  opnieuw.<br>';
                    echo $conn->error; //debugging purposes, uncomment when needed
                    echo '</div>';
                }else{
                    if($result->num_rows == 0){
                        echo '<div class="alert alert-danger"><strong>Mislukt :(</strong><br>De combinatie is niet juist.<br>';
                        echo $conn->error; //debugging purposes, uncomment when needed
                        echo '</div>';
                    }else{
                        $SQL = "UPDATE users SET user_online='1' WHERE user_email='$user_email'";
                        $result2 = $conn->query($SQL);
                        
                        //set the $_SESSION['signed_in'] variable to TRUE
                        $_SESSION['logged_in'] = true;
                            //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                        while($row = mysqli_fetch_assoc($result)){
                            $_SESSION['user_id']    = $row['user_id'];
                            $_SESSION['user_name']  = $row['user_name'];
                            $_SESSION['user_email'] = $row['user_email'];
                            $_SESSION['user_image'] = $row['user_image'];
                        }
                        header('Refresh: 0; url=index.php');
                    }
                }
        }
    ?>
  <div class="text-center">
    <a href="login.php?change_user=true">Log in als een andere gebruiker</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2016-2017 <b><a href="http://mheventzz.nl" class="text-black">MHEventzz</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
