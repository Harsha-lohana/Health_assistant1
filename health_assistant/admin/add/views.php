<?php
	include '../../conn.php';
	$q="select * from shop where status=0";
	$res=mysqli_query($conn,$q);
	extract($_REQUEST);
	if(isset($del))
	{
		$q="delete from shop where id=$del";
		mysqli_query($conn,$q);
		header('Location:adds.php');
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Health Assistant</title>
</head>
<body>
		<form action="" method="post">
	<table align="center"  bgcolor="white" style="margin-top:70;padding:10px; border-radius:40px;"align="center" cellpadding="5" cellspacing="10">
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
					<td>id</td>
					<td>user name</td>
					<td>Shop keeper name</td>
					<td>Shop Name</td>
					<td>Location</td>
					<td>certificate</td>
				</tr>
				<?php
					if (mysqli_num_rows($res) > 0) 
					{
						while($row = mysqli_fetch_assoc($res)) 
						{
					

							?>
	
				<tr>
					<td><?php echo $row['id'];?></td>
					<td><?php echo $row['usernm'];?></td>
					<td><?php echo $row['sknm'];?></td>
					<td><?php echo $row['snm'];?></td>
					<td></td>
					<td><?php echo $row['certi'];?></td>
					<!--<td><a href="ads.php?id=<?php/* echo $row['id']*/?>">add</a></td>
					<td><a href="views.php?id=<?php/* echo $row['id']*/?>">view</a></td>
					<td><a href="del.php?id=<?php /*echo $row['id']*/?>">delete</a></td>-->
					<td>
					<a href="#">
	
						
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