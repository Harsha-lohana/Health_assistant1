<?php
		session_start();
		if(@$_GET['s']){
			//echo "hi";
			$id=$_SESSION['sid1'];
			$_SESSION['id1']=$_SESSION['sid1'];
			?><script>
					alert("your id will be <?php echo $id;?>");
					window.location.href='index.php';
					</script>
					
					<?php

					//header("Location: index.php");
		}

		$_SESSION['id1']=$_SESSION['sid1'];
		if(!isset($_SESSION['sid1']))
		{
				header("Location: ../login.php");
		}
		//	print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Health Assistant</title>
	<style>
		*{
	margin: 0;
	padding: 0;
	list-style: none;
	text-decoration: none;
}
.slide
{
	position: fixed;
	left: -250px;
	width: 250px;
	height: 100%;
	background:#042331;
	transition: all .5s ease;
}
.slide header{
	font-size: 22px;
	color: white;
	text-align: center;
	line-height: 70px;
	background:#063146;
	user-select: none;
}
.slide ul a{
	display: block;
	height: 100%;
	width: 100%;
	line-height: 65px;
	font-size: 20px;
	color: white;
	padding-left: 40px;
	box-sizing: border-box;
	border-top: 1px solid rgba(255,255,255,0.1); 
	border-bottom: 1px solid black;
	transition: .3s;
}
ul li:hover a{
	padding-left: 50px;
}
.slide ul a i{
	margin-right: 16px; 
}
#check{
	display: none;
}
label #btn,label #cncl{
	position: absolute;
	cursor: pointer;
	background:#042331;
	border-radius: 3px;
}
label #btn{
	left: 40px;
	top: 25px;
	font-size: 35px;
	color: white;
	padding: 6px 12px;
	transition: all 5s ease;
}
label #cncl{
	z-index: 1111;
	left: -205px;
	top:17px;
	font-size: 30px;
	color: #0a5275;
	padding: 4px 9px;
	transition: all .5s ease;
}
#check:checked ~ .slide{
	left:0;
}
#check:checked ~ label #btn{
	left 250px;
	opacity: 0;
	pointer-events: none;
}
#check:checked ~ label #cncl{
	left:205px;
}
#check:checked ~ section{
	margin-left: 250px;
}
section{
	background:url('computer.jpg');
	background-position: center;
	background-size: cover;
	height: 100vh;
	transition: all .5s ease;
}
		/*.all{
			/*display: inline-block;
		}
		.link{
			display: inline-block;
		}
		a{
			text-decoration: none;
			/*text-align: center;
		}*/
	</style>
	<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/11172b164f.js" crossorigin="anonymous"></script>
</head>
<body>

	<input type="checkbox" id="check">
	<label for="check">
		<i class="fas fa-bars" id="btn"></i>
		<i class="fas fa-times" id="cncl"></i>
	</label>

	<div class="slide">
		<header>Health Assistant</header>
		<ul>
			<li><a href="profile.php" target="Myframe"><i class="fa fa-qrcode" aria-hidden="true"></i>Dashboard</a></li>
		<li><a href="addm.php" target="Myframe"><i class="fa fa-link" aria-hidden="true"></i>ADD Medicine</a></li>
		</a></li>
		<li><a href="view.php" target="Myframe"><i class="fa fa-question-circle" aria-hidden="true"></i>View orders</a></li>
		<li><a href="multi.php" target="Myframe"><i class="fa fa-question-circle" aria-hidden="true"></i>View Medicine</a></li>
		<li><a href="#" ><i class="fa fa-envelope" aria-hidden="true"></i>Feedback</a></li>
		<li><a href="../logout.php" ><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>

		
	</div>
	<section>
		<iframe  name="Myframe" style="border:white;filter: alpha(opacity=40);opacity: 0.95; margin-left:100px; align-items: center;" height="100%" width="100%" align="center"></iframe>
	</section>
	<!--<div class="all">
	<div class="link">
	<a href="add/addm.php" target="Myframe">Add Medicine
	</a>
	<a href="add/adds.php" target="Myframe">Add Shop</a>
</div>
<div class="frame">
	<iframe name="Myframe" height="640" width="1335"></iframe>
	</div>-->
</body>
</html>