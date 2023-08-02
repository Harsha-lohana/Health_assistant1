<?php
	$msg="";
	@session_start();
	print_r($_SESSION);
	//echo "loginid".$_SESSION['loginid1'];
	if(isset($_SESSION['loginid1']))
	{
		$msg="Logout";
		echo "hi";
		//$rediract="logout.php";
	}
	else
	{
		$msg="Login";
		$rediract="login.php";
	}
//	echo "<br>".$msg;
?>
<html>
	<head>
		<script>
			function myFunction(x) {
		  x.classList.toggle("change");
		  
			}
		function fun()
		{
				
		}
			/*var input = document.getElementById("myInput");
			input.addEventListener("keyup", function(event) {
			if (event.keyCode === 13) {
				event.preventDefault();
				document.getElementById("myBtn").click();
				alert("hi");
				}
			});*/
		</script>
		<link rel="stylesheet" href="../css/header.css">

	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

			<style >
				.container {
  display: inline-block;
  cursor: pointer;
  border:1px solid  #000;
  padding:5px;
  width:40px;
}

.bar1, .bar2, .bar3 {
  width: 38px;
  height: 5px;
  background-color: #000;
  
  margin: 6px 0;
  transition: 0.4s;
}

.change .bar1 {
  -webkit-transform: rotate(-45deg) translate(-9px, 6px);
  transform: rotate(-45deg) translate(-9px, 6px);
}

.change .bar2 {opacity: 0;}

.change .bar3 {
  -webkit-transform: rotate(45deg) translate(-8px, -8px);
  transform: rotate(45deg) translate(-8px, -8px);
}
/*tooltip*/


.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  opacity: 10px;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
}
.tooltip {
  position: relative;
  display: inline-block;
}
a{
	text-decoration: none;
}
a:hover
{
	height: auto;
	width: auto;
}
			</style>
	</head>
	<body>
		<form action="multip.php" >
		<div class="header">
			<div class="navi">
				<div class="logo">
					<img src="../images/logo.png" width="100px" >
				</div>
			<div class="search">
				<input type="text" placeholder="Search.." name="search" id="myInput">
				<i class="fa fa-search" aria-hidden="true"></i>
				<input type="submit"  onclick="fun()" style="opacity: 0" value="search"/>
			</div>
			<nav>
				<ul>
					<li>
						<a href="home.php"><font color="black" size="5">Home</li>
					<li>
						<a href="home.php"><font color="black" size="5">About Us
					</li>
					<li>
						<a href="home.php"><font color="black" size="5">Contect Us
					</li>

					<li>
						<a href="../<?php echo $rediract;?>">
							<font color="black" size="5"><?php echo $msg; ?></font>
						</a>
					</li>
					<li>
						<a href="add/adds.php">
							<i class="fa fa-plus-circle  fa-2x"></i>
						</a>
					</li>
					<li>
						<div class="tooltip"><a href="cart.php" ><font color="black" size="4">

						<?php 
						if(isset($_SESSION['loginid1']))
							{
								echo "<i class='fa fa-shopping-cart fa-2x'></i>
								";
							}?></font></a><span class="tooltiptext">view in cart</span></div>
</li>
					<a target="" href=""><li><div class="container" onclick="myFunction(this)">
  
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
</div></li></a>
					
				</ul>
			</nav>
		</div>
	</div>
	</form>
</body>
</html>
<html>