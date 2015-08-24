<html>
<head>

<title> Age Verification script </title>
<link href="admin.css" type="text/css" rel="stylesheet"/>


</head>
<body>
<div class="container">
<div class="hero-unit">
<h1>Age Verification Script</h1>
<hr>
</div>
<div class="row">
<h3>Please Fill the form Fields</h3>
<form action="#" method="post" class="age_form">
<table>
<tr>
<td><label for="Heading">Heading title</label></td>
<td><input type="text" name="Heading_text" class="Heading_text" required="required"></td>
</tr>
<tr>
<td><label for="message">message</label></td>
<td><textarea name="message_text" class="message_text" required="required" ></textarea></td>
</tr>
<tr>
<td><label for="Button1">Button 1 Text</label></td>
<td><input type="text" name="Button1_text" class="Button1_text" required="required"></td>
</tr>
<tr>
<td><label for="Button1_color">Button 1 Background Color</label></td>
<td><input type="text" name="Button1_color" class="Button1_color" required="required"></td>
</tr>
<tr>
<td><label for="Button2">Button 1 Text</label></td>
<td><input type="text" name="Button2_text" class="Button2_text" required="required"></td>
</tr>
<tr>
<td><label for="Button2_color">Button 2 Background Color</label></td>
<td><input type="text" name="Button2_color" class="Button2_color" required="required"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" class="btn" name="btn"></td>
</table>
</form>
</div>

<?php 

session_start(); 

$shop=$_REQUEST['shop'];

$_SESSION['shop']=$shop;

/* $shop1=$_SESSION['shop']; 
$dsn = "pgsql:"
    . "host=ec2-54-243-132-114.compute-1.amazonaws.com;"
    . "dbname=dfjdld5mdvpnbt;"
    . "user=scvoxznmcyyyvn;"
    . "port=5432;"
    . "sslmode=require;"
    . "password=G9rQkI4BZs82-U2BOyAVgJ2h-Z";

$db = new PDO($dsn);*/
//$db = new Mysqli("ec2-54-243-132-114.compute-1.amazonaws.com", "scvoxznmcyyyvn", "G9rQkI4BZs82-U2BOyAVgJ2h-Z", "dfjdld5mdvpnbt");
$host        = "host=ec2-54-243-132-114.compute-1.amazonaws.com";
   $port        = "port=5432";
   $dbname      = "dbname=dfjdld5mdvpnbt";
   $credentials = "user=scvoxznmcyyyvn password=G9rQkI4BZs82-U2BOyAVgJ2h-Z";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
if (isset($_POST['btn'])) {

	$shop1='age-verification.myshopify.com';
	
	$Heading_text=$_POST['Heading_text'];
	
	$message_text=$_POST['message_text'];
	
	$Button1_text=$_POST['Button1_text'];
	
	$Button1_color=$_POST['Button1_color'];
	
	$Button2_text=$_POST['Button2_text'];
	
	$Button2_color=$_POST['Button2_color'];
	
	$sid = (!empty($_REQUEST['sid']) ? $_REQUEST['sid'] : 'ae725c0088a30b96494423152c8caea7');
	
	if($db->connect_errno){

		die('Connect Error: ' . $db->connect_errno);
		
	}

	/*$sql= "update tbl_usersettings 
		 SET heading = '$Heading_text', 
		 message_text = '$message_text',Button1_text='$Button1_text',Button1_color='$Button1_color',
		 Button2_text='$Button2_text',Button2_color='$Button2_color' where access_token = '$sid'";*/
	$sql =<<<EOF
      update tbl_usersettings 
		 SET heading = '$Heading_text', 
		 message_text = '$message_text',Button1_text='$Button1_text',Button1_color='$Button1_color',
		 Button2_text='$Button2_text',Button2_color='$Button2_color' where access_token = '$sid';
EOF;
  
	echo '<span style="background: none repeat scroll 0% 0% rgb(255, 133, 102); padding: 10px 20px; line-height: 35px; float: left; clear: both; border-radius: 4px; font-family: arial; font-style: italic;">&lt;script id="age-verification-script" type="text/javascript" src="https://shopify-testing-app.herokuapp.com/age-verification.jquery.js?'.$sid.'"&gt;&lt;/script&gt;</span>';

	echo '<h4 class="copy_note">Please copy and paste above code in head section of your webpage.</h4>';
  /*	pg_execute($db, "my_query", array("Joe's Widgets"));
	if (mysqli_query($db, $sql)) {

		echo "Record updated successfully";
		
	} else {

		echo "Error updating record: " . mysqli_error($conn);
		
	} */
	 $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
      exit;
   } else {
      echo "Record updated successfully\n";
   }

}
?>

</div>
</body>
</html>

