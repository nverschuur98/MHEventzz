<?php
//check if the user is logged in
function check_logged_in(){

	if(!isset($_SESSION['logged_in'])){
		$_SESSION['logged_in'] = false;
	}
	
	if($_SESSION['logged_in'] == false){
		header('Refresh: 0; url=login.php');
		exit();
	}

}

//Get Quick info
function user_info($conn, $info, $id){
    $SQL = "SELECT $info FROM users WHERE user_id='$id'";
    
    $result = $conn->query($SQL);
    $user_info = mysqli_fetch_assoc($result);
    
    return $user_info[$info];
}

//Get user ID by email
function user_id_by_email($conn, $email){
    $SQL = "SELECT user_id FROM users WHERE user_email='$email'";
    
    $result = $conn->query($SQL);
    $user_id = mysqli_fetch_assoc($result);
    
    return $user_id['user_id'];
}

//Count the noti's for a user
function noti_count($conn, $id){
    $SQL = "SELECT COUNT(*) AS amount FROM notifications WHERE noti_user='$id'";
    
    $result = $conn->query($SQL);
    $amount = mysqli_fetch_assoc($result);
    
    return $amount['amount'];
}

//Switch from noti_cat to class
function noti_cat_to_class($conn, $cat){
    $SQL = "SELECT cat_icon_class FROM categories WHERE cat_id='$cat'";
    
    $result = $conn->query($SQL);
    $class = mysqli_fetch_assoc($result);
    
    return $class['cat_icon_class'];
}

//Create a noti
function noti_create($conn, $cat, $title, $link, $user){
    $SQL = "INSERT INTO notifications (noti_user, noti_cat, noti_title, noti_link, noti_date) VALUES ('$user','$cat', '$title', '$link', NOW())";
    $result = $conn->query($SQL);
}

//Create a timeline item
function timeline_item_create($conn, $title, $cat, $user){
    
    $title = $conn->real_escape_string($title);
    
    $SQL = "INSERT INTO timeline_items (item_title, item_cat, item_date, item_user) VALUES ('$title','$cat', NOW(), '$user')";
    $result = $conn->query($SQL);
}

//Create a event timeline item
function event_timeline_item_create($conn, $title, $cat, $event){
    
    $title = $conn->real_escape_string($title);
    
    $SQL = "INSERT INTO event_timeline_items (item_title, item_cat, item_date, item_event) VALUES ('$title','$cat', NOW(), '$event')";
    $result = $conn->query($SQL);
}

//Switch from noti_cat to class
function timeline_item_cat_to_class($conn, $cat){
    $SQL = "SELECT cat_timeline_class FROM categories WHERE cat_id='$cat'";
    
    $result = $conn->query($SQL);
    $class = mysqli_fetch_assoc($result);
    
    return $class['cat_timeline_class'];
}

//Return category name by cat id
function cat_name_from_id($conn, $id){
    $SQL = "SELECT cat_name FROM event_categories WHERE cat_id='$id'";
    
    $result = $conn->query($SQL);
    $name = mysqli_fetch_assoc($result);
    
    return $name['cat_name'];
}

