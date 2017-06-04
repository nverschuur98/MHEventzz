<?php
include "top.php";
if(!isset($_GET['item'])){
    header('Refresh: 0; url=newsitems.php');
    exit();
}else{
    $slide_id = $_GET['item'];
}

if($slide_id != "new"){
    $SQL = "SELECT * FROM slider WHERE slider_id=$slide_id";
    $result = $connweb->query($SQL);

    while($row = mysqli_fetch_assoc($result)){
        $slider_id = $row['slider_id'];
        $slider_title = $row['slider_title'];
        $slider_content = $row['slider_content'];
        $slider_img = $row['slider_img'];
        $slider_location = $row['slider_location'];
    }
}else{
    $slider_id = "new";
    $slider_title = "";
    $slider_content = "";
    $slider_img = "";
    $slider_location = "";
}


?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php 
            if($slide_id == "new"){
                echo "Slider Toevoegen";
            }else{
                echo "Slider Wijzigen";
            }
          
          ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="ion ion-image"></i> Home</a></li>
        <li><a href="#">Slider</a></li>
        <li class="active">
            <?php 
                if($slider_id == "new"){
                    echo "Nieuwe Slider";
                }else{
                    echo $slider_title;
                }
            ?>
        </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-header">
                <i class="ion ion-image"></i>
                <h3 class="box-title">Bericht</h3>
                <?php if($slider_id != "new"){ ?>
                    <div class="pull-right box-tools">
                        <form action="slideritemsettings.php?slider_id=<?php echo $slider_id ?>&action=0" method="POST">
                            <input type="hidden" name="post_title" value="<?php echo $slider_title ?>">
                            <button type="submit" class="btn btn-danger btn-flat">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                <?php }?>
            </div>
            <div class="box-body">
                <form class="form-horizontal" action="slideritemsettings.php?slider_id=<?php echo $slider_id ?>&action=1" method="POST" enctype="multipart/form-data">
                    <?php 
                        if($slider_id == "new"){
                            echo "<input type='hidden' value='" . $_POST['slider_location'] . "' name='slider_location'>";
                        }else{
                            echo "<input type='hidden' value='" . $slider_location . "' name='slider_location'>"; 
                        }
                    ?>                
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="col-md-12">
                                <label for="slider_title" class="col-sm-12">Slider Titel</label>
                                <input type="text" class="form-control" placeholder="Type hier de titel" name="slider_title" <?php echo "value='" . $slider_title . "'"; ?> >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col-md-12">
                                <label for="slider_content" class="col-sm-12">Slider Ondertitel</label>
                                <input type="text" class="form-control" placeholder="Type hier de ondertitel" name="slider_content" <?php echo "value='" . $slider_content . "'"; ?> >
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="slider_img" class="col-sm-12">Slider Foto</label>
                            <div class="col-sm-12">
                                <input type="file" id="slider_img" name="slider_img" accept=".jpg,.jpeg,.png,.gif">
                                <p class="help-block">let op: de afbeelding mag niet groter zijn dan 2MB.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php
                            if($slider_id != "new"){
                                echo "<img class='col-xs-12 img-responsive' src=" . "../" .  $slider_img . " alt=" . $slider_title . ">";
                            }
                            ?>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-xs-12">
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
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
<?php
include "bottom.php";
?>