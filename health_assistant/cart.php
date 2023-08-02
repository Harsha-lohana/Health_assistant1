<!--<tr >
		<td colspan="3" >	</tr>--->
<?php
include 'conn.php';
include 'header.php';
$uid=$_SESSION['id1'];

if(isset($_GET['cross']))
{
	//echo "hi";
	$cross=$_GET['cross'];
	$q="delete from cart where uid=$uid and pid=$cross";
	mysqli_query($conn,$q);
}
?>
<form action="#">
	<?php
$count=0;
$q="select cart.pid,name,price,address,expdate from cart,product,shop where uid=$uid and cart.pid=product.pid and sid=shop.id";
$res=mysqli_query($conn,$q);
				echo "<center style='padding:10;margin:20;'>Health Assistant - Cart</center>
	 				<table border=2 align='center' cellpadding='30' style='margin-bottom: 50;width:100% ;margin-top:50;' >
	 					<tr style='background-color:black;color:white;padding:90'>
	 						<td></td>
	 						<td></td>
	 						<td>Name</td>
	 						<td>Price</td>
	 						<td>Address</td>
	 						<td>Expdate</td>
	 					</tr>
	 					";

				if (mysqli_num_rows($res) > 0)
	 			{
	 				@session_start();
	 				while($row = mysqli_fetch_assoc($res)) 
	 				{
	 					$pid=$row['pid'];
	 					$q1="select location from p_photo where pid=$pid";
	 					$res1=mysqli_query($conn,$q1);
	 					if (mysqli_num_rows($res1) > 0 )
	 					{
							while($row1 = mysqli_fetch_assoc($res1)) 
	 						{
	 								$pimg=$row1['location'];

	 						}	
	 					}
	 				
			?>

	
	<tr>
		<td><button value="<?php echo $row['pid'];?>" name="cross" style="background-color: white;border-color: white;"><i class="fa fa-times" aria-hidden="true" ></i></button>
</td>
		<td><img src="admin/images/<?php echo $pimg;?>" onerror=this.src="admin/images/alt.png" style=" width: 70px;height: 80px;border-radius: 15%;"></td>
		<td><?php echo $row['name'];?></td>
		<td><?php echo $row['price'];?></td>
		<td><?php echo $row['address'];?></td>
		<td><?php echo $row['expdate'];?></td>
	</tr>

<?php
	$count=$row['price']+$count;
}

}
else
{
	echo "<tr><td colspan='6'>No Data Found</td></tr>";
}
echo "<tr  style='background-color:black;color:white;'>
	<td colspan='5'><font >Cart Sub Total
	</td>
	<td>$count</td>
</table>";
?>
</form>
<?php
include 'footer.php';
?>