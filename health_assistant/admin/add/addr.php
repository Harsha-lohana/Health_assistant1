<?php
	include '../../conn.php';
	$q="select  review , usernm,name from review r,product p,user u where r.status=1 and r.pid=p.pid and u.id=r.uid";
	$res=mysqli_query($conn,$q);
	extract($_REQUEST);
	echo "hi";
	if (isset($add))
	{

		$q="update review set status=0 where id=$add";
		mysqli_query($conn,$q);
		header('Location:addr.php');
	}
	else if(isset($del))
	{
		$q="delete from review where id=$del";
		mysqli_query($conn,$q);
		header('Location:addr.php');
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Health Assistant</title>
</head>
<body>
		<form action="" method="post">
	<table align="center" align="center"  bgcolor="white" style="margin-top:70;padding:10px; border-radius:40px;"align="center" cellpadding="5" cellspacing="10">
		<tr>
			<td colspan="2" align="center">Add Shop
		</tr>
		<tr>
			<td colspan="2"><hr color="blue">
		</td>
	</tr>
	<tr>
		<td>
			<table align="center" cellspacing="5" cellpadding="5">
				<tr>
					<td>Product</td>
					<td>user name</td>
					<td>Review</td>
				</tr>
				<?php
					if (mysqli_num_rows($res) > 0) 
					{
						while($row = mysqli_fetch_assoc($res)) 
						{
					

							?>
	
				<tr>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['usernm'];?></td>
					<td><?php echo $row['review'];?></td>
					<!--<td><a href="ads.php?id=<?php/* echo $row['id']*/?>">add</a></td>
					<td><a href="views.php?id=<?php/* echo $row['id']*/?>">view</a></td>
					<td><a href="del.php?id=<?php /*echo $row['id']*/?>">delete</a></td>-->
					<td>
					<a href="#">
										<button value="<?php echo $row['id'];?>" name="add" >add</button>
		
		
						<button value="<?php echo $row['id'];?>" name="del" >delete</button>
					</a>
					</td>
				</tr>
				<?php
					
					}
				}
				?>

			</table>
	</tr>
	</table></form>
</body>
</html>