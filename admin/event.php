<?php
include "top.php";
if(!isset($_GET['event'])){
    header('Refresh: 0; url=events.php');
    exit();
}else{
    $event = $_GET['event'];
}

$SQL = "SELECT *, DATE_FORMAT(event_date,'%d %b %Y') AS date FROM events WHERE event_id='$event'";
$result = $conn->query($SQL);

while($row = mysqli_fetch_assoc($result)){
    $event_id = $row['event_id'];
    $event_title = $row['event_title'];
    $event_description = $row['event_description'];
    $event_date = $row['event_date'];
    $date = $row['date'];
    $event_location = $row['event_location'];
    $event_color = $row['event_color'];
    $event_progress = $row['event_progress'];
    $event_cover_image = $row['event_cover_image'];
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
        <li><a href="events.php">Feestjes</a></li>
        <li class="active"><?php echo $event_title; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                <h3 class="profile-username text-center"><?php echo $event_title;?></h3>
                <?php
                    if(!empty($event_cover_image)){
                ?>
                <div class="row">
                    <div class="col-sm-12" style="background: url('<?php echo $event_cover_image ?>') center center; height:100px; margin-left:5px; margin-bottom: 5px;width: calc(100% - 10px);"></div>
                    <!-- /.col -->
                </div>
                <?php
                    }
                ?>
              

              <p class="text-muted text-center"><?php echo $event_description;?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Datum</b> <a class="pull-right"><?php echo $date; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Organisator</b> <a class="pull-right">De Feestcommisie</a>
                </li>
                <li class="list-group-item">
                  <b>Tel Organisator</b> <a href="tel:0653807162" class="pull-right">0653807162</a>
                </li>
                <li class="list-group-item">
                  <b>Locatie</b> <a class="pull-right"><?php echo $event_location; ?></a>
                </li>
                <li class="list-group-item">
                    <b>Status</b>
                        <div class='progress active' style="margin-top: 5px; margin-bottom: 5px;">
                            <div class='progress-bar progress-bar-aqua progress-bar-striped' role='progressbar' aria-valuenow='<?php echo $event_progress ?>' aria-valuemin='0' aria-valuemax='100' style='width: <?php echo $event_progress ?>%;'>
                                <span class='sr-only'><?php echo $event_progress ?>% Complete</span>
                            </div>
                        </div>  
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
                        Lichttechnicus
                    </h3>
                    <p>
                        Dit zijn drie van mijn beste foto's.
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
                        $SQL = "SELECT *, DATE_FORMAT(item_date,'%d %b %Y') AS date FROM timeline_items WHERE item_user='$user_id' ORDER BY item_date DESC";
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