<!DOCTYPE html> 
<html class="nojs html css_verticalspacer" lang="en-US"> 
<?php
session_start();
require 'dbconfig/config.php';
if(isset($_POST['urques'])){
$sql = "SELECT * FROM `questiontb` WHERE `username` = '".$_SESSION['username']."'";
}else if (isset($_POST['submit']) && $_POST['search'] != "") {
  if ($_POST['subject'] != "Show All") {
    $sql = "SELECT * FROM `questiontb` WHERE `question` LIKE '%".$_POST['search']."%' AND `subject` = '".$_POST['subject']."'";
  } else {
    $sql = "SELECT * FROM `questiontb` WHERE `question` LIKE '%".$_POST['search']."%'";
  }
} else if (isset($_POST['submit']) && $_POST['subject']!="Show All") {
  $sql = "SELECT * FROM `questiontb` WHERE `subject` = '".$_POST['subject']."'";
} else {
  $sql = "SELECT * FROM `questiontb`";
}
?>

 <head> 

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/> 
  <meta name="generator" content="2018.1.0.386"/> 
   <link rel="stylesheet" type="text/css" href="styles.css" />

  <script type="text/javascript"> 
   // Update the 'nojs'/'js' class on the html node 
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js'); 

// Check that all required assets are uploaded and up-to-date 
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.watch.js", "require.js", "ask.css"], "outOfDate":[]}; 
</script> 
   
  <title>Ask</title> 
  <!-- CSS --> 
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=4275521114"/> 
  <link rel="stylesheet" type="text/css" href="css/master_b_master.css?crc=3887285136"/> 
  <link rel="stylesheet" type="text/css" href="css/ask.css?crc=484584114" id="pagesheet"/> 
    <!--HTML Widget code--> 
   
<style> 
a { 
       transition:all 0.3s ease; 
 -webkit-transition: all 0.3s ease; 
 -moz-transition: all 0.3s ease; 
 -o-transition: all 0.3s ease; 
} 

.clip_frame, .Container, .ContainerGroup, .verticalspacer, #preloader,{ 
transition:none !important; 
-webkit-transition:none !important; 
-moz-transition:none !important; 
-o-transition:none !important; 
} 

.SlideShowContentPanel *{ 
transition:none !important; 
-webkit-transition:none !important; 
-moz-transition:none !important; 
-o-transition:none !important; 
} 

.ContainerGroup, .wp-panel, wp-panel-active{ 
transition:none !important; 
-webkit-transition:none !important; 
-moz-transition:none !important; 
-o-transition:none !important; 
} 

.js div#preloader{ 
transition:none !important; 
-webkit-transition:none !important; 
-moz-transition:none !important; 
-o-transition:none !important; 
} 

</style> 


 </head> 
 <body> 

  <div class="clearfix" id="page"><!-- group --> 
   <div class="clearfix grpelem" id="ppu312-4"><!-- column --> 
    <div class="clearfix colelem" id="pu312-4"><!-- group --> 
     <div class="clearfix grpelem" id="u312-4"><!-- content --> 
      <p>Solved</p> 
     </div> 
     <a class="nonblock nontext clearfix grpelem" id="u325-4" href="home.php"><!-- content --><p>Home</p></a> 
    </div> 
    <div class="colelem" id="u2004"><!-- custom html --> 
     <form action="home.php" method="post"> 
   <input type="submit" value="Go" name="submit" class="form_content go_btn" /> 
   <br /><br /> 

   <h4>search:</h4> 
   <input type="textbox" class="form_content" name="search" /> 
   <hr> 
   <h4>filter:</h4> 
   
   <h5>subject:</h5> 
   <ul> 
    <li><input type="radio" name="subject" value="Show All" checked="checked" /> Show All</li> 
    <li><input type="radio" name="subject" value="General" /> General</li> 
    <li><input type="radio" name="subject" value="Art" /> Art</li> 
    <li><input type="radio" name="subject" value="Biology" /> Biology</li> 
    <li><input type="radio" name="subject" value="Chemistry" /> Chemistry</li> 
    <li><input type="radio" name="subject" value="Computer Science" /> Computer Science</li> 
    <li><input type="radio" name="subject" value="Economics" /> Economics</li> 
    <li><input type="radio" name="subject" value="Electric Circuits" /> Electric Circuits</li> 
    <li><input type="radio" name="subject" value="Film" /> Film</li> 
    <li><input type="radio" name="subject" value="Foreign Language" />Foreign Language</li> 
    <li><input type="radio" name="subject" value="Geography" /> Geography</li>
    <li><input type="radio" name="subject" value="History" /> History</li> 
    <li><input type="radio" name="subject" value="Mathematics" /> Mathematics</li> 
    <li><input type="radio" name="subject" value="Music" /> Music</li> 
    <li><input type="radio" name="subject" value="PE" /> PE</li>
    <li><input type="radio" name="subject" value="Physics" /> Physics</li> 
    <li><input type="radio" name="subject" value="Psychology" /> Psychology</li> 
    <li><input type="radio" name="subject" value="Public Speaking" /> Public Speaking</li> 
    <li><input type="radio" name="subject" value="Social Studies" /> Social Studies</li> 
    <li><input type="radio" name="subject" value="Writing" /> Writing</li> 
    <li><input type="radio" name="subject" value="Misc." /> Misc.</li> 
    </ul> 

   <h5>status:</h5> 
   <ul> 
    <li><input type="checkbox" name="unsolvedOnly" value="true" /> Show unsolved only</li> 
   </ul> 
   <hr> 

    

  </form> 

 
    </div> 
   </div> 
   <div class="clearfix grpelem" id="ppu341-4"><!-- column --> 
    <div class="clearfix colelem" id="pu341-4" style="position: relative; right:200px;"><!-- group --> 
     <a class="nonblock nontext MuseLinkActive clearfix grpelem" id="u341-4" href="ask.php" ><!-- content --><p>Ask</p></a> 
     <form action="home.php" method="post" style="position: relative; left:500px; top:33px; font-family: Palatino; color:gray; font-size: 26px"><input type="submit" name="urques" value="Your Questions"></form>
     <div class="size_fixed grpelem" id="u330"><!-- custom html --> 
       
             
     </div> 
    </div> 
    <div class="rounded-corners clearfix colelem" id="u785"><!-- group --> 
     <a class="nonblock nontext clip_frame grpelem" id="u782" href="home.php"><!-- image --><img class="block" id="u782_img" src="images/close-button.png?crc=3964942661" alt="" width="36" height="36"/></a> 
     <div class="grpelem" id="u807"><!-- custom html --> 
      <!doctype html> 
