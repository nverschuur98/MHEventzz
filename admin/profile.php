<?php
include "top.php";
if(!isset($_GET['show_user'])){
    $user = $_SESSION['user_name'];
}else{
    $user = $_GET['show_user'];
}

$SQL = "SELECT *, DATE_FORMAT(user_birthday,'%d %b %Y') AS birthday, DATE_FORMAT(user_since,'%d %b %Y') AS since FROM users WHERE user_name='$user'";
$result = $conn->query($SQL);

while($row = mysqli_fetch_assoc($result)){
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_cover_image = $row['user_cover_image'];
    $user_birthday = $row['birthday']; 
    $user_birthday_o = $row['user_birthday'];
    $user_description = $row['user_description'];
    $user_since = $row['since'];
}

$action = $_GET['action'];
 
if($action == 1){
        $noti_id = $_GET['noti_id'];
        
        $SQL = "DELETE FROM notifications WHERE noti_id='$noti_id'";                        
        $result = $conn->query($SQL);
    }else{
        
    }
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gebruikers Profiel
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-users"></i> Home</a></li>
        <li><a href="profiles.php">Profielen</a></li>
        <li class="active"><?php echo $user; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $user_image; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $user_name;?></h3>

              <p class="text-muted text-center"><?php echo $user_description;?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Verjaardag</b> <a class="pull-right"><?php echo $user_birthday; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Feestjes Gedaan</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Lid Sinds</b> <a class="pull-right"><?php echo $user_since; ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#profile" data-toggle="tab">Profiel</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                <?php 
                    if($user_name == $_SESSION['user_name']){
                ?>
                <li><a href="#settings" data-toggle="tab">Settings</a></li>
                <?php 
                    }
                ?>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="profile">
                <!-- Post -->
                <div class="post">
                  <!-- /.user-block -->
                    <?php
                        if(!empty($user_cover_image)){
                    ?>
                  <div class="row margin-bottom">
                    <div class="col-sm-12" style="background: url('<?php echo $user_cover_image ?>') center center; height:200px; margin-left:5px;width: calc(100% - 10px);"></div>
                    <!-- /.col -->
                  </div>
                    <?php
                        }
                    ?>
                  <!-- /.row -->
                    <h3>
                        <?php echo $user_name;?>
                    </h3>
                    <p>
                        <?php echo $user_description;?>
                    </p>
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- END timeline item -->
                    <?php
                        $SQL = "SELECT *, DATE_FORMAT(item_date,'%d %b %Y') AS date FROM timeline_items WHERE item_user='$user_id' ORDER BY item_date DESC, item_id DESC";
                        $result = $conn->query($SQL);
                    
                        while($row = mysqli_fetch_assoc($result)){
                            
                            $class = timeline_item_cat_to_class($conn, $row['item_cat']);
                            
                            if(empty($oldDate) || $row['date'] != $oldDate){
                                
                                echo "<li class='time-label'>";
                                echo "<span class='bg-blue'>" . $row['date'] . "</span>";
                                echo "</li>";
                                
                                $oldDate = $row['date'];
                            }
                            
                            echo "<li>";
                            echo "<i class='" . $class . "'></i>";
                            echo "<div class='timeline-item'>";
                            echo "<h3 class='timeline-header no-border'>";
                            echo $row['item_title'];
                            echo "</h3>";
                            echo "</li>";
                        }
                    ?>
                    <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                </ul>
              </div>
              <!-- /.tab-pane -->
                <?php 
                    if($user_name == $_SESSION['user_name']){
                ?>
              <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="profilesettings.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Naam</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Voor en Achternaam" value="<?php echo $user_name; ?>" name="user_name">
                    </div>
                  </div>
                    
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $user_email; ?>" name="user_email">
                    </div>
                  </div>
                    
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Verjaardag</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="inputName" placeholder="Name" value="<?php echo $user_birthday_o; ?>" name="user_birthday">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Functies</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Functies" name="user_description"><?php echo $user_description; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Profiel Foto</label>
                    <div class="col-sm-10">
                        <input type="file" id="fileToUpload" name="fileToUpload" accept=".jpg,.jpeg,.png,.gif">
                        <p class="help-block">let op: kies een vierkante afbeelding, Anders wordt deze vervormd.</p>
                    </div>
                  </div>
                    <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Omslag Foto</label>
                        <div class="col-sm-10">
                            <input type="file" id="cover_image" name="cover_image" accept=".jpg,.jpeg,.png,.gif">
                        </div>
                    </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-flat btn-primary">Wijzig instellingen</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
                <?php 
                    }
                ?>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
<?php
include "bottom.php";
?>