<?php
//Index.php

$page_title = "Nieuws";
include "top.php";

$SQL = "SELECT post_id, post_by, category_id, post_title, MID(post_content,1,255) AS post_content, DATE_FORMAT(post_date,'%d')AS post_date_day, DATE_FORMAT(post_date,'%M')AS post_date_month, DATE_FORMAT(post_date,'%Y')AS post_date_year, post_img FROM posts WHERE post_visible = 1 ORDER BY post_date DESC, post_id DESC";
$result = $connection->query($SQL);
?>
<article class="body-item">

	<div class="row row-eq-height">
		<?php 
			while($row = $result->fetch_assoc()){
		
				echo "<div class='col-xs-12 col-sm-6 col-md-4'>";
					echo "<div class='box shadow'>";
                    echo "<a class='gal-album-img' href='nieuws_page.php?id=" . $row['post_id'] . "' style='background-image:url(" . $row['post_img'] . ")'></a>";
						echo "<div class='min-height-180'>";
							echo "<div class='box-heading'>" . $row['post_title'] . "</div>";
							echo "<div class='hr'></div>";
							echo "<div class='box-body'>";
								echo "<p>" . $row['post_content'] . "</p>";
								echo "<a class='more' href='nieuws_page.php?id=" . $row['post_id'] . "'>Meer</a>";					
							echo "</div>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			}
		?>

	</div>
</article>

<?php
include "bottom.php";
?>