<?php
session_start();
$currUser = $_SESSION['username'];

if(!isset($_GET["question_id"]) ) {
	header('Location: home.php');
}
$db = mysqli_connect("localhost", "root", "", "samplelogindb");
if (isset($_GET['add_like']) && isset($_GET['minus_like'])){
	$quesID = $_GET['question_id'];
	$ansID = ($_GET['add_like'] != "-1")? $_GET['add_like'] : $_GET['minus_like'];
	if ($_GET['add_like'] != "-1") {
		$sql_update_like = "INSERT INTO `likes` (`question_id`, `answer_id`, `username`) VALUES ('$quesID', '$ansID', '$currUser')";
	} else {
		$sql_update_like = "DELETE FROM `likes` WHERE `answer_id` = '$ansID' AND `question_id` = '$quesID' AND `username` = '$currUser'";
	}
	mysqli_query($db, $sql_update_like);
	header("location: question_threads.php?question_id=".$_GET['question_id']);
	/*$sql_update_num = "UPDATE member_profile 
    SET points = points + 1
    WHERE user_id = ";*/

}


$sql = "SELECT * FROM `questiontb` WHERE `id` =".$_GET["question_id"];
$sql_ans = "SELECT * FROM `answertb` WHERE `questionid` =".$_GET["question_id"]." ORDER BY `likenum` DESC";
$sql_like = "SELECT * FROM `likes` WHERE `question_id` = ".$_GET["question_id"]." AND `username` = '".$currUser."'";
$result = mysqli_query($db, $sql);
$result_ans = mysqli_query($db, $sql_ans);
$result_like = mysqli_query($db, $sql_like);
$row = mysqli_fetch_array($result);


	$storeArray = Array();
	while ($row_like = mysqli_fetch_array($result_like)) {
	    $storeArray[] =  $row_like['answer_id']; 
	}
	$sql_img = "SELECT imglink from questiontb WHERE id = '".$_GET["question_id"]."'";
	$result_image = mysqli_query($db,$sql_img);
	$img = mysqli_fetch_array($result_image);
?>

<html>
<head>
<title>Ask&Find</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script src="jquery-3.3.1.js"></script>

<script>
function like(id) {
	liked = document.getElementById("liked" + id);
	obj = document.getElementById("td" + id);
	like_act = $("#like_action");
	if (liked.innerText != "liked") {
		document.getElementById("add").value=id;
	} else {
		document.getElementById("minus").value=id;
	}
	like_action.submit();
		/*num = parseInt(obj.innerText) + 1;
		obj.innerText = num;
		liked.innerText = "liked";
		obj.classList.add("active");
	} else {
		num = parseInt(obj.innerText) - 1;
		obj.innerText = num;
		liked.innerText = "";
		obj.classList.remove("active");*/
}
</script>

</head>

