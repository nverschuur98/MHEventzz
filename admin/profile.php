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
    $user_name = $row['user_name'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_birthday = $row['birthday'];
    $user_birthday_o = $row['user_birthday'];
    $user_description = $row['user_description'];
    $user_since = $row['since'];
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profiles</a></li>
        <li class="active"><?php echo $user_name; ?></li>
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
              <li><a href="#profile" data-toggle="tab">Profiel</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="profile">
                <!-- Post -->
                <div class="post">
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
                    <div class="col-sm-4">
                      <img class="img-responsive" src="dist/img/photo1.png" alt="Photo">
                    </div>
                    <div class="col-sm-4">
                      <img class="img-responsive" src="dist/img/photo2.png" alt="Photo">
                    </div>
                    <div class="col-sm-4">
                      <img class="img-responsive" src="dist/img/photo4.jpg" alt="Photo">
                    </div>
                    <!-- /.col -->
                  </div>
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
                    <li class="time-label">
                        <span class="bg-blue">
                          13 Jan 2017
                        </span>
                    </li>
                    <li>
                        <i class="ion ion-beer bg-green"></i>

                        <div class="timeline-item">
                            <h3 class="timeline-header no-border"><a href="profile.php?show_user=<?php echo $user_name; ?>"><?php echo $user_name; ?></a> heeft een feestje gevierd bij <a href="#">GHL Nieuwjaars Gala</a>.</h3>
                        </div>
                    </li>
                    <li class="time-label">
                        <span class="bg-blue">
                          <?php echo $user_since;?>
                        </span>
                    </li>
                    <li>
                        <i class="fa fa-child bg-gray"></i>

                        <div class="timeline-item">
                            <h3 class="timeline-header no-border"><a href="profile.php?show_user=<?php echo $user_name; ?>"><?php echo $user_name;?></a> is lid geworden</h3>
                        </div>
                    </li>
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Naam</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Voor en Achternaam" value="<?php echo $user_name; ?>">
                    </div>
                  </div>
                    
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $user_email; ?>">
                    </div>
                  </div>
                    
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Verjaardag</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="inputName" placeholder="Name" value="<?php echo $user_birthday_o; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Functies</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Functies"><?php echo $user_description; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Profiel Afbeelding</label>
                    <div class="col-sm-10">
                        <input type="file" id="exampleInputFile">
                        <p class="help-block">let op: kies een vierkante afbeelding, Anders wordt deze vervormd.</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
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