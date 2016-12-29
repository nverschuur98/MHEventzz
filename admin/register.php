<?php


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
        <input type="text" class="form-control" placeholder="Voor en achternaam">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Wachtwoord">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Herhaal wachtwoord">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback"> <!--has-error -->
        <input type="text" class="form-control" placeholder="Regristratie Code" value="<?php echo $regKey ?>">
        <span class="glyphicon glyphicon-certificate form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <a href="login.php" class="text-center">I already have a membership</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <?php
    }elseif(isset($_GET['action']) && $_GET['action'] == 1){
        ?>
            <p class="login-box-msg">Een moment geduld alstublieft, uw aanvraag wordt verwerkt. Problemen? Neem dan contact met ons op.</p>
        <?php
        
        $errorArray = array(false,false,false,false,false);
        
        //Check if all items are filled in
        if(!isset($_POST['user_name'])){
            $errorArray[0] = true;
        }
        if(!isset($_POST['user_email'])){
            $errorArray[1] = true;
        }
        if(!isset($_POST['user_pass'])){
            $errorArray[2] = true;
        }
        if(!isset($_POST['regKey'])){
            $errorArray[3] = true;
        }
        
        var_dump($errorArray);
        
        //Create all variables
        
        
        
        //Check if there is a user with that name or email and check if the regKey is correct
        
        //Create the new user and encrypt the password
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
