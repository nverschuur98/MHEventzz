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

function count_notifications($conn, $id){
    $SQL = "SELECT COUNT(*) AS amount FROM notifications WHERE noti_user='$id'";
    
    $result = $conn->query($SQL);
    $amount = mysqli_fetch_assoc($result);
    
    return $amount['amount'];
}

function noti_cat_to_class($conn, $cat){
    $SQL = "SELECT cat_icon_class FROM categories WHERE cat_id='$cat'";
    
    $result = $conn->query($SQL);
    $class = mysqli_fetch_assoc($result);
    
    return $class['cat_icon_class'];
}
?>