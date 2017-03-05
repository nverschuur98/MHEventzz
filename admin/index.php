<?php
include "top.php";
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 0.3.9</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-facebook"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Facebook Likes</span>
                <script src="JS/facebookcount.js" type='text/javascript'></script>
                <span class="info-box-number facebookcount"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-twitter"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Twitter Followers</span>
                <script src="JS/twittercount.js" type='text/javascript'></script>
              <span class="info-box-number twittercount"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-beer"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Feesten en Partijen</span>
                <span class="info-box-number">
                <?php
                    $SQL = "SELECT COUNT(*) AS amount FROM events";
                    
                    $result = $conn->query($SQL);
                    echo mysqli_fetch_assoc($result)['amount'];
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="ion ion-social-instagram-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Instagram followers</span>
                <!--<script src="JS/odometer.js"></script>
                <script src="JS/main.js"></script>
                <link rel="stylesheet" href="JS/odometer-theme-default.css">-->
                <script src="JS/instagramcount.js" type='text/javascript'></script>
              <span class="info-box-number instagramcount" id="channelFollowers"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-6">
          <div class="row">
        <div class="col-xs-12">
          <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-header">
                <i class="ion ion-android-textsms"></i>
                <h3 class="box-title">Nieuw Bericht</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" action="newsitemsettings.php?post_id=new&action=1" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" class="form-control" placeholder="Type hier de titel" name="post_title">
                        </div>
                    </div>
                    <hr>
                    <textarea class="textarea" placeholder="Type uw bericht" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="post_content">
                    </textarea>
                    <hr>
                    <div class="form-group">
                        <label for="post_img" class="col-sm-12">Bericht Foto</label>
                        <div class="col-sm-12">
                            <input type="file" id="post_img" name="post_img" accept=".jpg,.jpeg,.png,.gif">
                            <p class="help-block">let op: de afbeelding mag niet groter zijn dan 2MB.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="post_visible" checked> Activeer bericht
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <input type="submit" class="btn btn-flat btn-primary pull-right" value="Wijzigingen opslaan"/>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
        </div>
        <!-- /.col -->

        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Soorten Verhuur</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="150"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <?php
                        $SQL = "SELECT * FROM event_categories";
                        $result = $conn->query($SQL);
                      
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<li>";
                                echo "<i class='fa fa-circle text-red' style='color: " . $row['cat_color'] . " !important;'>";
                                echo "</i> ";
                                echo $row['cat_name'];
                            echo "</li>";
                        }
                    ?>
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<?php
include "JS/verhuur_graph.php";
include "bottom.php";
?>