<?php
include "top.php";
//Check all varaibles

$action = $_GET['action'];
$post_id = $_GET['post_id'];
$post_title = $_POST['post_title'];
$post_img = "";


?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Instellingen
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="ion ion-android-textsms"></i> Home</a></li>
        <li><a href="newsitems.php">Berichten</a></li>
        <li class="active"><?php echo $post_title; ?></li>
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
                                
                                $SQL = "UPDATE events SET event_post=0 WHERE event_post='$post_id'";
                                $SQL2 = "DELETE FROM posts WHERE post_id='$post_id'";
                                
                                $result = $conn->query($SQL);
                                $result2 = $connweb->query($SQL2);
                                    
                                if(!$result || !$result2){
                                    echo '<div class="callout callout-danger"><h4>Mislukt :(</h4><p>Er is iets mis gegaan, probeer het eens opnieuw</p>';
                                        echo $connweb->error; //debugging purposes, uncomment when needed
                                    echo '</div>';
                                }else{
                                    echo '<div class="callout callout-success"><h4>Gelukt :)</h4><p>het bericht is succesvol verwijderd</p></div>';
                                }
                                
                            }else if($action == 1){

                                $post_title = htmlentities($_POST['post_title']);
                                $post_content = htmlentities($_POST['post_content']);
                                $post_visible = false;
                                if(!empty($_POST['post_img'])){
                                    $post_img = "admin/" . $_POST['post_img']; //CHECK FOR RIGHT LOCATION
                                }
                                if(isset($_POST['post_visible'])){
                                    $post_visible = true;
                                }
                                
                                if(isset($post_title) && isset($post_content) && !empty($post_title) && !empty($post_content)){
                                    // All required fields are filled in, ready to insert or update

                                    if(!empty($post_id) && $post_id != "new"){
                                        // UPDATE
                                        $SQL = "UPDATE posts SET post_title='$post_title', post_content='$post_content', post_visible='$post_visible' WHERE post_id='$post_id'";
                                        $SQLTL = "SELECT * FROM events WHERE event_post='$post_id'";
                                        
                                        $result = $connweb->query($SQL);
                                        $resultTL = $conn->query($SQLTL);
                                        
                                        if(!$result || !$resultTL){
                                            echo '<div class="callout callout-danger"><h4>Mislukt :(</h4><p>Er is iets mis gegaan, probeer het eens opnieuw</p>';
                                            echo $conn->error; //debugging purposes, uncomment when needed
                                            echo $connweb->error; //debugging purposes, uncomment when needed
                                            echo '</div>';
                                        }else{
                                            $row = mysqli_fetch_assoc($resultTL);
                                            if(!empty($row['event_post'])){
                                                $title = "feest bericht gewijzigd";
                                                $Titem_title = "<a href='profile.php?show_user=" . $_SESSION['user_name'] . "'>" . $_SESSION['user_name'] . "</a> heeft het " . $title;
                                                event_timeline_item_create($conn, $Titem_title, 5, $row['event_id']);
                                            }
                                            echo '<div class="callout callout-success"><h4>Gelukt :)</h4><p>het bericht is succesvol gewijzigd</p></div>';
                                            header('Refresh: 3; url=newsitems.php');
                                        }
                                        
                                    }else{
                                        //INSERT
                                        $SQL = "INSERT INTO posts (post_title, post_content, post_date, post_visible, post_img, post_by) VALUES ('$post_title', '$post_content', NOW(), '$post_visible', '$post_img', '$user_id')";
                                        
                                        $result = $connweb->query($SQL);
                                        $post_id = $connweb->insert_id;
                                        
                                        if(!$result || isset($result2) && !$result2){
                                            echo '<div class="callout callout-danger"><h4>Mislukt :(</h4><p>Er is iets mis gegaan, probeer het eens opnieuw</p>';
                                            echo $conn->error; //debugging purposes, uncomment when needed
                                            echo $connweb->error; //debugging purposes, uncomment when needed
                                            echo '</div>';
                                        }else{
                                            echo '<div class="callout callout-success"><h4>Gelukt :)</h4><p>het bericht is succesvol gewijzigd</p></div>';
                                            header('Refresh: 3; url=newsitems.php');                                    
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