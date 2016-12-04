<?php
//Index.php

$page_title = "Home";
include "top.php";

$SQL = "SELECT post_id, post_by, category_id, post_title, MID(post_content,1,255) AS post_content, DATE_FORMAT(post_date,'%d')AS post_date_day, DATE_FORMAT(post_date,'%M')AS post_date_month, DATE_FORMAT(post_date,'%Y')AS post_date_year, post_img FROM posts WHERE post_visible = 1 ORDER BY post_date DESC, post_id DESC LIMIT 3";
$result1 = $connection->query($SQL);

$SQL = "SELECT slider_img, slider_title, slider_content, slider_id FROM slider ORDER BY slider_id ASC";
$result2 = $connection->query($SQL);
?>
<article class="body-item">
	<div class="slider hidden-xs padding-20-top">
		<div id="myCarousel" class="carousel slide shadow" data-ride="carousel">
		  <!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">

				<div class="item active height-300">
					<img src="IMG/nieuwjaar2016.jpg" alt="Chania" class="cover">
					<div class="carousel-caption">
						<h3>Nieuwjaarsgala</h3>
					</div>
				</div>

			<?php 
			while($row2 = $result2->fetch_assoc()){
				$_SESSION['slider_img']    = $row2['slider_img'];
				echo "<div class='item height-300'>";
				echo "<img src='". $_SESSION['slider_img'] ."' alt='Chania' class='cover'>";
				echo "<div class='carousel-caption'>";
				echo "<h3>" . $row2['slider_title'] . "</h3>";
				echo "<p>" . $row2['slider_content'] . "</p>";
				echo "</div>";
				echo "</div>";
			}
			?>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<div class="row row-eq-height">
		<?php 
			while($row1 = $result1->fetch_assoc()){
		
				echo "<div class='col-xs-12 col-sm-6 col-md-4'>";
					echo "<div class='box shadow'>";
                    echo "<a class='gal-album-img' href='nieuws_page?page=" . $row1['post_id'] . "' style='background-image:url(" . $row1['post_img'] . ")'></a>";
						echo "<div class='min-height-180'>";
							echo "<div class='box-heading'>" . $row1['post_title'] . "</div>";
							echo "<div class='hr'></div>";
							echo "<div class='box-body'>";
								echo "<p>" . $row1['post_content'] . "</p>";
                                echo "<a class='more' href='nieuws_page.php?id=" . $row1['post_id'] . "'>Meer</a>";	
							echo "</div>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			}
		?>

	</div>
</article>
<?php
//Index.php
include "bottom.php";
?>