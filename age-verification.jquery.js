window.onload = function(){	

	try{
	
		var _data = {};
		
		/* if(document.cookie.replace(/(?:(?:^|.*;\s*)verify\s*\=\s*([^;]*).*$)|^.*$/,"$1")!=="true"){ */
			
			document.createElement("body");
			
			/* var script = document.createElement("script");
			
			script.setAttribute("type","text/javascript");
			
			script.setAttribute("src","http://webandweb.in/shopify_testing/age-verification.cross-origin.js");
			 */
			var returnStr = document.getElementById("age-verification-script").src.split('.js?');
			
			var sid = returnStr[1];
			
			$.ajax({
			
				type: 'GET',
				
				async: false,
			
				url: 'https://github.com/openthinkgroup/shopify_testing/age-verification.ajax.php?sid='+sid,
				
				success: function(response){
					
					_data = JSON.parse(response);
					/* console.log(_data); */
					var AVoverlay = document.createElement("iframe");
					
					AVoverlay.setAttribute("id","AVoverlay");
					
					AVoverlay.setAttribute("src","https://github.com/openthinkgroup/shopify_testing/age-verification.html");
					
					AVoverlay.style.width = "100%";
					
					
					AVoverlay.style.height = "100%";
					
					AVoverlay.style.setProperty('position', 'fixed');
					
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
					
					AVcontentBox.style.setProperty('color', '#fff');
					
					AVcontentBox.style.setProperty('font-size', '28px');
					
					AVcontentBox.style.setProperty('font-family', 'Helvetica');
					
					AVcontentBox.style.paddingTop = "20px";
					
					AVcontentBox.style.lineHeight = "30px";
					
					AVcontentBox.innerHTML = "<h3>"+_data.heading+"</h3>"+_data.message_text;
					
					document.body.appendChild(AVcontentBox);
					
				   
					var avLink = document.createElement("input");
					
					avLink.setAttribute("id","avLink");
					
					avLink.setAttribute("type","button");
					
					avLink.setAttribute("onclick","window.location='http://"+_data.store_name+"';");

					avLink.style.position = "fixed";
					
					avLink.style.cursor = "pointer";
					
					avLink.style.left = "50%";
					
					avLink.style.marginLeft = "-130px";
					
					avLink.style.top = "300px";
					
					avLink.style.setProperty('height', '40px');
					
					avLink.style.setProperty('width', '120px');
					
					avLink.style.setProperty('color', '#fff');
					
					avLink.style.setProperty('font-size', '16px');
					
					avLink.style.setProperty('padding','0');
					
					avLink.style.setProperty('font-family','Helvetica');
					
					avLink.style.setProperty('font-weight','lighter');
					
					avLink.style.setProperty("background-color", _data.Button1_color );
					
					avLink.style.setProperty('border', '0');

					avLink.style.setProperty('border-radius', '0');

					avLink.style.setProperty('outline', 'none');

					avLink.style.setProperty('box-shadow', 'none');

					avLink.setAttribute("value", _data.Button1_text);

					document.getElementById('AVcontentBox').appendChild(avLink);
					
					
					
					var AVenterLink = document.createElement("input");

					AVenterLink.setAttribute("id","AVenterLink");

					AVenterLink.setAttribute("type","button");

					AVenterLink.setAttribute("onclick","setMyCookie();");

					AVenterLink.style.position = "fixed";

					AVenterLink.style.cursor = "pointer";

					AVenterLink.style.left = "50%";

					AVenterLink.style.marginLeft = "10px";

					AVenterLink.style.top = "300px";

					AVenterLink.style.setProperty('height', '40px');

					AVenterLink.style.setProperty('width', '120px');

					AVenterLink.style.setProperty('color', '#fff');

					AVenterLink.style.setProperty('font-size', '16px');

					AVenterLink.style.setProperty('padding','0');

					AVenterLink.style.setProperty('font-family','Helvetica');

					AVenterLink.style.setProperty('font-weight','lighter');

					AVenterLink.style.setProperty('background-color', _data.Button2_color);

					AVenterLink.style.setProperty('border', '0');

					AVenterLink.style.setProperty('border-radius', '0');

					AVenterLink.style.setProperty('outline', 'none');

					AVenterLink.style.setProperty('box-shadow', 'none');

					AVenterLink.setAttribute("value", _data.Button2_text);

					document.getElementById('AVcontentBox').appendChild(AVenterLink);

				}
				
			});
			
			
		/* } */
	} catch(ex) {
		
		console.log(ex);
		
	}
}

function setMyCookie(){

	var now = new Date();
	
	var time = now.getTime();
	
	var expireTime = time + 1000*3600;
	
	now.setTime(expireTime);
	
	var tempExp = 'Wed, 31 Oct 2012 08:50:17 GMT';
	
	document.cookie = 'verify=true;expires='+now.toGMTString()+';path=/';
	
	document.getElementById("AVoverlay").style.setProperty('display', 'none', 'important');
	
	document.getElementById("AVcontentBox").style.display="none";
	
	document.getElementById("avLink").style.display="none";
	
	document.getElementById("AVenterLink").style.display="none";
	
}
