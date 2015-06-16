<?php 

$db = new Mysqli("localhost", "webnweb_shopify", "shopify!@#", "webnweb_shopify_app");

if(isset($_REQUEST['sid'])){

	$sid = $_REQUEST['sid'];
	
	if($db->connect_errno){

		die('Connect Error: ' . $db->connect_errno);
		
	}

	$sql = "select heading, store_name, message_text, Button1_text, Button1_color, Button2_text, Button2_color from tbl_usersettings where access_token = '$sid'";
	
	$qry = mysqli_query($db, $sql);
	
	if ($qry) {
		
		$response = mysqli_fetch_assoc($qry);
		
		echo $data = json_encode($response);
		
		/* file_put_contents("age-verification.data.json", $data); */
		
	}
	die;
}
?>