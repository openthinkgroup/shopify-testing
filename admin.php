<?php 
$host = "host=ec2-54-243-132-114.compute-1.amazonaws.com";
$port = "port=5432";
$dbname = "dbname=dfjdld5mdvpnbt";
$credentials = "user=scvoxznmcyyyvn password=G9rQkI4BZs82-U2BOyAVgJ2h-Z";
$db = pg_connect( "$host $port $dbname $credentials"  );
if(!$db){
	echo "Error : Unable to open database\n";
}
?>

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
			<?php
			$store = $_REQUEST['shop'];			
			$sql_get_shop_temp = "SELECT * FROM tbl_usersettings WHERE store_name = '$store'";
			$res_get_shop_temp = pg_query($db, $sql_get_shop_temp);
			if($res_get_shop_temp && pg_num_rows($res_get_shop_temp) > 0){
				$data = pg_fetch_assoc($res_get_shop_temp); echo "<pre>"; print_r($data); echo "</pre>"; ?>
				<table>
					<tr>
						<td><label for="Heading">Heading title</label></td>
						<td><input type="text" name="Heading_text" class="Heading_text" value="<?php echo $data['Heading_text']; ?>" required="required"></td>
					</tr>
					<tr>
						<td><label for="message">message</label></td>
						<td><textarea name="message_text" class="message_text" value="<?php echo $data['message_text']; ?>" required="required" ></textarea></td>
					</tr>
					<tr>
						<td><label for="Button1">Button 1 Text</label></td>
						<td><input type="text" name="Button1_text" class="Button1_text" value="<?php echo $data['Button1_text']; ?>" required="required"></td>
					</tr>
					<tr>
						<td><label for="Button1_color">Button 1 Background Color</label></td>
						<td><input type="text" name="Button1_color" class="Button1_color" value="<?php echo $data['Button1_color']; ?>" required="required">&nbsp;&nbsp;<code style="color:red">[eg: #000000 or black]</code></td>
					</tr>
					<tr>
						<td><label for="Button2">Button 2 Text</label></td>
						<td><input type="text" name="Button2_text" class="Button2_text" value="<?php echo $data['Button2_text']; ?>" required="required"></td>
					</tr>
					<tr>
						<td><label for="Button2_color">Button 2 Background Color</label></td>
						<td><input type="text" name="Button2_color" class="Button2_color" value="<?php echo $data['Button2_color']; ?>" required="required">&nbsp;&nbsp;<code style="color:red">[eg: #ff0000 or red]</code></td>
					</tr>
					<tr>
						<td><label for="background_image">Main Background Image</label></td>
						<td><input type="file" name="background_image" class="background_image"></td>
					</tr>
					<tr>
						<td><label for="cookie_lifetime">Cookie Lifetime</label></td>
						<td><input type="text" name="cookie_lifetime" class="cookie_lifetime" style="max-width: 100px;" value="<?php echo $data['cookie_lifetime']; ?>"/>&nbsp;days&nbsp;&nbsp;<code style="color:red">[Default will be 365 days]</code></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" class="btn" name="btn" value="Generate Script"></td>
					</tr>
				</table>
			<?php } else { ?>
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
						<td><input type="text" name="Button1_color" class="Button1_color" required="required">&nbsp;&nbsp;<code style="color:red">[eg: #000000 or black]</code></td>
					</tr>
					<tr>
						<td><label for="Button2">Button 2 Text</label></td>
						<td><input type="text" name="Button2_text" class="Button2_text" required="required"></td>
					</tr>
					<tr>
						<td><label for="Button2_color">Button 2 Background Color</label></td>
						<td><input type="text" name="Button2_color" class="Button2_color" required="required">&nbsp;&nbsp;<code style="color:red">[eg: #ff0000 or red]</code></td>
					</tr>
					<tr>
						<td><label for="background_image">Main Background Image</label></td>
						<td><input type="file" name="background_image" class="background_image"></td>
					</tr>
					<tr>
						<td><label for="cookie_lifetime">Cookie Lifetime</label></td>
						<td><input type="text" name="cookie_lifetime" class="cookie_lifetime" style="max-width: 100px;"/>&nbsp;days&nbsp;&nbsp;<code style="color:red">[Default will be 365 days]</code></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" class="btn" name="btn" value="Generate Script"></td>
					</tr>
				</table>
			<?php } ?>
		</form>
	</div>

<?php 

session_start();
$_SESSION['shop'] = $_REQUEST['shop'];
if (isset($_POST['btn'])){
	$Heading_text=$_POST['Heading_text'];	
	$message_text=$_POST['message_text'];	
	$Button1_text=$_POST['Button1_text'];	
	$Button1_color=$_POST['Button1_color'];	
	$Button2_text=$_POST['Button2_text'];	
	$Button2_color=$_POST['Button2_color'];
	$cookie_lifetime = $_POST['cookie_lifetime'];
	if($db->connect_errno){
		die('Connect Error: '.$db->connect_errno);		
	}
	$background_image = '';
	$target_dir = "images/uploads/";
	$target_file = time().'-'.basename($_FILES["background_image"]["name"]);
	if(isset($_FILES["background_image"])) {
		$check = getimagesize($_FILES["background_image"]["tmp_name"]);
		if($check !== false) {
			move_uploaded_file($_FILES["background_image"]["tmp_name"], $target_dir.$target_file);
			$background_image = $target_dir.$target_file;
		}
	}
	
	// check first time installation of app
	$store = $_REQUEST['shop'];
	$sid = md5(time());
	$sql_get_shop = "SELECT * FROM tbl_usersettings WHERE store_name = '$store'";
	$res_get_shop = pg_query($db, $sql_get_shop);
	if($res_get_shop && pg_num_rows($res_get_shop) > 0){ // store settings already exists (update them)
		$response = pg_fetch_assoc($res_get_shop);
		$sid = $response['access_token'];
		$sql = "UPDATE tbl_usersettings SET heading = '$Heading_text', message_text = '$message_text',Button1_text='$Button1_text',button1_color='$Button1_color', Button2_text='$Button2_text',Button2_color='$Button2_color', background_image = '$background_image', cookie_lifetime = '$cookie_lifetime' WHERE access_token = '$sid'";
	} else { // create new store settings
		$sql = "INSERT INTO tbl_usersettings (heading, access_token, message_text, button1_text, button1_color, button2_text, button2_color, background_image, cookie_lifetime) values ('$Heading_text', '$sid', '$message_text', '$Button1_text', '$Button1_color', '$Button2_text', '$Button2_color', '$background_image', '$cookie_lifetime')";
	}
  
	$ret = pg_query($db, $sql);
	if(!$ret){
		echo pg_last_error($db);
		exit;
	} else {
		echo '<span style="background: none repeat scroll 0% 0% rgb(255, 133, 102); padding: 10px 20px; line-height: 35px; float: left; clear: both; border-radius: 4px; font-family: arial; font-style: italic;">&lt;script id="age-verification-script" type="text/javascript" src="https://shopify-testing-app.herokuapp.com/age-verification.js.php?sid='.$sid.'"&gt;&lt;/script&gt;</span>';

		echo '<h4 class="copy_note">Please copy and paste above code in head section of your webpage.</h4>';
	}
}
?>

</div>
</body>
</html>

