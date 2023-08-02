<?php
include '../conn.php';
extract($_REQUEST);
//print_r($_REQUEST);
$id=$_SESSION['pid'];
if(isset($addm))
{
	
	//echo $r;
	if($r=='on')
		$r=0;
	else
		$r=1;
	$q="Update product set name=$name,price=$price,s_des=$desc,cid=$category,m_photo=$Photo,ip_up=$ph,r_marko=$r where pid=$id";
		if(mysqli_query($conn,$q))
			echo "<script>alert('updated');</script>	";
		else
			echo "<script>alert(' not updated');</script>	";
}
?>
	<link rel="stylesheet" href="css/ragi.css">
<style>
	table{
		 margin-top:70;
	}
</style>
<form method="get">
<table align="center" bgcolor="white" style="padding:10px; border-radius:40px;"align="center"  cellpadding="5" cellspacing="10">
	<tr align="center">
		<th colspan="2">
			<h1>Update Medicine
		</th>
	</tr>
	<tr>
		<td colspan="2"><hr color="blue" size="3"></td>
	</tr>
	<tr>
		<td> ID
		</td>
		<td><input type="textbox" name="name" disabled value="<?php echo $id;?>"></td>
	<tr>
		<td>
			Name
		</td>
		<td>
			<input type="textbox" name="name" placeholder="Name Medicine">
		</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>
			<textarea name="desc" placeholder="Medicine Description"></textarea>
		</td>
	</tr>
</tr>
<tr>
	<td>Price</td>
	<td><input type="Number" name="price" placeholder="price">
	</td>
</tr>
<tr>
	<td>Category</td>
	<td>
		<?php
		$q="select * from category";
			$res=mysqli_query($conn,$q);
			if (mysqli_num_rows($res) > 0) 
			{
						echo "<select name='category' id='category'>";
				while($row = mysqli_fetch_assoc($res)) 
				{
					?>
					<option value="<?php echo $row['cid']?>"><?php echo $row['name']?></option>
					<?php
					
				}
				echo "</select>";	
			}
		?>
	</td>
</tr>
<tr>
	<td>Expairy Date</td>
	<td><input type="Date" name="expdate"></td>
</tr>
<tr>
	<td>Photo</td>
	<td><input type="file" name="photo"></td>
</tr>
<tr>
	<td>Pharmacy
	</td>
	<td><input type="radio" name="ph" value="ip" checked>IP
		<input type="radio" name="ph" value="up">UP</td>
</tr>
<tr>
	<td>Ragistared Madicine</td>
	<td><input type="radio" name="r" value="0" checked>Yes
	<input type="radio" name="r" value="1">No</td>
</tr>
<tr align="center">
	<td colspan="2"><input type="submit" name="addm">
</tr>
</table></form>