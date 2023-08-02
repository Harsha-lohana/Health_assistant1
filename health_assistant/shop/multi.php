<?php
	extract($_REQUEST);
	include '../conn.php';
//	echo $edit;
	 if(@isset($edit))
	{
		echo "<script>alert('hello');</script>";
		header("Location:edit.php");
	}
	//if(isset($_SESSION))
		//session_start();
	if(isset($del_p))
	{
		$id=$_SESSION['pid'];
		echo $id;
		$q="delete from product where pid=$id";
		if(mysqli_query($conn,$q))
		{
		echo "deleted";	
		}
	}
	
?>

<html>
	<head>
		<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
		<link rel="stylesheet" href="../css/multip.css">
		<script src="https://kit.fontawesome.com/11172b164f.js" crossorigin="anonymous"></script>
	</head>
	<body bgcolor="white">
		
		
		<?php

//$data=$_GET['search'];
//echo "<script>alert('$data')</script>";
?>
<form name="frm1"  method="post">
<div class="all">
<div class="sort">
			
		</div>
		<div class="product"><?php
// echo $search;
		$id1=$_SESSION['id1'];
 $q="select pid,name,price from product 	where sid=$id1";
		
		$count=0;
	 $res=mysqli_query($conn,$q);
	 if (mysqli_num_rows($res) > 0)
	 {
	 

	 	while($row = mysqli_fetch_assoc($res)) 
	 	{
	 		$id1=$row['pid'];
	 		$q1="select location from p_photo where pid=$id1";
	 		$res1=mysqli_query($conn,$q1);
	 		if (mysqli_num_rows($res1) > 0 )
	 		{
				while($row1 = mysqli_fetch_assoc($res1)) 
	 			{
	 				if( $count==0)
	 				{
	 					$pimg=$row1['location'];
	 					$count=1;
	 				}
	 			}	
	 		}
	 	?>
	 	<div class="card">
	 	<div class="admin">
	 			
						<a href="productp.php">
							<img src="../admin/images/<?php echo $pimg; ?>" onerror=this.src="images/alt.png" style="background:white;"><br><br>
							<h4><?php echo $row['name'];?></h4><br>
						</a>
						<div class="rating">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
						</div><br>
						<p>
							<i class="fa-solid fa-indian-rupee-sign"> &nbsp;</i><?php echo $row['price'];?>
						</p>
						
						<p><button name="edit"><i class="fa-solid fa-pen-to-square"></i></button></p>
						<p><button name="del_p"><i class="fa-solid fa-trash-can"></i></button></p>

					</div>
			 	</div>
				<?php
	 		

	 		
	 		$_SESSION['pid']=$row["pid"];
			//header('Location:multip.php');
	 	}
	 }
	 else 
	 {
	 	?>
	 	<script>alert("no data found");</script>
	 	<?php
	 		$_SESSION['exist']=1;
//header('location:home.php');
	 }
	
?></div></div></form>

			 
	</body>
	
</html>