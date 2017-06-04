<?php
include "top.php";

$slider = $_GET['slider'];

if($slider == "Home"){
    $slider_location = 1;
}else if($slider == "Galerij"){
    $slider_location = 2;
}

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Slider
        <small><?php echo $slider ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="ion ion-image"></i> Home</a></li>
        <li class="active">Slider</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li>
                            <form action="slideritem.php?item=new" method="POST">
                                <input type="hidden" value="<?php echo $slider_location ?>" name="slider_location">
                                <button type="submit" class="btn btn-success btn-flat btn-sm" style="margin: 5px; margin-bottom: 9px; margin-left: 9px;">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </form>
                        </li>
                        <li>
                            <h4>Voeg nieuwe slider afbeelding toe</h4>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      <!-- Info boxes -->
          <?php 
            $SQL = "SELECT * FROM slider WHERE slider_location='$slider_location'";
            $col_number = 1; 
            $row_ended = false;
        
            $result = $connweb->query($SQL);
            while($row = mysqli_fetch_assoc($result)){
                
                if($col_number == 1){
                    echo "<div class='row row-eq-height'>";
                    $row_ended = false;
                }
                
                echo "<a href='slideritem.php?item=" . $row['slider_id'] . "'><div class='col-md-4 col-sm-6'>";
                    echo "<div class='box box-widget widget-user'>";
                        echo "<div class='widget-user-header bg-black' style='height: 180px; background: url(\"../" . $row['slider_img'] . "\") center center!important; background-size: cover!important;'>";
                            echo "<h3 class='widget-user-username'><b>" . $row['slider_title'] . "</b></h3>";
                        echo "</div>"; 
                        echo "<div class='box-body message-box-small'>"; 
                            echo "<div class='row'>";
                                echo "<div class='col-xs-12'><p>" . htmlspecialchars_decode($row['slider_content']) . "</p></div>";
                            echo "</div>"; 
                        echo "</div>"; 
                    echo "</div>";
                echo "</div></a>";
                
                if($col_number == 3){
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