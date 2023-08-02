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