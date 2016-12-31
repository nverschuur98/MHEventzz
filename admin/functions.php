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
?>