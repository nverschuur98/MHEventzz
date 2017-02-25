<?php
include "top.php";
//Check all varaibles

$action = $_GET['action'];
$event_id = $_GET['event_id'];

$SQL = "SELECT * FROM events WHERE event_id=$event_id";

$result = $conn->query($SQL);
$row = mysqli_fetch_assoc($result);
$event_post = $row['event_post'];
$event_title = $row['event_title'];

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Instellingen
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="ion ion-beer"></i> Home</a></li>
        <li><a href="events.php">Feestjes</a></li>
        <li class="active"><?php echo $event_title; ?></li>
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
                            if($action == 1){
                                //Basis informatie
                                $event_title = htmlentities($_POST['event_title']);
                                $event_description = htmlentities($_POST['event_description']);
                                $event_date = $_POST['event_date'];
                                $event_location = htmlentities($_POST['event_location']);
                                
                                if(!empty($event_title) || !empty($event_date)){
                                    $SQL = "UPDATE events SET event_title='$event_title', event_date='$event_date', event_description='$event_description', event_location='$event_location' WHERE event_id='$event_id'";
                                    
                                    $result = $conn->query($SQL);
                                    
                                    if(!$result){
                                        echo '<div class="callout callout-danger"><h4>Mislukt :(</h4><p>Er is iets mis gegaan, probeer het eens opnieuw</p>';
                                        echo $conn->error; //debugging purposes, uncomment when needed
                                        echo '</div>';
                                    }else{
                                        echo '<div class="callout callout-success"><h4>Gelukt :)</h4><p>de basis informatie is succesvol gewijzigd</p></div>';
                                        $Titem_title = "<a href='profile.php?show_user=" . $_SESSION['user_name'] . "'>" . $_SESSION['user_name'] . "</a> heeft de basis informatie gewijzigd";
                                        event_timeline_item_create($conn, $Titem_title, 6, $event_id);
                                        header('Refresh: 2; url=event.php?event='. $event_id . '');
                                    }
                                }
                            }else if($action == 2){
                                //Organisatie
                                $event_organization = htmlentities($_POST['event_organization']);
                                $event_organization_contact = htmlentities($_POST['event_organization_contact']);
                                $event_organization_tel = htmlentities($_POST['event_organization_tel']);
                                $event_organization_mail = htmlentities($_POST['event_organization_mail']);
                                
                                if(!empty($event_organization)){
                                    $SQL = "UPDATE events SET event_organization='$event_organization', event_organization_contact='$event_organization_contact', event_organization_tel='$event_organization_tel', event_organization_mail='$event_organization_mail' WHERE event_id='$event_id'";
                                    
                                    $result = $conn->query($SQL);
                                    
                                    if(!$result){
                                        echo '<div class="callout callout-danger"><h4>Mislukt :(</h4><p>Er is iets mis gegaan, probeer het eens opnieuw</p>';
                                        echo $conn->error; //debugging purposes, uncomment when needed
                                        echo '</div>';
                                    }else{
                                        echo '<div class="callout callout-success"><h4>Gelukt :)</h4><p>de organisatie is succesvol gewijzigd</p></div>';
                                        $Titem_title = "<a href='profile.php?show_user=" . $_SESSION['user_name'] . "'>" . $_SESSION['user_name'] . "</a> heeft de organisatie gewijzigd";
                                        event_timeline_item_create($conn, $Titem_title, 6, $event_id);
                                        header('Refresh: 2; url=event.php?event='. $event_id . '');
                                    }
                                }
                            }else if($action == 3){
                                
                            }else if($action == 4){
                                //Change news item

                                $post_title = htmlentities($_POST['post_title']);
                                $post_content = htmlentities($_POST['post_content']);
                                $post_visible = false;
                                if(!empty($_POST['post_img'])){
                                    $post_img = "admin/" . $_POST['post_img'];
                                }
                                if(isset($_POST['post_visible'])){
                                    $post_visible = true;
                                }
                                
                                if(isset($post_title) && isset($post_content) && !empty($post_title) && !empty($post_content)){
                                    // All required fields are filled in, ready to insert or update

                                    if(!empty($event_post) || $event_post != 0){
                                        // UPDATE
                                        $SQL = "UPDATE posts SET post_title='$post_title', post_content='$post_content', post_visible='$post_visible' WHERE post_id='$event_post'";
                                        
                                        $result = $connweb->query($SQL);
                                        
                                        if(!$result){
                                            echo '<div class="callout callout-danger"><h4>Mislukt :(</h4><p>Er is iets mis gegaan, probeer het eens opnieuw</p>';
                                            echo $conn->error(); //debugging purposes, uncomment when needed
                                            echo '</div>';
                                        }else{
                                            echo '<div class="callout callout-success"><h4>Gelukt :)</h4><p>het bericht is succesvol gewijzigd</p></div>';
                                            $title = "feest bericht gewijzigd";
                                            $Titem_title = "<a href='profile.php?show_user=" . $_SESSION['user_name'] . "'>" . $_SESSION['user_name'] . "</a> heeft het " . $title;
                                            event_timeline_item_create($conn, $Titem_title, 5, $event_id);
                                            header('Refresh: 2; url=event.php?event='. $event_id . '');
                                        }
                                        
                                    }else{
                                        //INSERT
                                        $user_id = $_SESSION['user_id'];
                                        $SQLform4 = "INSERT INTO posts (post_title, post_content, post_date, post_visible, post_img, post_by) VALUES ('$post_title', '$post_content', NOW(), '$post_visible', '$post_img', '$user_id')";
                                        
                                        $result = $connweb->query($SQLform4);
                                        $post_id = $connweb->insert_id;
                                        
                                        $SQL = "UPDATE events SET event_post='$post_id' WHERE event_id='$event_id'";
                                        $result2 = $conn->query($SQL);
                                        
                                        if(!$result || !$result2){
                                            echo '<div class="callout callout-danger"><h4>Mislukt :(</h4><p>Er is iets mis gegaan, probeer het eens opnieuw</p>';
                                            echo $conn->error(); //debugging purposes, uncomment when needed
                                            echo $connweb->error(); //debugging purposes, uncomment when needed
                                            echo '</div>';
                                        }else{
                                            echo '<div class="callout callout-success"><h4>Gelukt :)</h4><p>het bericht is succesvol gewijzigd</p></div>';
                                            $title = "feest bericht gewijzigd";
                                            $Titem_title = "<a href='profile.php?show_user=" . $_SESSION['user_name'] . "'>" . $_SESSION['user_name'] . "</a> heeft het " . $title;
                                            event_timeline_item_create($conn, $Titem_title, 5, $event_id);
                                            header('Refresh: 2; url=event.php?event='. $event_id . '');
                                        }
                                    }
                                }else{
                                    echo '<div class="callout callout-danger"><h4>Mislukt :(</h4><p>Er is iets mis gegaan, probeer het eens opnieuw</p></div>';
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