<html> 
<head> 
<meta charset="utf-8"> 
<title>Untitled Document</title> 
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

<body> 
 <form action="ask.php" method="post" enctype="multipart/form-data">
    
    <h1 style="text-decoration:bold"><?php echo($_SESSION['username']);?> asks:</h1><br>
    <input name="question"type="text" style="border:1px solid black" placeholder="What is your question?" required><br><br>
    Description:<br>
    <textarea name="description" rows="5" cols="40" placeholder="Describe your question in more detail." style="border:1px solid black" required></textarea><br>
    Subject:<br>
    
    <select name="subject">
        <option value="General">General</option>
        <option value="Art">Art</option>
        <option value="Biology">Biology</option>
        <option value="Chemistry">Chemistry</option>
        <option value="Computer Science">Computer Science</option>
      <option value="Economics">Economics</option>
      <option value="Electric Circuits">Electric Circuits</option>
      <option value="Film">Film</option>
      <option value="Foreign Language">Foreign Language</option>
      <option value="Geography">Geography</option>
      <option value="History">History</option>
      <option value="Mathematics">Mathematics</option>
      <option value="Music">Music</option>
      <option value="PE">PE</option>
      <option value="Physics">Physics</option>
      <option value="Psychology">Psychology</option>
      <option value="Public Speaking">Public Speaking</option>
      <option value="Social Studies">Social Studies</option>
      <option value="Writing">Writing</option>
      <option value="Misc.">Misc.</option>
  </select><br><br><br>
    *optional*<br>
    Textbook ISBN:<br>
        <input type="text" name="ISBN" style="border:1px solid black"><br>
     Page Number:<br>
        <input type="text" name="page_number" style="border:1px solid black"><br>
    Question Number:<br>
        <input type="text" name="q_number" style="border:1px solid black"><br><br>
    
    <input type="file" name="image" class="inputvalues"><br>
    <input name="submit_btn" type="submit"  value="ask"><br>
   
   
   
 </form> 
 <?php
if(isset($_POST['submit_btn'])){
  if ($_FILES['image']['name'] != "") {
          $target = "uploads/".date("mdY").time().'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
          $image = date("mdY").time().'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
          move_uploaded_file($_FILES['image']['tmp_name'], $target);
        } else {
          $image = '';
        }
  $question = $_POST['question'];
  $description = $_POST['description'];
  $subject = $_POST['subject'];
  $ISBN = $_POST['ISBN'];
  $username = $_SESSION['username'];
  $date = date("m-d-Y");
  $page_number = $_POST['page_number'];
  $q_number = $_POST['q_number'];
  $query ="insert into questiontb values('','$question','$username','$description','$subject','$ISBN','$date','$page_number','$q_number','$image')";
  $query_run = mysqli_query($con,$query);
  if($query_run){
    echo'<script type="text/javascript">alert("good")</script>';
  }else{
    echo'<script type="text/javascript">alert("error!")</script>';
  }

}
?>
</body> 
</html> 

 
     </div> 
    </div> 
   </div> 
   <a class="nonblock nontext clip_frame grpelem" id="u420" href="user_profile.php"><!-- image --><img class="block" id="u420_img" src="images/pasted%20image%20640x64059x59.jpg?crc=3781660648" alt="" width="59" height="59"/></a> 
   <div class="verticalspacer" data-offset-top="645" data-content-above-spacer="644" data-content-below-spacer="55"></div> 
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
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.watch"],function(c){var $ = c;$(document).ready(function(){try{ 
window.Muse.assets.check($);/* body */ 
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */ 
Muse.Utils.prepHyperlinks(true);/* body */ 
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