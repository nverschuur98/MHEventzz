<?php
include "top.php";
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profielen
        <small>Overzicht</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-users"></i> Home</a></li>
        <li class="active">Profielen</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
          <?php 
            $SQL = "SELECT * FROM users ORDER BY user_name ASC";
            $col_number = 1;  
          
            $result = $conn->query($SQL);
            while($row = mysqli_fetch_assoc($result)){
                
                if($col_number == 1){
                    echo "<div class='row'>";
                    $row_ended = false;
                }
                
                echo "<a href='profile.php?show_user=" . $row['user_name'] . "'><div class='col-md-6 col-sm-6'>";
                    echo "<div class='box box-widget widget-user'>";
                        echo "<div class='widget-user-header bg-green'";
                            if(!empty($row['user_cover_image'])){
                                echo "style='background: url(\"" . $row['user_cover_image'] . "\") center center;'";
                            }
                        echo ">";
                            echo "<h3 class='widget-user-username'><b>" . $row['user_name'] . "</b></h3>";
                        echo "</div>"; 
                        echo "<div class='widget-user-image'>";
                            echo "<img class='img-circle' src='" . $row['user_image'] . "' alt='User Avatar'>";
                        echo "</div>";
                        echo "<div class='box-footer'>";
                            echo "<div class='row'>";
                                echo "<div class='col-sm-4 border-right'>";
                                    echo "<div class='description-block'>";
                                        echo "<h5 class='description-header'>536</h5>";
                                        echo "<span class='description-text'>Feestjes</span>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='col-sm-4 border-right' style='position:center;'>";
                                    echo "<div class='description-block'>";
                                        echo "<h5 class='discription' style='position:center; font-size:17px; margin-top:10%;'>";
                                        $online_user = $row['user_online']; 
                                        
                                        if ($online_user == 0){
                                            echo '<i class="fa fa-circle text-danger"></i> Offline';
                                        }else if ($online_user == 1){
                                            echo '<i class="fa fa-circle text-success"></i> Online';   
                                        }else if ($online_user == 2){
                                            echo '<i class="fa fa-circle text-warning" style="color:#ffd200"></i> Afwezig';
                                        }
                                        echo "</h5>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='col-sm-4'>";
                                
                                echo "</div>";
                            echo "</div>";
                        echo "</div>"; 
                    echo "</div>";
                echo "</div></a>";
                
                if($col_number == 2){
                    echo "</div>";
                    $col_number = 0;
                    $row_ended = true;
                }
                $col_number++;
            }
        
            if(!$row_ended){
                echo "</div>";
                $col_number = 0;
                $row_ended = true;
            }
          ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include "bottom.php";
?>