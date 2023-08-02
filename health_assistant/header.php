<?php
	$msg="";
	include 'conn.php';
	//session_start();
	//echo "<script>alert($_SESSION['aid'])</script>";
	//echo $_SESSION['loginid1'];
	if(@isset($c))
	{
		$id1=$_SESSION['id1'];
		echo "<script>alert('your id will be $id1');</script>";
		$msg="Logout";
		//echo "hi";
		$r="../logout.php";
	}
	if(isset($cart))	
	{
		header("Locaion:cart.php");
	}
	print_r($_SESSION);
	if(isset($_SESSION['loginid1']))
	{
		$msg="Logout";
		//echo $msg;
		$r="logout.php";
		//unset($_SESSION['loginid1']);
		//	unset($_SESSION['loginid']);
	}
	else if(!isset($_SESSION['loginid1']))
	{
		$msg="Login";
		$r="login.php";
	}	

	//echo $msg;
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
		<link rel="stylesheet" href="css/header.css">

	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

			<style >

/*Search box*/
body{
	font-family: Roboto;
}
input[type=text] 
{ 
	
	width: 100%; 
	padding: 12px 40px; 
	margin: 8px 0; 
	display: inline-block; 
	border: 3px solid #ccc; 
	box-sizing: border-box; 
	size:15px;
}
.search
{
	margin:15px;
	margin-left:20px;
	width:520px;
}
.search {
    position: relative;
        }
          .search input[type=button] 
		  {
			  position:absolute;
            left: 520px;
            top: 19px;
            color: gray;
		  }
        .search i{
            position: absolute;
            left: 15px;
            top: 20px;
            color: gray;
        }
		
/*navi*/
.navi
{	
	display: flex;
	align-items: center;
	padding: 15px;
background:radial-gradient(#e8eae7,#e8eae7);

}
nav
{
	flex: 1;
	text-align: right;
	text-decoration: none;

}

nav ul
{
	display: inline-block;
	list-style: none;

}
nav ul li
{
	display: inline-block;
	margin: 10px;
	margin-right: 15px;
}
a{
	text-decoration: none;
	color: blue;
	display:inline-block;
}
li a:hover
{
	font-size:80px;
}
.header .title
{
		margin-top:20px;
}
/*Toggle Menu*/
.container {
  display: inline-block;
  cursor: pointer;
}

.bar1, .bar2, .bar3 {
  width: 35px;
  height: 5px;
  background-color: #333;
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

				a{
					text-decoration: none;
				}
				.container {
  display: inline-block;
  cursor: pointer;
  border:1px solid  #000;
  padding:5px;
  width:40px;
}

.navi
{	
	display: flex;
	align-items: center;
	padding: 20px;
background:radial-gradient(#e8eae7,#e8eae7);

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

			</style>
	</head>
	<body>
		<form action="multip.php">
		<div class="header">
			<div class="navi">
				<div class="logo">
					<img src="images/logo1.png" width="250px" height="100px" >
				</div>
			<div class="search">
			<input type="text" placeholder="Search.." name="search" id="myInput">
			<i class="fa fa-search" aria-hidden="true"></i>
			<input type="submit"  onclick="fun()" style="opacity: 0" value="search"/>
		</div>
			<nav>
				<ul>
					<li><a href="home.php"><font color="black" size="5">Home</li>
						<li><a href="home.php"><font color="black" size="5">About Us</li>
							<li><a href="home.php"><font color="black" size="5">Contect Us</li>
					<li><a href="<?php echo $r;?>"><font color="black" size="5"><?php echo $msg; ?></font></a><li>
						
						<li>
						<div class="tooltip">
							<a href="cart.php">
								<font color="black" size="5">
								<?php
							 if(isset($_SESSION['loginid1']))
							 {
						?>
									<i class="fa fa-shopping-cart fa-x" name="cart"></i>
									<?php
						}
					?>
				
								</font>
							</a>
							<span class="tooltiptext">view in cart</span>
						</div>
					</li>
					<li>
													<a href="admin/index.php">
								<font color="black" size="5">
								<?php
							 if(isset($_SESSION['aid1']))
							 {
						?>
						<i class="fa fa-briefcase fa-x" aria-hidden="true"></i>
									<?php
						}
					?>
				
								</font>
							</a>


				
					
				</ul>
			</nav>
		</div>
	</div>
	</form>
</body>
</html>
<html>