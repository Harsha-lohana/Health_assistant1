<?php
	require_once 'conn.php';
	include 'header.php';
	//session_destroy();
	extract($_REQUEST);
	//echo $_SESSION['loginid1'];
	if(isset($_SESSION['cid']))
	{
		$i=$_SESSION['cid'];
		echo "<script>alert('Your Login Id will Be '+$i);</script>";
		unset($_SESSION['cid']);	
	}
	if(@$_SESSION['c']==1)
	{
		$i=$_SESSION['id1'];
		echo "<script>alert('your Login Id will be $i');</script>";
		$_SESSION['c']=0;
	}
	if(isset($_GET['data']))
	{
	if($_GET['data'])
	{
		echo "<script>alert('there is no such medicine')</script>";
		unset($_SESSION['exist']);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Health Assistant</title>
		<script>
		
		function c()
		{
 document.getElementById("myInput").focus();		
		}
	</script>
	<style>
				/*---------------body---------------*/
.row
{
	display:flex;	
	align-items:center;
	flex-wrap:wrap;
	
	width:auto;
	height:350px;	
/*	background: radial-gradient(#fff,#c6d3e9);*/
/*background-image:url("a.jpg"); */

	padding: 30px;
	margin-right: 30px;
	margin-left: 30px;
	/*background:radial-gradient(#ADD8E6,#ADD8E6);*/
}

.row c-1 
{

	background:radial-gradient(#e8eae7,#e8eae7);
	flex-basis:50%;
	min-width:300px;
	max-width:100%;
}
.c
{
	max-width: 1200px;
	margin: auto;
	margin-top: 50px;
	padding-left: 15px;
	padding-right: 15px;
	background-image: url(a.jpg);
}
.c-1
{
	display: inline-block;
	padding:10px;
	margin:20px;
}
.btnfind
{
	padding:10px;
	border-radius:40px;
	text-transform:uppercase;
	color:white;
	font-size:18px;
	box-shadow: 0px 5px #808080;
	padding:7;
	margin:10px 0;
	height:30;
	width:auto;
	border:none;
	background:linear-gradient(90deg,#0162c8,#55e7fc);

}
.btnfind:hover
{
	height:45px;
	width: 145px;
	background-color:white;
	display:inline-block;
}
	
/*------------end body-----------*/

/*--------------product+fetured------*/
.categories
{
	margin: 50px 0;
	min-width: 200px;
	max-width:auto;

}
.categories .row{
	justify-content:space-around;
}

/*----------------fetured------*/
.row c-2
{
	/*background-image: url(back2.jpg);*/
	background:radial-gradient(#e8eae7,#e8eae7);
	background-size: 1400px 1000px;
}
.c-2 img
{
	width: 300px;
	margin-left: 20px;
	height: 250px;
	padding-left: 10px;
	max-width:auto;
	padding:30px;
	
}
.c-2 img:hover
{
	transform: translateY(-5px);
}
/*---------end fetured------*/
/*---------------product---------*/
.c-3
{
	flex-basis: 30%;
	padding: 10px;
	min-width: 200px;
	margin-bottom: 50px; 
	display: inline-block;
	text-align: center;
	transition: transform 0.5s;
}
.c-3 img{
	width: auto;
	margin-left: 20px;
	height: 180px;
	padding-left: 10px;
	max-width:auto;
	padding:20px;
	box-shadow: 0 0 20px 0px rgba(0,0,0,0.1);
}
.c-3:hover
{
	transform: translateY(-5px);
}
h4
{
	margin: 0px;
	padding-top:0px;
	color: #555;
	font-weight: 15px;
}

.title
{
	text-align: center;
	margin: 0 auto 80px;
	position: relative;
	line-height: 60px;
	color: #555;
}
.title::after
{
	content: '';
	background: #251d91;
	width: 80px;
	height: 5px;
	border-radius: 5px;
	position: absolute;
	bottom: 0;
	left:50%;
	transform: translateX(-50%);
}
.rating .fa
{
	color: orange;
}
/*----------end product---------*/
/*-----------end product+fetured------*/

	
	</style>
	
<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
</head>
<body >
<?php
		//if($_SESSION['id'])
		//		echo"oh";
			//echo ($_SESSION['id']);
		?>
	<?php
	extract($_REQUEST);
	if($msg==1)
		echo "hi";
	
?>

<!---body----->
	<div class="c"  style="background-image:url(images/back2.jpg);background-size:1350px 500px; box-shadow: 0 0 13px 0px rgba(0,0,0,0.1); border-radius:30px">
	<div class="row"> 
		<div class="c-1">
			<h1>Let's Recover Fast!</h1>
			<p>Let's Get fast medicine to you !<br> with nearest availability of needed medicine  </p>
			<br>
			<input class="btnfind"  type="button" value="Let's Find" onclick="c()"/>
		</div>
		<div class="c-1">
			
		</div>
	</div>
	</div>
<!-----fetured------>
	<div class="categories">
		<div class="title">
			<h2>Fetures
	
			</h2>
		</div>
	<div class="row" >
		<div class="c-2">
			<a href="yoga.php"><img src="images/yoga1.png"> </a>
		</div>
		<div class="c-2">
			<a href="#"><img src="images/home5.png"> </a>
		</div>
	</div>
	</div>
	<!-----------product------------------->
	<div class="categories">
		<div class="title">
			<h2>Product
	
			</h2>
		</div>
	<div class="row">
		<div class="c-3">
			<a href="productp.php?nm=d">
				<img src="images/product.png" width="40%">
				<h4>a</h4>
			</a>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-half-o"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>150.00</p>
			 </div>
			 <div class="c-3">
			<a href="productp.php?nm=d">
				<img src="admin/images/skin_Care_loreal.jpg" width="40%">
				<h4>a</h4>
			</a>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>150.00</p>
			 </div>
			 <div class="c-3">
			<a href="productp.php?nm=d">
				<img src="admin/images/skin burn.jpg" width="40%">
				<h4>a</h4>
			</a>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>150.00</p>
			 </div>
	</div>
</div>
</body>
</html>
<?php 
	include 'footer.php';
?>