<?php
	session_start();
	require 'dbconfig/config.php';
	
?>

<!DOCTYPE html>
<html class="nojs html css_verticalspacer" lang="en-US">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2018.1.0.386"/>
  
  <script type="text/javascript">
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.musepolyfill.bgsize.js", "jquery.watch.js", "require.js", "index.css"], "outOfDate":[]};
</script>
  
  <title>Login_Page</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=4275521114"/>
  <link rel="stylesheet" type="text/css" href="css/master_a_master.css?crc=328925755"/>
  <link rel="stylesheet" type="text/css" href="css/index.css?crc=4282809176" id="pagesheet"/>
  <!-- JS includes -->
  <script src="https://use.typekit.net/ik/rfOO7WFvt6jZK8eL3i772nxq6m6idtKljBX-nY8aJh9fe1CJvzOTgyJTwQbDwQSowDyLFQMtF2q3w26tw2J3wQg8ZRIhZcBcZejawQsKFDj3jQ9-4KG0ShNCicmqOcFzdPUDdhUhZAb0jhNlOYiaikoDdhUhZAb0jhNlJ6yRjW4CdABkpfGHf40UMyMMeMS6M9GIQWmDZZMg7Vhmh69.js" type="text/javascript"></script>
  <!-- Other scripts -->
  <script type="text/javascript">
   try {Typekit.load();} catch(e) {}
</script>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="browser_width colelem" id="u199-bw">
     <div class="museBGSize" id="u199"><!-- group -->
      <div class="clearfix" id="u199_align_to_page">
       <div class="clearfix grpelem" id="u200"><!-- column -->
        <div class="clearfix colelem" id="u201-4"><!-- content -->
         <p>Solved</p>
        </div>
        <div class="clearfix colelem" id="u248-4"><!-- content -->
         <p>Login</p>
        </div>
        <div class="colelem" id="u232"><!-- custom html -->
         <!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="./stylesheet.css">
<style>
	#main-wrapper{
	width:500px;
	margin: 0 auto;
	background:white;
	padding:5px;
	border-radius: 10px;
	border:2px solid #2c3e50;
}

.myform{
	width:450px;
	margin:0 auto;

}
.inputvalues{
	width:430px;
	margin:0 auto;
	padding:5px;
}
#Login_btn{
	margin-top: 10px;
	background-color:#27ae60;
	padding:5px;
	color: white;
	width:100%;
	text-align: center;
	font-size: 18px;
	font-weight: bold;
}
#register_btn{
	margin-bottom:10px;
	margin-top: 10px;
	background-color:#3498db;
	padding:5px;
	color: white;
	width:100%;
	text-align: center;
	font-size: 18px;
	font-weight: bold;
}
#Signup_btn{
	margin-top: 10px;
	background-color:#3498db;
	padding:5px;
	color: white;
	width:100%;
	text-align: center;
	font-size: 18px;
	font-weight: bold;
}
#logout_btn{
	margin-top: 10px;
	background-color:#3498db;
	padding:5px;
	color: white;
	width:30%;
	text-align: center;
	font-size: 18px;
	font-weight: bold;
}
	</style>
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
		<center>
			
			
		<form class="myform" action="index.php" method="post">
			<br>
			<input name = "username"type="text" class="inputvalues" placeholder="Username"><br>
			<br>
			<input name="password" type="password" class="inputvalues" placeholder="Password"><br>
			<input name="login" type="submit" id="Login_btn" value="Login"><br>
			<a href="register.php"><input type="button" id="register_btn" value="Register"><br></a>
		</form>
		<?php
			if(isset($_POST['login'])){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$query="select * from newuser WHERE username ='$username' AND password = '$password'";
				$query_run = mysqli_query($con, $query);
				if(mysqli_num_rows($query_run)>0){
					$row = mysqli_fetch_assoc($query_run);
					//valid
					$_SESSION['username']=$row['username'];
					$_SESSION['imglink'] = $row['imglink'];
					header('location:home.php');

				}else{
					echo'<script type="text/javascript">alert("invalid user, please sign up first!")</script>';
				}
			}
		?>
		</center>
	</div>
</body>
</html>

        </div>
       </div>
      </div>
     </div>
    </div>
    <div class="verticalspacer" data-offset-top="537" data-content-above-spacer="699" data-content-below-spacer="0"></div>
   </div>
  </div>
  <!-- Other scripts -->
  <script type="text/javascript">
   // Decide whether to suppress missing file error or not based on preference setting
var suppressMissingFileError = true
</script>
  <script type="text/javascript">
   window.Muse.assets.check=function(c){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},d=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},f=function(f){for(var g=document.getElementsByTagName("link"),j=0;j<g.length;j++)if("text/css"==g[j].type){var l=(g[j].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!l||!l[1]||!l[2])break;b[l[1]]=l[2]}g=document.createElement("div");g.className="version";g.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(g);for(j=0;j<Muse.assets.required.length;){var l=Muse.assets.required[j],k=l.match(/([\w\-\.]+)\.(\w+)$/),i=k&&k[1]?
k[1]:null,k=k&&k[2]?k[2]:null;switch(k.toLowerCase()){case "css":i=i.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");g.className+=" "+i;i=a(d(g,"color"));k=a(d(g,"backgroundColor"));i!=0||k!=0?(Muse.assets.required.splice(j,1),"undefined"!=typeof b[l]&&(i!=b[l]>>>24||k!=(b[l]&16777215))&&Muse.assets.outOfDate.push(l)):j++;g.className="version";break;case "js":j++;break;default:throw Error("Unsupported file type: "+k);}}c?c().jquery!="1.8.3"&&Muse.assets.outOfDate.push("jquery-1.8.3.min.js"):Muse.assets.required.push("jquery-1.8.3.min.js");
g.parentNode.removeChild(g);if(Muse.assets.outOfDate.length||Muse.assets.required.length)g="Some files on the server may be missing or incorrect. Clear browser cache and try again. If the problem persists please contact website author.",f&&Muse.assets.outOfDate.length&&(g+="\nOut of date: "+Muse.assets.outOfDate.join(",")),f&&Muse.assets.required.length&&(g+="\nMissing: "+Muse.assets.required.join(",")),suppressMissingFileError?(g+="\nUse SuppressMissingFileError key in AppPrefs.xml to show missing file error pop up.",console.log(g)):alert(g)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?
setTimeout(function(){f(!0)},5E3):f()}};
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.musepolyfill.bgsize","jquery.watch"],function(c){var $ = c;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.resizeHeight('.browser_width');/* resize height */
Muse.Utils.requestAnimationFrame(function() { $('body').addClass('initialized'); });/* mark body as initialized */
Muse.Utils.makeButtonsVisibleAfterSettingMinWidth();/* body */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=7928878" type="text/javascript" async data-main="scripts/museconfig.js?crc=310584261" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
   </body>
</html>
