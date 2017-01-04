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
    $SQL = "INSERT INTO notifications (noti_user, noti_cat, noti_title, noti_link) VALUES ('$user','$cat', '$title', '$link')";
    $result = $conn->query($SQL);
}

//Create a timeline item
function timeline_item_create($conn, $title, $cat, $user){
    
    $title = $conn->real_escape_string($title);
    
    $SQL = "INSERT INTO timeline_items (item_title, item_cat, item_date, item_user) VALUES ('$title','$cat', NOW(), '$user')";
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