//Upload an image
function upload_image($conn, $fc_array){
    /*
    function array structure: 
        [0]= image_input
        [1]= image_use //profile image //news image //cover image
        [2]= image_use_ident //Assign to this id or email etc
        
        array(1=>"image", 2=>"43", 3=>"");
    */
    
    if(isset($fc_array[0]["name"]) && !empty($fc_array[0]["name"])){
        $target_dir = "../IMG/";
        if($fc_array[1] == "event_cover_image"){
            $target_dir = "../IMG/event/" . $fc_array[2] . "/cp/"; 
            $target_dir_final = $target_dir;
        }else if($fc_array[1] == "post_img"){
            $target_dir = "IMG/posts/" . $fc_array[2] . "/"; 
            $target_dir_final = "../" . $target_dir;
        }
        
        if(!file_exists($target_dir_final)){
            mkdir($target_dir_final, 0777, true);
        }
        
        $target_file = $target_dir . basename($fc_array[0]["name"]);
        $target_file_final = $target_dir_final . basename($fc_array[0]["name"]);
                
        $uploadOk = 1;
        $imageFileType = strtoupper(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($fc_array[0]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $errorArray[] = "File is not an image.";
            $uploadOk = 0;
            $errorArray[] = "upload \$_FILES error :" . $fc_array[0]["error"];
        }
        
        // Check if file already exists
        if ($fc_array[1] == "event_cover_image" && file_exists($target_file_final)) {
            $errorArray[] = "Sorry, file already exists.";
            $uploadOk = 0;
        }else if($fc_array[1] == "post_img" && file_exists($target_file_final)){
            $errorArray[] = "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES[$fc_array[1]]["size"] > 3 * 1048576 /*MB*/) {
            $errorArray[] = "Sorry, your file is too large. Max 3 MB";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF" ) {
            $errorArray[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<div class='callout callout-danger'><strong>Mislukt :(</strong><br>Sorry, your file was not uploaded. The following errors occurred:<br>";
            echo '<ul>';
                foreach($errorArray as $key => $value){ /* walk through the array so all the errors get displayed */
                    echo '<li>' . $value . '</li>'; /* this generates a nice error list */
                }
            echo '</ul></div>';
            
            // if everything is ok, try to upload file
        } else {
            if($fc_array[1] == "event_cover_image"){
                $SQL = "UPDATE events SET event_cover_image='$target_file_final' WHERE event_id='$fc_array[2]'";
                $message = "Je feest foto is succesvol gewijzigd!";
                $title = "mslag foto gewijzigd";
                $noti_title = "O" . $title;
                $Titem_title = "<a href='profile.php?show_user=" . $_SESSION['user_name'] . "'>" . $_SESSION['user_name'] . "</a> heeft de o" . $title;
            }else if($fc_array[1] == "post_img"){
                $SQL = "UPDATE posts SET post_img='$target_file' WHERE post_id='$fc_array[2]'";
                $message = "Je bericht foto is succesvol gewijzigd!";
            }  
            
            $result = $conn->query($SQL);
                    
            if ($result && move_uploaded_file($fc_array[0]["tmp_name"], $target_file_final)) {
                echo '<div class="callout callout-success"><h4>Gelukt :)</h4><p>' . $message . '</p></div>';
                
                if($fc_array[1] == "event_cover_image"){
                    event_timeline_item_create($conn, $Titem_title, 8, $fc_array[2]);
                }
            } else {
                echo '<div class="callout callout-danger"><h4>Mislukt :(</h4><p>Er is iets mis gegaan met het uploaden van je foto<br>' . $conn->error . '</p></div>';
            }
        }
    }
}


//Random Color Generator
function random_color() {
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}

class ColorGenerator
{
    /**
     * Used to set the lower limit of RGB values.
     * The higher this value is the fewer gray tone will be generated 70+ to 100 recommended
     *
     * @var int
     */
    protected static $lowerLimit = 80;

    /**
     * Used to set the higher limit of RGB values.
     * The higher this value is the fewer gray tone will be generated 180+ to 255 recommended
     *
     * @var int
     */
    protected static $upperLimit = 200;

    /**
     * Distance between 2 selected values.
     * Colors like ff0000 amd ff0001 are basically the same when it comes to human eye perception
     * increasing this value will result in more different color but will lower the color pool
     *
     * @var int
     */
    protected static $colorGap = 10;

    /**
     * Colors already generated
     *
     * @var array
     */
    protected static $generated = array();

    /**
     * @return string
     */
    public static function generate()
    {
        $failCount = 0;
        do {
        $redVector = rand(0, 1);
        $greenVector = rand(0, 1);
        $blueVector = rand(!($redVector || $greenVector), (int)(($redVector xor $greenVector) || !($redVector || $greenVector)));
        $quantiles = floor((self::$upperLimit - self::$lowerLimit) / self::$colorGap);

        $red = $redVector * (rand(0, $quantiles) * self::$colorGap + self::$lowerLimit);
        $green = $greenVector * (rand(0, $quantiles) * self::$colorGap + self::$lowerLimit);
        $blue = $blueVector * (rand(0, $quantiles) * self::$colorGap + self::$lowerLimit);
        $failCount++;
        } while (isset(self::$generated["$red,$green,$blue"]) && $failCount < 1000);

        return self::rgb($red, $green, $blue);
    }

    /**
     * @param int $red
     * @param int $green
     * @param int $blue
     * @return string
     */
    protected static function rgb($red, $green, $blue)
    {
        $red = base_convert($red, 10, 16);
        $red = str_pad($red, 2, '0', STR_PAD_LEFT);

        $green = base_convert($green, 10, 16);
        $green = str_pad($green, 2, '0', STR_PAD_LEFT);

        $blue = base_convert($blue, 10, 16);
        $blue = str_pad($blue, 2, '0', STR_PAD_LEFT);

        return '#' . $red . $green . $blue;
    }
}
?>