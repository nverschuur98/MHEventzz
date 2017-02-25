<?php
include "top.php";
if(!isset($_GET['item'])){
    header('Refresh: 0; url=newsitems.php');
    exit();
}else{
    $post = $_GET['item'];
}

if($post != "new"){
    $SQL = "SELECT *, DATE_FORMAT(post_date,'%d %b %Y') AS date FROM posts WHERE post_id='$post'";
    $result = $connweb->query($SQL);

    while($row = mysqli_fetch_assoc($result)){
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_content = $row['post_content'];
        $post_date = $row['post_date'];
        $date = $row['date'];
        $post_cat = $row['category_id'];
        $post_by = $row['post_by'];
        $post_visible = $row['post_visible'];
        $post_img = $row['post_img'];
    }
}else{
    $post_id = "new";
    $post_title = "";
    $post_content = "";
    $post_date = "";
    $date = "";
    $post_cat = "";
    $post_by = $user_id;
    $post_visible = 1;
    $post_img = "";
}


?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php 
            if($post == "new"){
                echo "Bericht Toevoegen";
            }else{
                echo "Bericht Wijzigen";
            }
          
          ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="ion ion-android-textsms"></i> Home</a></li>
        <li><a href="newsitems.php">Berichten</a></li>
        <li class="active">
            <?php 
                if($post == "new"){
                    echo "Nieuw Bericht";
                }else{
                    echo $post_title;
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
                <i class="ion ion-android-textsms"></i>
                <h3 class="box-title">Bericht</h3>
                <?php if($post != "new"){ ?>
                    <div class="pull-right box-tools">
                        <form action="newsitemsettings.php?post_id=<?php echo $post_id ?>&action=0" method="POST">
                            <input type="hidden" name="post_title" <?php echo "value='" . $post_title . "'"; ?>>
                            <button type="submit" class="btn btn-danger btn-flat">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                <?php }?>
            </div>
            <div class="box-body">
                <form class="form-horizontal" action="newsitemsettings.php?post_id=<?php echo $post_id ?>&action=1" method="POST">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" class="form-control" placeholder="Type hier de titel" name="post_title" <?php echo "value='" . $post_title . "'"; ?> >
                        </div>
                    </div>
                    <textarea class="textarea" placeholder="Type uw bericht" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="post_content">
                        <?php echo $post_content; ?>
                    </textarea>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="post_visible" <?php if($post_visible == 1){ echo "checked"; } ?>> Activeer bericht
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <input type="hidden" name="post_img" value="<?php echo $post_img ?>">
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