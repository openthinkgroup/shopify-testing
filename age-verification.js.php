<?php 
/*** Age Verifier App - OTG  ***/
$host        = "host=ec2-54-243-132-114.compute-1.amazonaws.com";
$port        = "port=5432";
$dbname      = "dbname=dfjdld5mdvpnbt";
$credentials = "user=scvoxznmcyyyvn password=G9rQkI4BZs82-U2BOyAVgJ2h-Z";
$db = pg_connect("$host $port $dbname $credentials" );

if(isset($_REQUEST['sid'])){
	$sid = $_REQUEST['sid'];
	if(!$db){
		exit("Error:: Unable to connect database!");
	}
	$sql = "select heading, store_name, message_text, Button1_text, Button1_color, Button2_text, Button2_color from tbl_usersettings where access_token = '$sid'";
	$qry = pg_query($db, $sql);
	if($qry){
		$response = pg_fetch_assoc($qry);
		$heading = $response['heading'];
		$store_name = $response['store_name'];
		$message_text = $response['message_text'];
		$button1_text = $response['button1_text'];
		$button1_color = $response['button1_color'];
		$button2_text = $response['button2_text'];
		$button2_color = $response['button2_color'];
		$cookie_lifetime = $response['cookie_lifetime'];
		echo 'jQuery(function() {
			try{
				 if(document.cookie.replace(/(?:(?:^|.*;\s*)verify\s*\=\s*([^;]*).*$)|^.*$/,"$1")!=="true"){ 
					var AVoverlay = document.createElement("iframe");
					AVoverlay.setAttribute("id","AVoverlay");
					AVoverlay.setAttribute("src","https://shopify-testing-app.herokuapp.com/age-verification.html.php?sid='.$sid.'");
					AVoverlay.style.width = "100%";
					AVoverlay.style.height = "100%";
					AVoverlay.style.setProperty("position", "fixed");
					AVoverlay.style.left = "0";
					AVoverlay.style.top = "0";
					AVoverlay.style.zIndex = "100000";
					AVoverlay.style.border = "0";
					document.body.appendChild(AVoverlay);
					
					var AVcontentBox = document.createElement("div");
					AVcontentBox.setAttribute("id","AVcontentBox");
					AVcontentBox.style.position = "fixed";
					AVcontentBox.style.left = "50%";
					AVcontentBox.style.top = "100px";
					AVcontentBox.style.marginLeft = "-150px";
					AVcontentBox.style.height = "250px";
					AVcontentBox.style.width = "300px";
					AVcontentBox.style.zIndex = "100001"; 
					AVcontentBox.style.textAlign = "center";
					AVcontentBox.style.setProperty("color", "#fff");
					AVcontentBox.style.setProperty("font-size", "28px");
					AVcontentBox.style.setProperty("font-family", "Helvetica");
					AVcontentBox.style.paddingTop = "20px";
					AVcontentBox.style.lineHeight = "30px";
					AVcontentBox.innerHTML = "<h3>'.$heading.'</h3><p>'.$message_text.'</p>";
					document.body.appendChild(AVcontentBox);
					
					var avLink = document.createElement("input");
					avLink.setAttribute("id","avLink");
					avLink.setAttribute("type","button");
					avLink.setAttribute("onclick","setMyCookie();");
					//avLink.setAttribute("onclick","window.location=http://'.$store_name.';");
					avLink.style.position = "fixed";
					avLink.style.cursor = "pointer";
					avLink.style.left = "50%";
					avLink.style.marginLeft = "-130px";
					avLink.style.top = "300px";
					avLink.style.setProperty("height", "40px");
					avLink.style.setProperty("width", "120px");
					avLink.style.setProperty("color", "#fff");
					avLink.style.setProperty("font-size", "16px");
					avLink.style.setProperty("padding","0");
					avLink.style.setProperty("font-family","Helvetica");
					avLink.style.setProperty("font-weight","lighter");
					avLink.style.setProperty("background-color", "'.$button1_color.'");
					avLink.style.setProperty("border", "0");
					avLink.style.setProperty("border-radius", "0");
					avLink.style.setProperty("outline", "none");
					avLink.style.setProperty("box-shadow", "none");
					avLink.setAttribute("value", "'.$button1_text.'");
					document.getElementById("AVcontentBox").appendChild(avLink);
					
					var AVenterLink = document.createElement("input");
					AVenterLink.setAttribute("id","AVenterLink");
					AVenterLink.setAttribute("type","button");
					AVenterLink.setAttribute("onclick","window.top.location.href=http://google.com/");
				       
					AVenterLink.style.position = "fixed";
					AVenterLink.style.cursor = "pointer";
					AVenterLink.style.left = "50%";
					AVenterLink.style.marginLeft = "10px";
					AVenterLink.style.top = "300px";
					AVenterLink.style.setProperty("height", "40px");
					AVenterLink.style.setProperty("width", "120px");
					AVenterLink.style.setProperty("color", "#fff");
					AVenterLink.style.setProperty("font-size", "16px");
					AVenterLink.style.setProperty("padding","0");
					AVenterLink.style.setProperty("font-family","Helvetica");
					AVenterLink.style.setProperty("font-weight","lighter");
					AVenterLink.style.setProperty("background-color", "'.$button2_color.'");
					AVenterLink.style.setProperty("border", "0");
					AVenterLink.style.setProperty("border-radius", "0");
					AVenterLink.style.setProperty("outline", "none");
					AVenterLink.style.setProperty("box-shadow", "none");
					AVenterLink.setAttribute("value", "'.$button2_text.'");
					document.getElementById("AVcontentBox").appendChild(AVenterLink);
				 } 
			} catch(ex) {					
				console.log(ex);					
			}
		});
		function setMyCookie(){
			var now = new Date();				
			var time = now.getTime();				
			var expireTime = time + 1000*3600;				
			now.setTime(expireTime);
			var tempExp = "Wed, 31 Oct 2012 08:50:17 GMT";
			document.cookie = "verify=true;expires='.$cookie_lifetime.';path=/";				
			document.getElementById("AVoverlay").style.setProperty("display", "none", "important");				
			document.getElementById("AVcontentBox").style.display="none";				
			document.getElementById("avLink").style.display="none";				
			document.getElementById("AVenterLink").style.display="none";				
		}';		
	}
	die;
}
?>
