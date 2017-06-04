<?php
include "top.php";
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Berichten
        <small>Overzicht</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="ion ion-android-textsms"></i> Home</a></li>
        <li class="active">Berichten</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li>
                            <form action="newsitem.php?item=new" method="POST">
                                <button type="submit" class="btn btn-success btn-flat btn-sm" style="margin: 5px; margin-bottom: 9px; margin-left: 9px;">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </form>
                        </li>
                        <li>
                            <h4>Voeg bericht toe</h4>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      <!-- Info boxes -->
          <?php 
            $SQL = "SELECT *, DATE_FORMAT(post_date,'%d %b %Y') AS date FROM posts ORDER BY post_date DESC";
            $col_number = 1;  
        
            $result = $connweb->query($SQL);
            while($row = mysqli_fetch_assoc($result)){
                
                if($col_number == 1){
                    echo "<div class='row row-eq-height'>";
                    $row_ended = false;
                }
                
                echo "<a href='newsitem.php?item=" . $row['post_id'] . "'><div class='col-md-3 col-sm-6'>";
                    echo "<div class='box box-widget widget-user'>";
                        echo "<div class='widget-user-header bg-black' style='background: rgb(128,128,128) ";
                            if(!empty($row['post_img'])){
                                echo "url(\"../" . $row['post_img'] . "\") center center ";
                            }
                        echo "!important;'>";
                            echo "<h3 class='widget-user-username'><b>" . $row['post_title'] . "</b></h3>";
                        echo "</div>"; 
                        echo "<div class='box-body message-box'>"; 
                            echo "<div class='row'>";
                                echo "<div class='col-xs-12'><p>" . htmlspecialchars_decode($row['post_content']) . "</p></div>";
                            echo "</div>";
                        echo "</div>"; 
                        echo "<div class='box-footer' style='padding-top: 10px!important;'>";
                            echo "<div class='row'>";
                                echo "<div class='col-sm-6 border-right'>";
                                    echo "<div class='description-block'>";
                                        echo "<span class='description-text'>Datum</span>";
                                        echo "<h5 class='description-header'>" . $row['date'] . "</h5>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='col-sm-6'>";
                                    echo "<div class='description-block'>";
                                        echo "<span class='description-text'>Zichtbaar</span>";
                                        echo "<h5 class='description-header'>";
                                            if($row['post_visible'] == 1){
                                                echo "Ja";
                                            }else{
                                                echo "Nee";
                                            }
                                        echo "</h5>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>"; 
                    echo "</div>";
                echo "</div></a>";
                
                if($col_number == 4){
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