<?php
	include 'conn.php';
	extract($_REQUEST);
	//@ 	session_start();
	$search_id=$_SESSION['search_id'];
	echo $search_id;
	//echo $_SESSION['id'];
	include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Health Assistant</title>
	<script src="https://kit.fontawesome.com/11172b164f.js" crossorigin="anonymous"></script>
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
	<form action="#">
		<div class="sproduct">
			<?php
				$q="select name,cid,price,s_des from product where pid=$search_id;";
				$count=0;
				$m=true;
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
	 							if( $count==0)
	 							{
	 								$pimg=$row1['location'];
	 								$count=1;
	 							}
	 						}	
	 					}
	 				}
	 			}
			?>
			<div class="whole">
				<div class="productimg">
					<a href="#">
						<img src="admin/images/<?php echo $pimg;?>">
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
							<button>Add to Cart&nbsp;&nbsp;
								<i class="fa fa-cart-plus"></i>
							</button>
							<button>Buy&nbsp;&nbsp;
								<font size="4">&#x2192;</font>
							</button>
<div class="tooltip">
							<button>Search&nbsp;&nbsp;
								<i class="fa fa-search"></i>
								
								<span class="tooltiptext">Search Near About</span>
							</div>
							</button>

						</p>	
					</font>
				</div>
				<div class="product-img-small">
					<img src="admin/images/<?php echo $pimg;?>">		
					<img src="admin/images/<?php echo $pimg;?>">		
				</div>
			</div>
		</div>
		<div class="table">
			<table style="background-color: #fff; filter: alpha(opacity=40); opacity: 0.95; border:1px black solid; box-shadow: 2px 2px gray;" align="center" >
				<tr class="tr">
					<td>
						<a href="pdesc.php" target="Myframe">Description
						</a>
					</td>
					<td> 
						<a href="preview.php" target="Myframe">Review</a>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<iframe style="background-color: #fff; filter: alpha(opacity=40);opacity: 0.95;border:1px white solid;" name="Myframe" height="440"   width="635"></iframe>
					</td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>
<?php
	include 'footer.php';
?>