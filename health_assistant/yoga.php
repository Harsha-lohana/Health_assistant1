<?php
	include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		.link{
			display: inline-block;
			/*background-color: black;*/
			/*padding-left: 550px;*/
			margin:10;
		}
		.link a{
			text-align: center;

			align-content: center;
			line-height: 70px;
			text-decoration: none;
			color: white;
			padding-right: 10px;
			border-bottom: 1px solid black;
			margin-left: 300px;
			background-color: black;
			border-radius:40px;
			padding-left: 15px;
			border-right: 1px solid rgba(0,0,0,0.5);
		}
		.link a:hover{
			opacity: 0.5;
		}
		iframe{
			width: 100%;
			height: 100%;
			border:white;
		}
	</style>
	<title>Health Assistant</title>
</head>
<body>
	<div class="link">
	<a target="myframe" href="yogah.php">benefits of yoga</a>
	<a target="myframe" href="yogad.php" style="width:100px">Yoga</a>
</div>
<div class="frame">
	<iframe name="myframe"></iframe>
</div>
</body>
</html>
<?php
include 'footer.php';
?>