<?php
include 'conn.php';
extract($_REQUEST);
			$search_id=$_SESSION['search_id'];
	$q="select `desc` from pdesc where desc_id =(select desc_id from product where pid=4)";
	$res=mysqli_query($conn,$q);
	
?>
<style>
	ul{
		text-decoration: none;
		list-style: none;
		line-height: 30px;
		font-size: 15px;
	}
	li::before{
            content: "\00BB";
        }
        
</style>
<table>
	<tr>
		<td><?php
			echo "<center><h1>Product Description</h1></center>";
			//echo "hiiii$search_id";
			if (mysqli_num_rows($res) > 0)
	 		{
	 			while($row = mysqli_fetch_assoc($res)) 
	 			{
	 				$desc=$row['desc'];
/*	 				$ok=strcmp($desc, '.');
	 				//$ok=strpos($desc, '.');
	 				//for($i=0;$i<$ok;$i++)
	 				{
	 				//	echo $ok[$i];
	 				}
	 				
	 				//$ok=strstr($desc, '.');
	 				//$ok=str_split($desc,'.');

	 				echo $ok;
	 				//print_r($ok);
					echo "<br><br><br><p>$desc</p>";*/
    				$lines = str_replace(".", "<li>", $desc);
					echo "<ul>";
					echo $lines;
					echo ".<br>";
					echo "<ul>";
				}
			}
		?></td>
	</tr>
</table>