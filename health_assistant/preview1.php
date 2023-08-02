<?php
include 'conn.php';
include 'header.php';
$sid=$_SESSION['search_id'];
$id1=$_SESSION['id1'];
extract($_REQUEST);
$m="";
if(@isset($review))
{
	$m= "<textarea name='ureview' placeholder='Your Openion..'></textarea><br>
	Rating:<input type='number' name='rate'><br><input type='submit' name='submitr'/>";
	echo "hi";
	//if(isset($submitr))
	//{ 
	extract($_REQUEST);
		//$q="insert into review(pid,uid) values($sid,$id1)";
	$q="insert into review(pid,uid,review,rating,status) values($sid,$id1,'$ureview',$rate,1)";
		echo $q;
		echo "hi";
		mysqli_query($conn,$q);
		//{
			//echo "<script>alert('your review is added')</script>";
	//	}
	//}
	//echo "<script>alert(submitr)</script>";
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Health Assistant</title>
	<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
		<link rel="stylesheet" href="css/multip.css">
		<script src="https://kit.fontawesome.com/11172b164f.js" crossorigin="anonymous"></script>
	<style>
		
		
		.btnf{
			padding-left: 580px;
		}
		/*.btn:hover{
				height:36px;
	width: 43px;
	background-color:white;
	display:inline-block;

		}
		/*button{
	width: 35px;
	height:50px;
	border-radius:20px;
	text-transform:uppercase;
	color:white;
	font-size:18px;
	box-shadow: 0px 3px #808080;
	padding:10;
	margin:10px 0;
	height:30;
	width:auto;
	border:none;
	background:linear-gradient(90deg,gray,black);


		}*/
		button:hover{
			opacity: 0.5;
		}
		button i{
			color: black;
			background-color: white;
			border-color: white;
		}
		.review{
			padding: 15px;
		/*	position: fixed;*/
		display: block;
		}
		.user{
			display: flex;
			/*height: 10px;
			width: 10px;*/
		}
		.desc p{
			/*height: 100%;*/
			width: 100%;
	/*		max-height: 20px;
			max-width: 20px;
			display: inherit;*/
		}
	</style>
</head>
<body>
	
	<form action="#">
	<div class="btnf">
		<?php 
			if(isset($_SESSION['loginid1']))
			{
				echo "<button name='review'  class='btn' onclick=''><i class='fa fa-plus-circle  fa-2x'></i></button>";
			}
		?>
		
	</div>
	<?php
		$q="select review,uid from review where pid=$sid and status=0";
		$res=mysqli_query($conn,$q);
		if (mysqli_num_rows($res) > 0)
	 	{
	 		while($row = mysqli_fetch_assoc($res)) 
	 		{
	 			$uid=$row['uid'];
	 			$q1="select usernm from user where id=$uid";
	 			$res1=mysqli_query($conn,$q1);
				if (mysqli_num_rows($res1) > 0)
	 			{
	 				while($row1 = mysqli_fetch_assoc($res1)) 
	 				{
	?>
	<div class="review">
		<div class="user">
			<h4><?php echo $row1['usernm']; ?>&nbsp;&nbsp;&nbsp;</h4>
			<div class="rate">
				<i class="fa-solid fa-star"></i>
				<i class="fa-solid fa-star"></i>
				<i class="fa-solid fa-star"></i>
				<i class="fa-solid fa-star"></i>
				<i class="fa fa-star-o"></i>
			</div>
		</div>
		<div class="desc">
			<p><?php echo $row['review'];?></p>
		</div>
	</div>
	<?php
		}
	}
}
}
echo $m;
?>
</body>
</html>