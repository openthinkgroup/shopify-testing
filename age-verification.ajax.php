<?php 

$host        = "host=ec2-54-243-132-114.compute-1.amazonaws.com";
   $port        = "port=5432";
   $dbname      = "dbname=dfjdld5mdvpnbt";
   $credentials = "user=scvoxznmcyyyvn password=G9rQkI4BZs82-U2BOyAVgJ2h-Z";
   $db = pg_connect( "$host $port $dbname $credentials"  );
  

if(isset($_REQUEST['sid'])){

	$sid = $_REQUEST['sid'];
	
 if(!$db){
      echo "Error : Unable to open database\n";
   }
$sql =<<<EOF
      select heading, store_name, message_text, Button1_text, Button1_color, Button2_text, Button2_color from tbl_usersettings where access_token = '$sid';
EOF;
	//$sql = "select heading, store_name, message_text, Button1_text, Button1_color, Button2_text, Button2_color from tbl_usersettings where access_token = '$sid'";
	
 $qry = pg_query($db, $sql);
	
	if ($qry) {
		
		$response = pg_fetch_assoc($qry);
		
		echo $data = json_encode($response);
		
		/* file_put_contents("age-verification.data.json", $data); */
		
	}
	die;
}
?>
