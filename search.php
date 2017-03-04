<?php
//Search.php

$page_title = "Zoeken";
include "top.php";
?>

<?php
    mysql_connect($db_servername, $db_username, $db_password) or die("Error connecting to database: ".mysql_error());
    /*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */
     
    mysql_select_db($db_name) or die(mysql_error());
    /* tutorial_search is the name of database we've created */
?>

<article class="body-item">
    
	<div class="row row-eq-height">
         <div class="col-xs-12">
            <div class="box shadow">
				<div class="min-height-18">
					<div class="box-heading">Zoek resultaten</div>
                    <div class='hr'></div>
                        <div class='box-body'>
                    

<?php
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysql_query("SELECT post_id, post_by, category_id, post_title, MID(post_content,1,850) AS post_content, DATE_FORMAT(post_date,'%d')AS post_date_day, DATE_FORMAT(post_date,'%M')AS post_date_month, DATE_FORMAT(post_date,'%Y')AS post_date_year, post_img FROM posts
            WHERE post_visible = 0 AND (`post_title` LIKE '%".$query."%') OR (`post_content` LIKE '%".$query."%')") or die(mysql_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
            echo"<p>Je zocht naar:" .$query;
            echo"</p>
                </div>
            </div>
        </div>
    </div>";
             
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                
                echo "<div class='col-xs-12'>
                        <div class='box shadow'>
                            <div class='min-height-18'>
                               <div class='box-heading'>".$results['post_title']."</div>
                                    <div class='hr'></div>
                                        <div class='box-body'>
                                            <div class='col-xs-12 col-sm-6 col-md-8'>";
                
                echo  "<p>".htmlspecialchars_decode ($results['post_content'])."<br /><a class='more' href='nieuws_page.php?id=".$results['post_id']."'>Meer</a></div>";
                echo  "<div clas='col-xs-12 col-sm-6 col-md-4'><img style='width: 33.33333333%;height: auto;' src='".$results['post_img']."'></div>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
                echo"</p></div></div></div></div>";
            }
             
        }
        else{ // if there is no matching rows do following
            echo "Geen resultaten";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimale lengte is ".$min_length;
    }
?>

 
</article>
                
<?php
include "bottom.php";
?>