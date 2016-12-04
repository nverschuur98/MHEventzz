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
				echo "
					<div class='col-lg-2 col-md-3 col-sm-4 col-xs-6'>
						<div class='box shadow margin-20-top'>
							<a class='gal-thumb ' href='IMG\Nieuwjaarsgala2016\DSC (" . $photonumber . ").jpg' data-lightbox='Gallerij'><!--Real Image-->
								<img class='gal-img shadow' src='IMG\Nieuwjaarsgala2016\\thumb\DSC (" . $photonumber . ").jpg' alt=''><!--Thumbnail-->
							</a>
						</div>
					</div>"
				;	
			
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
				echo "
					<div class='col-lg-2 col-md-3 col-sm-4 col-xs-6'>
						<div class='box shadow margin-20-top'>
							<a class='gal-thumb ' href='IMG\Nieuwjaarsgala2016-fotohoek\Gala (" . $photonumber . ").jpg' data-lightbox='Gallerij'><!--Real Image-->
								<img class='gal-img shadow' src='IMG\Nieuwjaarsgala2016-fotohoek\\thumb\Gala (" . $photonumber . ").jpg' ><!--Thumbnail-->
							</a>
						</div>
					</div>"
				;	
			
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
				echo "
					<div class='col-lg-2 col-md-3 col-sm-4 col-xs-6'>
						<div class='box shadow margin-20-top'>
							<a class='gal-thumb ' href='IMG\Waddinxveen2016\MIB (" . $photonumber . ").jpg' data-lightbox='Gallerij'><!--Real Image-->
								<img class='gal-img shadow' src='IMG\Waddinxveen2016\\\MIB (" . $photonumber . ").jpg' alt=''><!--Thumbnail-->
							</a>
						</div>
					</div>"
				;	
			
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