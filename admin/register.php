<?php
include "connection.php";
include "functions.php";

if(isset($_GET['regKey'])){
    $regKey = $_GET['regKey'];
}else{
    $regKey = '';
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>    
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index2.html"><b>Admin</b>MHE</a>
  </div>
  <div class="register-box-body">
    <?php
    if(!isset($_GET['action']) || $_GET['action'] != 1){
    ?>
    <p class="login-box-msg">Registreer voor het Dashboard van MHEventzz.</p>
    <form action="register.php?action=1" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Voor en Achternaam" name="user_name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="user_email" autocapitalize="none">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Wachtwoord" name="user_pass" autocapitalize="none">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Herhaal wachtwoord" name="user_passc" autocapitalize="none">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback"> <!--has-error -->
        <input type="text" class="form-control" placeholder="Registratie Code" value="<?php echo $regKey ?>" name="regKey">
        <span class="glyphicon glyphicon-certificate form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <a href="login.php" class="text-center">Ik ben al geregistreerd</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registreer</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <?php
    }elseif(isset($_GET['action']) && $_GET['action'] == 1){
        
        echo "<p class='login-box-msg'>Een moment geduld alstublieft, uw aanvraag wordt verwerkt. Problemen? Neem dan contact met ons op.</p>";
        
        $errorArray = array();
        
        //Check if all items are filled in
        if(!isset($_POST['user_name']) || empty($_POST['user_name'])){
            $errorArray[] = "U bent vergeten uw naam op te geven";
        }
        if(!isset($_POST['user_email']) || empty($_POST['user_email'])){
            $errorArray[] = "U bent vergeten uw e-mail adres in te voeren";
        }
        if(!isset($_POST['user_pass']) || empty($_POST['user_pass'])){
            $errorArray[] = "U bent vergeten het wachtwoord in te voeren";
        }
        if(!isset($_POST['user_passc']) || empty($_POST['user_passc'])){
            $errorArray[] = "U bent vergeten het wachtwoord nogmaals in te voeren";
        }
        if(!isset($_POST['regKey']) || empty($_POST['regKey'])){
            $errorArray[] = "U bent vergeten de registratie code intevoeren";
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
            
            //Create all variables
            $user_name = htmlentities($_POST['user_name']);
            $user_email = htmlentities($_POST['user_email']);
            $user_pass = sha1(htmlentities($_POST['user_pass']));
            $user_passc = sha1(htmlentities($_POST['user_passc']));
            $regKey = htmlentities($_POST['regKey']);

            //Check if there is a user with that name or email and check if the regKey is correct

            //Check if there is a user with the same name.
            $SQL = "SELECT count(1) FROM users WHERE user_name='$user_name'";
            $result = $conn->query($SQL);
            $data = mysqli_fetch_array($result, MYSQLI_NUM);
            if($data[0] > 0){
                $errorArray[] = 'Deze gebruiker bestaat al';
            }

            //Check if the email adres is already in use
            $SQL = "SELECT count(1) FROM users WHERE user_email='$user_email'";
            $result = $conn->query($SQL);
            $data = mysqli_fetch_array($result, MYSQLI_NUM);
            if($data[0] > 0){
                $errorArray[] = 'Dit email adres is al ingebruik';
            }
            
            //Check if the passwords are the same
            if($user_pass != $user_passc){
                $errorArray[] = 'De twee wachtwoorden komen niet overeen';
            }
            
            //Check if the regKey is valid
            $SQL = "SELECT count(1) FROM regkeys WHERE regKey_regKey='$regKey'";
            $result = $conn->query($SQL);
            $data = mysqli_fetch_array($result, MYSQLI_NUM);
            if($data[0] != 1){
                $errorArray[] = 'De ingevoerde registratie code is niet juist';
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
                
                //Create the new user
                $SQL = "INSERT INTO users(user_name, user_email, user_pass, user_image, user_since)
                VALUES('$user_name','$user_email','$user_pass', 'dist/img/avatar5.png', NOW())";
                $SQL2 = "DELETE FROM regkeys WHERE regKey_regKey='$regKey'";

                $result = $conn->query($SQL);
                $result2 = $conn->query($SQL2);
                
                $title = "<a href='profile.php?show_user=" . $user_name . "'>" . $user_name . "</a> is lid geworden";
                
                $user_id = user_id_by_email($conn, $user_email);
                
                timeline_item_create($conn, $title, 3, $user_id);
                
                if(!$result || !$result2){
                    //something went wrong, display the error
                    echo '<div class="alert alert-danger"><strong>Mislukt :(</strong><br>Sorry er is iets mis gegaan, probeer het opnieuw.<br>';
                    echo $conn->error(); //debugging purposes, uncomment when needed
                    echo '</div>';
                }else{
                    echo '<div class="alert alert-success"><strong>Gelukt :)</strong><br>Je bent succesvol geregistreerd. Je kan nu <a href="login.php">inloggen</a></div>';
                }
            } 
        }
    }
    ?>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
