<?php
include "top.php";
//Check all varaibles

$action = $_GET['action'];
$slider_id = $_GET['slider_id'];
if($action == "new"){
    $slider_title = "Nieuwe Slide";
}else{
    $slider_title = $_POST['slider_title'];
}
$slider_img = "";


?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Instellingen
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="ion ion-image"></i> Home</a></li>
        <li><a href="#">Slider</a></li>
        <li class="active">
        <?php
            echo $slider_title;
        ?>
        </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
          <div class="col-md-12">
              <div class="box box-default">
                    <div class="box-header with-border">
                      <i class="fa fa-gears"></i>

                      <h3 class="box-title">Gewijzigde Instellingen</h3>
                    </div>
                    <div class="box-body">
                        <?php 
                            if($action == 0){
                                
                                $SQL = "DELETE FROM slider WHERE slider_id='$slider_id'";
                                
                                $result = $connweb->query($SQL);
                                    
                                if(!$result){
                                    echo '<div class="callout callout-danger"><h4>Mislukt :(</h4><p>Er is iets mis gegaan, probeer het eens opnieuw</p>';
                                        echo $connweb->error; //debugging purposes, uncomment when needed
                                    echo '</div>';
                                }else{
                                    echo '<div class="callout callout-success"><h4>Gelukt :)</h4><p>het bericht is succesvol verwijderd</p></div>';
                                    header('Refresh: 3; url=slider.php'); //MOET NOG DE LOCATIE BIJ
                                }
                                
                            }else if($action == 1){
                                
                                $slider_title = $conn->real_escape_string($_POST['slider_title']);
                                $slider_content = $conn->real_escape_string($_POST['slider_content']);
                                $slider_location = $_POST['slider_location'];
                                $post_visible = false;
                                /*if(!empty($_POST['post_img'])){
                                    $post_img = "admin/" . $_POST['post_img']; //CHECK FOR RIGHT LOCATION
                                }*/
                                                                
                                if(true){
                                    // All required fields are filled in, ready to insert or update

                                    if(!empty($slider_id) && $slider_id != "new"){
                                        // UPDATE
                                        $SQL = "UPDATE slider SET slider_title='$slider_title', slider_content='$slider_content', slider_location='$slider_location' WHERE slider_id='$slider_id'";
                                        
                                        $result = $connweb->query($SQL);
                                        
                                        if(!$result){
                                            echo '<div class="callout callout-danger"><h4>Mislukt :(</h4><p>Er is iets mis gegaan, probeer het eens opnieuw</p>';
                                            echo $connweb->error; //debugging purposes, uncomment when needed
                                            echo '</div>';
                                        }else{
                                            echo '<div class="callout callout-success"><h4>Gelukt :)</h4><p>het bericht is succesvol gewijzigd</p></div>';
                                            
                                            if($slider_location == 1){
                                                $slider_location_name = "Home";
                                            }elseif($slider_location == 2){
                                                $slider_location_name = "Gallerij";
                                            }
                                            
                                            //header('Refresh: 3; url=slider.php?slider=' . $slider_location_name);
                                        }
                                        
                                    }else{
                                        //INSERT
                                        $SQL = "INSERT INTO slider (slider_title, slider_content, slider_location) VALUES ('$slider_title', '$slider_content', $slider_location)";
                                        
                                        $result = $connweb->query($SQL);
                                        $slider_id = $connweb->insert_id;
                                        
                                        if(!$result){
                                            echo '<div class="callout callout-danger"><h4>Mislukt :(</h4><p>Er is iets mis gegaan, probeer het eens opnieuw</p>';
                                            echo $connweb->error; //debugging purposes, uncomment when needed
                                            echo '</div>';
                                        }else{
                                            echo '<div class="callout callout-success"><h4>Gelukt :)</h4><p>het bericht is succesvol gewijzigd</p></div>';
                                            
                                            if($slider_location == 1){
                                                $slider_location_name = "Home";
                                            }elseif($slider_location == 2){
                                                $slider_location_name = "Gallerij";
                                            }
                                            
                                            //header('Refresh: 3; url=slider.php?slider=' . $slider_location_name);                                   
                                        }
                                    }
                                    
                                    if($slider_id == "new"){
                                        $slider_id = mysql_insert_id();
                                    }
                                    
                                    $fc_array = array($_FILES["slider_img"], "slider_img", $slider_id, $slider_location);
                                
                                    upload_image($connweb, $fc_array);
                                    
                                }else{
                                    echo '<div class="callout callout-danger"><h4>Mislukt :(</h4><p>Er is iets mis gegaan, probeer het eens opnieuw</p></div>';
                                    header('Refresh: 3; url=newsitems.php');
                                }
                            }
                        ?>
                  </div>
              </div>
          </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include "bottom.php";
?>