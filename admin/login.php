<?php
include "connection.php";
session_start();

if(isset($_COOKIE['user']) && !empty($_COOKIE['user']) && isset($_COOKIE['user_email']) && !empty($_COOKIE['user_email']) && isset($_COOKIE['logged_in']) && !isset($_GET['change_user'])){
    //Go to the lockscreen
    header('Refresh: 0; url=lockscreen.php');
    exit();
}else{
    //Go to the normal loginscreen
    //Delete old cookies
    setcookie("user", "", time() - 3600, "/");
    setcookie("user_email", "", time() - 3600, "/");
    setcookie("logged_in", "", time() - 3600, "/");
?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>AdminLTE 2 | Log in</title>
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
      <!-- iCheck -->
      <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="login.php"><b>Admin</b>MHE</a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <?php
        if(!isset($_GET['action']) || $_GET['action'] != 1){
        ?>
        <p class="login-box-msg">Log in voor het Dashboard</p>
        <form action="login.php?action=1&change_user=true" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="user_email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Wachtwoord" name="user_pass">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                    <input type="checkbox" name="remember"> Houd me inglogd
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <?php
            }elseif($_GET['action'] == 1){

                echo "<p class='login-box-msg'>Een moment geduld alstublieft, uw aanvraag wordt verwerkt. Problemen? Neem dan contact met ons op.</p>";

                $errorArray = array();

                //check if all items are filled in
                if(!isset($_POST['user_email']) || empty($_POST['user_email'])){
                    $errorArray[] = "U bent vergeten uw e-mail adres in te voeren";
                }
                if(!isset($_POST['user_pass']) || empty($_POST['user_pass'])){
                    $errorArray[] = "U bent vergeten het wachtwoord in te voeren";
                }

                //Check if there are errors
                if(!empty($errorArray)){
                    echo "<div class='alert alert-danger'><strong>Mislukt :(</strong> <br>";
                    echo '<ul>';

                    foreach($errorArray as $key => $value){ /* walk through the array so all the errors get displayed */
                        echo '<li>' . $value . '</li>'; /* this generates a nice error list */
                    }

                    echo '</ul></div>';
                }else{

                    //Create Variables
                    $user_email = htmlentities($_POST['user_email']);
                    $user_pass = sha1(htmlentities($_POST['user_pass']));
                    if(!empty($_POST['remember'])){
                        $remember = $_POST['remember'];
                    }

                    $SQL = "SELECT user_id, user_name, user_email, user_image FROM users WHERE user_email ='$user_email' AND user_pass ='$user_pass'";
                    $result = $conn->query($SQL);

                    if(!$result){
                        echo '<div class="alert alert-danger"><strong>Mislukt :(</strong><br>Sorry er is iets mis gegaan, probeer het opnieuw.<br>';
                        echo $conn->error; //debugging purposes, uncomment when needed
                        echo '</div>';
                    }else{
                        if($result->num_rows == 0){
                            echo '<div class="alert alert-danger"><strong>Mislukt :(</strong><br>De combinatie is niet juist.<br>';
                            echo $conn->error; //debugging purposes, uncomment when needed
                            echo '</div>';
                        }else{
                            //set the $_SESSION['signed_in'] variable to TRUE
                            $_SESSION['logged_in'] = true;

                            //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $_SESSION['user_id']    = $row['user_id'];
                                $_SESSION['user_name']  = $row['user_name'];
                                $_SESSION['user_email'] = $row['user_email'];
                                $_SESSION['user_image'] = $row['user_image'];

                            }

                            if(!empty($_POST['remember'])){
                                $remember = $_POST['remember'];
                                
                                if($remember == true){
                                    setcookie('user',$_SESSION['user_name'],time() + (86400 * 30), "/"); //86400 = 1 day
                                    setcookie('user_email',$_SESSION['user_email'],time() + (86400 * 30), "/"); //86400 = 1 day
                                    setcookie('logged_in',1,time() + (86400 * 30), "/"); //86400 = 1 day
                                }
                            }
                            
                            
                            echo '<p>Welkom, ' . $_SESSION['user_name'] . '. <a href="index.php">Ga naar het overzicht</a>.</p>';
                            header('Refresh: 3; url=index.php');
                        }
                    }

                }  
            }
        ?>
      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    </body>
    </html>
<?php
}    
?>