<body><font face="Arial">
	 
	<a href="home.php"><img src="back_btn.jpg" class="back_btn"></a>
	<div class="container">
	<h1 align="center">Ask & Find</h1>

	<form action="answer.php"><input type="hidden" name="question_id" value="<?php echo $_GET['question_id'];?>" />
		<input type="submit" value="Answer it!" /></form>
	<h2>Question: <?php echo $row['question'];?></h2>
	<p><?php echo $row['description'];?></p>

	<?php 
	if($img['imglink']!=''){
	echo '<img src="uploads/'.$img['imglink'].'" width="80%" />';}

	?>
	<h3>Date Posted</h3> <?php echo $row['date']?><br>
 <h3>Posted By</h3> <?php echo $row['username']?><h3>
 <?php
 if ($row['pagenumber']!='')
  echo "<h3>Page Number</h3>".$row['pagenumber']."<br>";
 if ($row['questionnumber']!='')
  echo "<h3>Question Number</h3>".$row['questionnumber']."<br>";
 if ($row['textbookISBN']!='')
  echo "<h3>ISBN</h3>".$row['textbookISBN']."<br>";
 ?>
	</div>

	<?php
	$cnt = 1;
	while ($ans_row = mysqli_fetch_array($result_ans)) {
		$sql_like_num = "SELECT COUNT( * ) as 'total' FROM likes WHERE question_id = '".$_GET["question_id"]."' AND answer_id = '".$ans_row['id']."' ";
		$like_num = mysqli_fetch_assoc(mysqli_query($db, $sql_like_num));

		echo "
	<div class='t-container'>
		<table class='thread'>
			<tr>
				<td><font size='5'>";
		if ($cnt == 1) echo "Best Answer";
		else echo "Answer #".$cnt;
		echo ": by <a href='user_profile.php?username=".$ans_row['username']."'>".$ans_row['username']."</a></font></td>";
		echo "<td align='right' class='liked' id='liked".$ans_row['id']."'>";
		if (in_array($ans_row['id'], $storeArray)) echo "liked";
		echo "</td>
				<td class='like_btn_container' align='right'><img src='like_btn.png' class='like_btn' onclick='like(this.id)' id='".$ans_row['id']."'></td>
				<td class='likes ";
		if (in_array($ans_row['id'], $storeArray)) echo "active";
		echo "' id='td".$ans_row['id']."'> ".$like_num['total']."</td>
			</tr>";
			echo "<tr>
				<td colspan='4'>";
			echo "<font size='2' style='color:rgb(50, 50, 50)'> Posted by ".$ans_row['username']." on ".$ans_row['date']."</font><br><br>";
			echo $ans_row['answer'];

			if ($ans_row['imglink'] != '')
				echo "<img class='thread_pic' src='uploads/".$ans_row['imglink']."' width='50%'/>";
			

			echo "</td>
			</tr>
		</table>
	</div>";


		$cnt++;

		mysqli_query($db ,"UPDATE `answertb` SET `likenum`= '".$like_num['total']."' WHERE `questionid` = '".$ans_row['questionid']."' AND `id` = '".$ans_row['id']."'");

	}
	?>



<!--	<div class="t-container">
		<table class="thread">
			<tr>
				<td><font size="5">Best Answer: </font></td>
				<td align="right" class="liked" id="liked1">liked</td>
				<td class="like_btn_container" align="right"><img src="like_btn.png" class="like_btn" onclick="like(this.id)" id="1"></td>
				<td class="likes active" id="td1"> 23</td>
			</tr>
			<tr>
				<td colspan="4">
					This is the inside
					<img class="thread_pic" src="test.jpg" />
				</td>
			</tr>
		</table>
	</div>

	<div class="t-container">
		<table class="thread">
			<tr>
				<td><font size="5">Answer #2: </font></td>
				<td align="right" class="liked" id="liked2"></td>
				<td class="like_btn_container" align="right"><img src="like_btn.png" class="like_btn" onclick="like(this.id)" id="2"></td>
				<td class="likes" id="td2"> 20</td>
			</tr>
			<tr>
				<td colspan="4">
					This is the inside
				</td>
			</tr>
		</table>
	</div>

	<div class="t-container">
		<table class="thread">
			<tr>
				<td><font size="5">Answer #3: </font></td>
				<td align="right" class="liked" id="liked3"></td>
				<td class="like_btn_container" align="right"><img src="like_btn.png" class="like_btn" onclick="like(this.id)" id="3"></td>
				<td class="likes" id="td3"> 5</td>
			</tr>
			<tr>
				<td colspan="4">
					This is the inside
					<img class="thread_pic" src="test.jpg" />
				</td>
			</tr>
		</table>
	</div>-->
</font>



<form action="question_threads.php" method="get" name="like_action" id="like_action">
	<input type="hidden" name="question_id" value="<?php echo $_GET["question_id"]; ?>" />
	<input type="hidden" name="add_like" id="add" value="-1" />
	<input type="hidden" name="minus_like" id="minus" value="-1" />
</form>

</body>

</html>