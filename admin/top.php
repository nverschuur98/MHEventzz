<?php
//top.php
ob_start();
include "connection.php";
include "functions.php";
session_start();
check_logged_in();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminMHE</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- Text editor Style-->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- color pricker -->
    <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- iCheck -->
      <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () { /*bootstrap WYSIHTML5 - text editor */$(".textarea").wysihtml5();});
        $(function () { $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%' // optional
            });
          });
    </script>
    <script>
      
    </script>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>MH</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>MHE</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
        
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <?php
                
                    $user_id = $_SESSION['user_id'];
                
                
                    $date = date("m-d-Y", strtotime('-3 day'));
                    $SQL = "DELETE FROM notifications WHERE noti_date < (NOW() - INTERVAL 2 DAY) AND noti_user='$user_id'";
                    $result2 = $conn->query($SQL);
                
                    $amount = noti_count($conn, $_SESSION['user_id']);
                    if($amount > 0){
                ?>
                <span class="label label-warning"><?php echo $amount; ?></span>
                <?php
                    }
                ?>
            </a>
            <ul class="dropdown-menu">
                <li class="header">Je hebt 
                <?php 
                    echo $amount; 
                    if($amount == 1){
                        echo " melding";
                    }else{
                        echo " meldingen";
                    }
                ?>
                </li>
                <?php  
                    if($amount > 0){
                ?> 
                <li>
                <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        <?php  
                            $SQL = "SELECT * FROM notifications WHERE noti_user='$user_id' ORDER BY noti_id DESC";
    
                            $result = $conn->query($SQL);
                            while($row = mysqli_fetch_assoc($result)){
                                $noti_cat = $row['noti_cat'];
                                $noti_title = $row['noti_title'];
                                $noti_link = $row['noti_link'];
                                $noti_id = $row['noti_id'];
                                
                                echo "<li>";
                                echo "<a href='$noti_link?action=1&noti_id=$noti_id' onClick='self.location='$noti_link?action=1'')'>";
                                echo "<i class='" . noti_cat_to_class($conn, $noti_cat) . "'></i>" . $noti_title;
                                echo "</a>";
                                echo "</li>";
                                
                            }
                        
                        ?> 
                    </ul>
                </li>
                <?php  
                    }
                ?> 
                <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="lock.php" class="dropdown-toggle">
              <i class="fa fa-lock"></i>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $_SESSION['user_image']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['user_name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $_SESSION['user_image']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['user_name']; ?> - <?php echo user_info($conn, "user_description", $_SESSION['user_id']) ?>
                  <small>lid sinds <?php echo user_info($conn, "user_since", $_SESSION['user_id']) ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profiel</a>
                </div>
                <div class="pull-right">
                  <a href="logoff.php" class="btn btn-default btn-flat">Log Uit</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION['user_image']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['user_name']; ?></p>
          <?php
            $user_name = $_SESSION['user_name'];
            $user_email = $_SESSION['user_email'];
            
            $SQL = "SELECT * FROM users WHERE user_name='$user_name' AND user_email='$user_email'";
            $result = $conn->query($SQL);
            
            while($row = mysqli_fetch_assoc($result)){
                $online = $row['user_online']; 
            }
            
            if ($online == 0){
                echo '<a href="#"><i class="fa fa-circle text-danger"></i> Offline</a>';
            }else if ($online == 1){
                echo '<a href="#"><i class="fa fa-circle text-success"></i> Online</a>';   
            }else if ($online == 2){
                echo '<a href="#"><i class="fa fa-circle text-warning" style="color:#ffd200"></i> Afwezig</a>';
            }
              
          ?>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
        </li>
        <li>
            <a href="newsitems.php">
                <i class="ion ion-android-textsms"></i> <span>Berichten</span>
            </a>
        </li>
        <li>
            <a href="events.php">
                <i class="ion ion-beer"></i> <span>Feestjes</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-users"></i> <span>Profielen</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="profiles.php"><i class="fa fa-users"></i> Profielen</a></li>
                <li><a href="profile.php"><i class="fa fa-user"></i> Mijn Profiel</a></li>
            </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>