<?php
//Gallerij_page.php
$page_title = "Galerij";
include "top.php";
$request_page = $_GET['page'];

if($request_page == "nieuwjaarsgala"){
?>
<article class="body-item">
	<div class="row">
		<?php
			$photonumber=1; 
			while($photonumber<=61){
                ?>
					<div class='col-lg-3 col-md-4 col-sm-4 col-xs-6'>
						<div class='box shadow margin-20-top'>
							<a href='IMG\Nieuwjaarsgala2016\DSC (<?php echo $photonumber ?>).jpg' data-lightbox='Gallerij'>
                                <div class='gal-img shadow' style="background-image: url('IMG\\Nieuwjaarsgala2016\\thumb\\DSC (<?php echo $photonumber ?>).jpg')"></div>
							</a>
						</div>
					</div>
                <?php
				$photonumber++;
			} 
		?>
	</div>
</article>
<!-- jQuery library -->
<script src="JS/lightbox-plus-jquery.min.js"></script>

<?php
}elseif($request_page == "pass_nieuwjaarsgala"){
$page_title = "Galerij";
?>

<article class="body-item">
	<div class="row">
		<?php
			$photonumber=1; 
			while($photonumber<=362){
                ?>
					<div class='col-lg-3 col-md-4 col-sm-4 col-xs-6'>
						<div class='box shadow margin-20-top'>
							<a href='IMG\Nieuwjaarsgala2016-fotohoek\Gala (<?php echo $photonumber ?>).jpg' data-lightbox='Gallerij'>
                                <div class='gal-img shadow' style="background-image: url('IMG\\Nieuwjaarsgala2016-fotohoek\\thumb\\Gala (<?php echo $photonumber ?>).jpg')"></div>
							</a>
						</div>
					</div>
                <?php
				$photonumber++;
			} 
		?>
	</div>
</article>
<!-- jQuery library -->
<script src="JS/lightbox-plus-jquery.min.js"></script>

<?php
}elseif($request_page == "waddinxveen2016"){
$page_title = "Galerij";
?>

<article class="body-item">
	<div class="row">
		<?php
			$photonumber=1; 
			while($photonumber<=20){
				?>
					<div class='col-lg-3 col-md-4 col-sm-4 col-xs-6'>
						<div class='box shadow margin-20-top'>
							<a href='IMG\Waddinxveen2016\MIB (<?php echo $photonumber ?>).jpg' data-lightbox='Gallerij'>
                                <div class='gal-img shadow' style="background-image: url('IMG\\Waddinxveen2016\\MIB (<?php echo $photonumber ?>).jpg')"></div>
							</a>
						</div>
					</div>
                <?php			
				$photonumber++;
			} 
		?>
	</div>
</article>
<!-- jQuery library -->
<script src="JS/lightbox-plus-jquery.min.js"></script>

<?php
}
include "bottom.php";
?>