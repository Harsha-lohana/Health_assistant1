<html>
	<head>
		<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
		
		<script src="https://kit.fontawesome.com/11172b164f.js" crossorigin="anonymous"></script>
		<style>
			*{
	margin:0px;
	padding: 0px;
}

.card{
	display: inline-block;
	padding: 15px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	font-family: arial;
	max-width: 300px;
	margin-bottom: 30px;
	border-radius: 22px;
	margin-left: 15px;
}
.admin .card{
	float: left;
}
.card img
{
	max-height: 200px;
	max-width: 200px;
	border-radius: 25px;
	padding: 15px;	
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  border-radius: 22px;
  margin-top: 15px;
  margin-bottom: 10px;
  padding-top: 15px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
.product
{
	text-align: center;
	align-items: center;
	display: inline-block;
}
h4,.rating,p
{
	font-size: 25px;
}
.rating 
{
	background-color: white;
}
.sort
{
	align-items: center;
	margin-left: 15px;
	padding: 30px;
	display: inline-block;

}
.card button:hover {
  opacity: 0.7;
}
.all
{
	
}		</style>
	</head>
	<body>		
		
		<?php
			include('header.php');
			extract($_REQUEST);
			//$data=$_GET['search'];
			//echo "<script>alert('$data')</script>";
			include 'conn.php';
			$_SESSION['search']=$search;
				 			
			if(isset($cart))
			{
				
				$s=$_SESSION['search'];
				$id1=$_SESSION['id1'];
				$q="insert into cart values($id1,$cart)";
				if(mysqli_query($conn,$q))
				{
					$m="Added";
				}
			}

							else{
				$s=$search;
				$m="Add to Cart";
							}
		?>
		<div class="all">
			<div class="sort">
			</div>
			<div class="product">
				<?php
					 

 					$q="select pid,name,price,address from product,shop where name='$s' and sid=id";
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
	 									$pimg=$row1['location'];
	 							}	
	 						}
	 			?>
	 			<div class="card">
	 				
					<a href="productp.php?search_id=<?php echo $id1;?>">
						<img src="admin/images/<?php echo $pimg; ?>" onerror=this.src="admin/images/alt.png"><br><br>
						<h4>
							<?php echo $row['name'];?>
						</h4>
						<br>
					</a>
					<div class="rating">
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa fa-star-o"></i>
						<p><?php echo $row['address']; ?></p>
					</div>
					<br>
					<p>
						<i class="fa-solid fa-indian-rupee-sign"> &nbsp;</i>
						<?php echo $row['price'];?>
					</p>
					<?php
						//echo "loginid".$_SESSION['loginid1']; 
						if(isset($_SESSION['loginid1']))
						{
					?>
						<p>
							<button onclick='check()' name="cart" value="<?php echo $row['pid'];?>"><?php echo $row['pid'].$m;?></button>
						</p>
					<?php
						}
					?>
			 	</div>
			 	<?php	 		
	 						$_SESSION['pid']=$row["pid"];
							//header('Location:multip.php');
	 					}
	 				}
	 				else 
	 					{
				?>
	 			<!---		<script>alert("no data found");</script>-->
				
	 					<button onclick="<?php header('Location:home.php'); ?>" name="back" style="margin:150px;margin-left: 500px;margin-bottom: 500px;margin-top:250px;  border: none;
  outline: 0;
  padding: 12px;
  border-radius: 22px;
  
  padding-top: 15px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  
  font-size: 18px;
">back to home !no data found</button>

	 			<?php

	 				//echo "<script>alert($s);</script>";
	 				//	header('location:home.php?data=0');
	 			}
				?>
			</div>
		</div>
		<?php
			include 'footer.php';
		?>
	</font>

	</body>
</html>