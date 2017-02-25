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
    $event_cat = $row['event_cat'];
    $event_location = $row['event_location'];
    $event_color = $row['event_color'];
    $event_progress = $row['event_progress'];
    $event_cover_image = $row['event_cover_image'];
    $event_post = $row['event_post'];
    $event_organization = $row['event_organization'];
    $event_organization_contact = $row['event_organization_contact'];
    $event_organization_tel = $row['event_organization_tel'];
    $event_organization_mail = $row['event_organization_mail'];
}

if($event_post != 0){
    $SQL = "SELECT * FROM posts WHERE post_id='$event_post'";
    $result = $connweb->query($SQL);
    
    $row = mysqli_fetch_assoc($result);
    
    $event_post_id = $row['post_id'];
    $event_post_title = $row['post_title'];
    $event_post_content = $row['post_content'];
    $event_post_visible = $row['post_visible'];    
}

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Feest Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="ion ion-beer"></i> Home</a></li>
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
                  <b>Organisator</b> <a class="pull-right"><?php echo $event_organization; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Contact Persoon</b> <a class="pull-right"><?php echo $event_organization_contact; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Tel Organisator</b> <a href="tel:<?php echo $event_organization_tel; ?>" class="pull-right"><?php echo $event_organization_tel; ?></a>
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
              <li class="active"><a href="#info" data-toggle="tab">Info</a></li>
              <li><a href="#news" data-toggle="tab">Nieuws</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="info">
                <!-- Post -->
                <div class="post">
                  <!-- /.user-block -->
                  <!-- /.row -->
                    <h3>
                        Basis informatie
                    </h3>
                    <p>
                        Hier kan de basis informatie gewijzigd worden. Ook kan hier de status worden geupdate.
                    </p>
                </div>
                <!-- /.post -->
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Basis informatie</h4>
                            <form class="form-horizontal" action="eventsettings.php?event_id=<?php echo $event_id ?>&action=1" method="POST">
                                <div class="form-group">
                                    <label for="inputTitle" class="col-sm-2 control-label">Naam</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputTitle" placeholder="Naam van het feest"    value="<?php echo $event_title; ?>" name="event_title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputTitle" class="col-sm-2 control-label">Beschrijving</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputTitle" placeholder="Beschrijving van het feest" value="<?php echo $event_description; ?>" name="event_description">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDate" class="col-sm-2 control-label">Datum</label>
                                    <div class="col-sm-10">
                                        <input type="Date" class="form-control" id="inputDate" placeholder="Date" value="<?php echo $event_date; ?>" name="event_date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputlocation" class="col-sm-2 control-label">Locatie</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputlocation" placeholder="Naam van het feest"    value="<?php echo $event_location; ?>" name="event_location">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-flat btn-primary pull-right">Wijzig</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h4>Organisatie</h4>
                            <form class="form-horizontal" action="eventsettings.php?event_id=<?php echo $event_id ?>&action=2" method="POST">
                                <div class="form-group">
                                    <label for="inputTitle" class="col-sm-2 control-label">Naam</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputOrganizer" placeholder="Naam van de organisatie" value="<?php echo $event_organization ?>" name="event_organization">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputTitle" class="col-sm-2 control-label">Contact Persoon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputOrganizer" placeholder="Naam van de contactpersoon" value="<?php echo $event_organization_contact ?>" name="event_organization_contact">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDate" class="col-sm-2 control-label">Telefoon</label>
                                    <div class="col-sm-10">
                                        <input type="tel" class="form-control" id="inputOrganizer" placeholder="Telefoon nummer organisatie" value="<?php echo $event_organization_tel ?>" name="event_organization_tel">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDate" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="tel" class="form-control" id="inputOrganizer" placeholder="Email van de organisatie" value="<?php echo $event_organization_mail ?>" name="event_organization_mail">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-flat btn-default pull-right">Wijzig</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Extra informatie</h4>
                            <form class="form-horizontal" action="eventsettings.php?event_id=<?php echo $event_id ?>&action=3" method="POST">
                                <div class="form-group">
                                    <label for="inputColor" class="col-sm-2 control-label">Kleur</label>
                                    <div class="col-sm-10">
                                        <input type="color" class="form-control" id="inputColor" value="<?php echo $event_color; ?>" name="event_color">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputType" class="col-sm-2 control-label">Type</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="inputType" name="event_cat">
                                            <?php                                            
                                                $SQL = "SELECT * FROM event_categories";
                                                $result = $conn->query($SQL);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo "<option value='" . $row['cat_id'] . "'";
                                                    if($row['cat_id'] == $event_cat){
                                                        echo " selected";
                                                    }
                                                    echo ">" . $row['cat_name'] . "</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhoto" class="col-sm-2 control-label">Omslag Foto</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="inputPhoto" name="event_cover_image" accept=".jpg,.jpeg,.png,.gif">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-flat btn-default pull-right">Wijzig</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="news">
                    <div class="post">
                        <h3>
                            Nieuws
                        </h3>
                        <p>
                            Wanneer het nieuws item is geactiveerd, wordt onderstaande tekst gebruikt. De omslag foto wordt gebruikt als cover foto op de website. Om het nieuws item ook op de voorpagina te krijgen moet je dit wijzigen onder berichten.
                        </p>
                    </div>
                    <div class="post">
                        <form class="form-horizontal" action="eventsettings.php?event_id=<?php echo $event_id ?>&action=4" method="POST">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input type="text" class="form-control" placeholder="Type hier de titel" name="post_title" <?php if($event_post != 0){ echo "value='" . $event_post_title . "'"; } ?> >
                                </div>
                            </div>
                            <textarea class="textarea" placeholder="Type uw bericht" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="post_content">
                                <?php if($event_post != 0){ echo $event_post_content; } ?>
                            </textarea>
                            <div class="form-group">
                                <div class="col-xs-6">
                                  <div class="checkbox icheck">
                                      <label>
                                        <input type="checkbox" name="post_visible" <?php if($event_post != 0 && $event_post_visible == 1){ echo "checked"; } ?>> Activeer bericht
                                      </label>
                                  </div>
                                </div>
                                <div class="col-xs-6">
                                    <input type="hidden" name="post_img" value="<?php echo $event_cover_image ?>">
                                    <input type="submit" class="btn btn-flat btn-primary pull-right" value="Wijzigingen opslaan"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- END timeline item -->
                    <?php
                        $SQL = "SELECT *, DATE_FORMAT(item_date,'%d %b %Y') AS date FROM event_timeline_items WHERE item_event='$event_id' ORDER BY item_date DESC, item_id DESC";
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