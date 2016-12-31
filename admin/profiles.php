<?php
include "top.php";
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profielen
        <small>Overzicht</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-users"></i> Home</a></li>
        <li class="active">Profiles</li>
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
                }
                
                echo "<a href='profile.php?show_user=" . $row['user_name'] . "'><div class='col-md-3'>";
                    echo "<div class='box box-widget widget-user'>";
                        echo "<div class='widget-user-header bg-green' style='background: url(\"dist/img/photo3.png\") center center;'>";
                            echo "<h3 class='widget-user-username'>" . $row['user_name'] . "</h3>";
                            echo "<h5 class='widget-user-desc'>" . $row['user_description'] . "</h5>";
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
                                echo "<div class='col-sm-4 border-right'>";
                                
                                echo "</div>";
                                echo "<div class='col-sm-4'>";
                                
                                echo "</div>";
                            echo "</div>";
                        echo "</div>"; 
                    echo "</div>";
                echo "</div></a>";
                
                if($col_number == 4){
                    echo "</div>";
                    $col_number = 0;
                }
                $col_number++;
            }
          ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include "bottom.php";
?>