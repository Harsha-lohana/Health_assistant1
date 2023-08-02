<?php
	include 'conn.php';
	extract($_REQUEST);

	@session_start();
	//$search_id=$_SESSION['search_id'];
	//echo $search_id;
	//echo $_SESSION['id'];
	$m="";
	include 'header.php';
	if(@isset($search))
	{
		header("location:search.php");
	}
	//$c=NULL;
	if(isset($cart))
			{

				//$search_id=$_GET['search_id'];
				//$s=$_GET['search_id'];
				$id1=$_SESSION['id1'];
				//echo "$c";
				//if($m=="Add")
				{
					$q="insert into cart values($id1,$search_id)";
					if(mysqli_query($conn,$q))
					{
						$m="Remove";
						$c=1;
					}
						
				}
				/*else
				{
					
					$q="delete from cart where uid=$id1 and pid=$search_id";
					if(mysqli_query($conn,$q))
					{
						$m="Add";
						$c=0;
					}	
				}*/
				
			}
		else
		{
			$m="Add";
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Health Assistant</title>
	<script src="https://kit.fontawesome.com/11172b164f.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
$(document).ready(function(){
  $("#desc_main").click(function(){
    $("#idreview").hide();
    $("#iddesc").show();
    // alert('dfdf');
  });
  $("#review_main").click(function(){
    $("#iddesc").hide();
    $("#idreview").show();
  });
});
</script>


	<style>
		.sproduct 
		{
			padding-top: 150px;
			padding-left: 250px;
			/*margin-left: 50px;*/
			padding-bottom: 50px;
		}
		.productimg 
		{
			display: block;
			width: 50px;
			height: 0px;
			border-radius: 15%;
			padding: 10px;
			display: flex;
		}
		.sproduct img
		{	
			width: 170px;
			/*box-shadow: 2px 2px #000;*/
			border-radius: 30px;
		}
		.productimg:hover img
		{
			opacity: 0.5;	
		}
		.content
		{
			display: inline-block;
			padding-left:200px;
			margin:0;
			padding-top: 0;
			height: 50px;
		}
		.product-img-small
		{
			margin-left: 20px;
			margin-top: 110px;
		}
		.product-img-small img
		{
			width: 30px;
			height: 30px;
			border-radius: 15%;
			box-shadow: 1px 1px #000;
		}
		button:hover
		{
  			opacity: 0.7;
		}
		.content button
		{
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
  			width: 180px;
  			font-size: 18px;
  			display: inline-block;
		}
		table
		{
		}
		button
		{
  			border: none;
  			outline: 0;
  			padding: 12px;   
  			margin-bottom: 10px;
  			padding-top: 15px;
  			background-color: #fff;
  			text-align: center;
  			cursor: pointer;
  			width: 180px;
  			font-size: 18px;
  			display: inline-block;
		}
		button:active 
		{
			background-color: gray;
		}
		.table{
			padding-top: 50px;
			
		}
		table td{

			/*border-top: black;*/
				border-top: 1px solid rgba(255,255,255,0.1); 
	/*border-bottom: 1px solid black;*/
	}
	table td a{
		height: 100%;
	width: 100%;
	line-height: 65px;
	font-size: 20px;
	color: white;
	padding-left: 20px;
	/*background:blue;*/
	text-decoration: none;
	box-sizing: border-box;
	/*border-radius: 40px;*/
		color: white;
		background-color: black;
		transition: .4s;
		/*background:radial-gradient(white,blue);
		background: radial-gradient(#AFD8E6,#ADD8E6);*/
	}
	.tr{
		 background-color: #fff;
	}
	table td:hover a{
		padding-left: 50px;
		opacity: 0.5;	

	}
	table td frame{
		border-width: 120px;
		border: 1px solid rgba(255,255,255,0.1);

	}

	.review{
		 border-bottom: 2px solid rgba(000,000, 000, .5);
		 padding: 0px;
		 margin:0;
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

  /* Position the tooltip 
  position: absolute;*/
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
}
.tooltip {
 
/*  display: inline-block;*/

}
	</style>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<form action="#" method="post">
		<div class="sproduct">
			<?php
				echo $search_id;
				$q="select name,cid,price,s_des from product where pid=$search_id";
				//echo $search_id;
				$count=0;
				
				$res=mysqli_query($conn,$q);
				if (mysqli_num_rows($res) > 0)
	 			{
	 				@session_start();
	 				while($row = mysqli_fetch_assoc($res)) 
	 				{
	 					$name= $row['name'];
	 					$des= $row['s_des'];
	 					$price= $row['price'];
	 					$cid= $row['cid'];
	 					$q1="select location from p_photo where pid=$search_id";
	 					$res1=mysqli_query($conn,$q1);
	 					if (mysqli_num_rows($res1) > 0 )
	 					{
							while($row1 = mysqli_fetch_assoc($res1)) 
	 						{
	 								$pimg=$row1['location'];

	 						}	
	 					}
	 				}
	 			}
			?>
			<div class="whole">
				<div class="productimg">
					<a href="#">
						<img src="admin/images/<?php echo $pimg;?>" onerror=this.src="admin/images/alt.png">
					</a>
				</div>
				<div class="content">
					<font size="15" color="">
						<?php echo $name;?><br>
					</font>
					<font size="" color="">
						<?php echo $des;?>
						<br>
						<?php echo $price;?>
						<i class="fa-solid fa-indian-rupee-sign"> &nbsp;
						</i>
						<p>
							<?php 
							if(@isset($_SESSION[loginid1]))
							 {

								?>
							<button name="cart" value=<?php echo $m?>>&nbsp;&nbsp;
								<?php echo $m?><i class="fa fa-cart-plus"></i>
							</button>
							<?php
						}?>

							<button>Buy&nbsp;&nbsp;
								<font size="4">&#x2192;</font>
							</button>
						<!-- <div class="tooltip"> -->
							<button name="search">Search
								<i class="fa fa-search"></i>
								
							</button>
						<!-- </div> -->
							

						</p>	
					</font>
				</div>
				<div class="product-img-small">
					<img src="admin/images/<?php echo $pimg;?>" onerror=this.src="admin/images/alt.png">		
					<img src="admin/images/<?php echo $pimg;?>" onerror=this.src="admin/images/alt.png">		
				</div>
			</div>
		</div>
		<?php
			$id=$_SESSION['search_id'];
			$q="select `desc` from pdesc where desc_id =(select desc_id from product where pid=".$id.")";
			$res=mysqli_query($conn,$q);
		?>
		<div class="table">
			<table style="background-color: #fff; filter: alpha(opacity=40); opacity: 0.95; border:1px black solid; box-shadow: 2px 2px gray;" align="center">
				<tr class="tr">
					<td>
						<a id="desc_main">Description
						</a>
					</td>
					<td> 
						<a id="review_main">Review</a>
					</td>
				</tr>
				<tr>
					<?php
						while($row = mysqli_fetch_assoc($res)) 
	 					{
	 						$desc=$row['desc'];
							//echo $desc;
					?>
					<td id="iddesc">
						<p>
							<?php
								$lines = str_replace(".", "<br>", $desc);
								echo $lines;
								
							?>


						</p>
					</td>
				<?php } ?>


					<td id="idreview"> 
						<p>
							<!-- ======================= -->
<?php				
	include 'conn.php';
	$sid=$_SESSION['search_id'];
	$id1=@$_SESSION['id1'];
	extract($_REQUEST);
	//echo isset($review);
	if(@isset($id1))
	{
		$ureview="";
		$rate="";
		$m= "<br><br><textarea name='ureview' placeholder='Your openion..' style='height:100%;width:100%;'></textarea><br><br>	Rating:<input type='number' name='rate'><br><br><input type='submit' name='submitr'/>";
		//if(isset($submitr))
		//{ 
		extract($_REQUEST);
		//$q="insert into review(pid,uid) values($sid,$id1)";
		$q="insert into review(pid,uid,review,rating,status) values($sid,$id1,'$ureview',$rate,1)";
		mysqli_query($conn,$q);
		//{
		//echo "<script>alert('your review is added')</script>";
		//	}
		//}
		//echo "<script>alert(submitr)</script>";
	}
	if(@isset($submitr))
	{
		echo "<script> alert('your review submited Thanks!');</script>";
	}
	$q="select review,uid from review where pid=$id and status=0";
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
?>
<form action="#">
	<div class="btnf">
		<?php 
			
		?>
		
	</div>
	<?php
	if(@isset($id1))
		echo 	$m;
?>




							<!-- -========================== -->
						</p>
					</td>
					<!-- <td colspan="2">
						<iframe style="background-color: #fff; filter: alpha(opacity=40);opacity: 0.95;border:1px white solid;" id="Myframe" name="Myframe" height="440"   width="635"></iframe>
					</td -->
				</tr>

			</table>
		</div>
	</form>
</body>
</html>
<?php
	include 'footer.php';
	/*<form action="#">
	<div class="btnf">
		<?php 
			if(isset($_SESSION['loginid1']))
			{
				echo "<button name='review'  class='btn' onclick=''><i class='fa fa-plus-circle  fa-2x'></i></button>";
			}
		?>
		
	</div>
	<?php
		}
	}
}
?>*/
?>
