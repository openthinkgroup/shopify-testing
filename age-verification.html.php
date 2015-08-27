<?php 
/*** Age Verifier App - OTG  ***/
$host        = "host=ec2-54-243-132-114.compute-1.amazonaws.com";
$port        = "port=5432";
$dbname      = "dbname=dfjdld5mdvpnbt";
$credentials = "user=scvoxznmcyyyvn password=G9rQkI4BZs82-U2BOyAVgJ2h-Z";
$db = pg_connect("$host $port $dbname $credentials" );
$background_image='images/av_logo.jpg';
if(isset($_REQUEST['sid'])){
	$sid = $_REQUEST['sid'];
	if(!$db){
		exit("Error:: Unable to connect database!");
	}
	$sql = "select heading, store_name, message_text, Button1_text, Button1_color, Button2_text, Button2_color from tbl_usersettings where access_token = '$sid'";
	$qry = pg_query($db, $sql);
	if($qry){
		$response = pg_fetch_assoc($qry);
		$background_image = !empty($response['background_image']) ? $response['background_image'] : $background_image;
	}
}
?>

<html>
	<head>
		<title>Age-Verification HTML</title>
		<link rel="stylesheet" href="age-verification.css" type="text/css">
	</head>
	<body class="vaping2">
		<div id="AVpattern">
			<div id="AVcontentBG" style="background: url('<?php echo $background_image; ?>');"></div>
			<a href="http://age-verify.com" target="_blank"><img src="images/av_logo.jpg" id="AVlink"></a>
		</div>
	</body>
</html>
