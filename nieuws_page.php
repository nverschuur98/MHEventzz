<?php
//nieuws_page.php

$page_title = "Nieuws";
include "top.php";

$post_id = $_GET['id'];

$SQL = "SELECT post_by, category_id, post_title, post_content, category_id, post_img FROM posts WHERE post_id = '" . $post_id . "'";
$result = $connection->query($SQL);
$row = $result->fetch_assoc();

?>

<article class="body-item">
    
	<div class="row row-eq-height">
         <div class="col-xs-12">
            <div class="box shadow">
            <a class='gal-album-img' href='#' style='background-image:url(<?php echo $row['post_img'] ?>)'></a>
					<div class="box-heading"><?php echo $row['post_title'] ?></div>
                    <div class='hr'></div>
                        <div class='box-body'><?php echo htmlspecialchars_decode($row['post_content']) ?></div>
             </div>
        </div>
    </div>
