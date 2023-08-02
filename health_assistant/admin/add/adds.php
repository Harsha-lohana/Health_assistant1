<?php
	include '../../conn.php';
	$q="select * from shop where status=1";
	$res=mysqli_query($conn,$q);
	extract($_REQUEST);
	if (isset($add))
	{
		$q="update shop set status=0 where id=$add";
		mysqli_query($conn,$q);
		header('Location:adds.php');
	}
	else if(isset($del))
	{
		$q="delete from shop where id=$del";
		mysqli_query($conn,$q);
		header('Location:adds.php');
	}
	else if(isset($view))
	{
			header('Location:views.php');	
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Health Assistant</title>
	<script>
		function red()
		{
			window.location.href='views.php';
		}
	</script>
</head>
<body>
		<form action="" method="post">
	<table align="center"  bgcolor="white" style="margin-top:70;padding:10px; border-radius:40px;"align="center" cellpadding="5" cellspacing="10">
		<tr>
			<td colspan="2" align="center">Add Shop
				<td><button id="view" name="view" style="border-radius:40px;text-transform:uppercase;color:white;font-size:18px;padding:7;margin:10px 0;height:30;width:90;border:none;background:linear-gradient(90deg,#0162c8,#55e7fc);" onclick="red()">View all</button>
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