<?php
include '../conn.php';
extract($_REQUEST);
	@ 	session_start();
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
	padding-left: 150px;
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
.sproduct img{
	
	width: 150px;
	box-shadow: 2px 2px #000;
	border-radius: 30px;
}
.productimg:hover img
{
	opacity: 0.5;
	
}

.content{
	display: inline-block;
	padding-left:200px;
	margin:0;
	padding-top: 0;
	height: 50px;
}

.product-img-small {
	margin-left: 20px;
	margin-top: 90px;
}
.product-img-small img
{
	width: 30px;
	height: 30px;
	border-radius: 15%;
	box-shadow: 1px 1px #000;
	
}
button:hover {
  opacity: 0.7;
}
.content button {

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
table{

}
button {

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
button:active {
	background-color: gray;
}

	</style>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<form action="#">
	<div class="sproduct"><?php
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
			<a href="#"><img src="images/<?php echo $pimg;?>"></a>

		</div>
		<div class="content">

			<font size="15" color="">
				<?php echo $name;?><br>
			</font>
<font size="" color=""><?php echo $des;?><br><?php echo $price;?>
	
				<i class="fa-solid fa-indian-rupee-sign"> &nbsp;</i>

	<p><button>Add to Cart&nbsp;&nbsp;<i class="fa fa-cart-plus"></i>
</button>
		<button>Buy&nbsp;&nbsp;<font size="4">&#x2192;</font></button></p>	
	<p></p>							
			</font>
		</div>
		<div class="product-img-small">
			<img src="images/<?php echo $pimg;?>">		
			<img src="images/<?php echo $pimg;?>">		
		</div>
		</div>
	</div>
	<div class="table">
		<table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:1px black solid;">
			<tr>
				<td><button onclick="<?php $m=true;?>">Description</button></td>
				<td><button onclick="<?php $m=false;?>">Review</button></td>
			</tr>
			<tr>
				<?php
				echo  $m;
					if($m==true)
					{
					?>
				<td colspan="2"><font size="" color="">dssjkkkcdjknjcnkdncdncnjdkfndskcncmcds<?php echo $des;?><br></font></td>
				<?php
				}
				else
				{
					?>
					<td colspan="2">edjkcd</td>	
				<?php
				}
				?>
</tr>

		</table>
		<?php
			
		?>
	</div></form>
</body>
</html>
<?php
	include 'footer.php';
?>