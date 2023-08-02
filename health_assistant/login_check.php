<?php
	extract($_REQUEST);
	include 'conn.php';
	$q="select * from $role where id=$id and pass=$pass";
	
	$res=mysqli_query($conn,$q);
	//print_r($res['num_rows']);
	// session_start();
	if ((mysqli_num_rows($res))>0)
	{
		
		$_SESSION['loginid1']=1;

		if($role=="admin")
		{	
			$_SESSION['aid1']=$id;
				echo $id."<br>".$_SESSION['loginid1'];
			//echo "id".$_SESSION['id1'];
			//echo "<br>loginid".$_SESSION['loginid1'];
			header('location:admin/index.php');
		}
		else if($role=="user")
		{
			$_SESSION['id1']=$id;
			//echo $_SESSION['loginid1'];
			header('location:home.php');
		}
		else
		{
			$_SESSION['sid1']=$id;
			echo $id."<br>".$_SESSION['loginid1'];
			print_r($_SESSION);
			header('location:shop/index.php');
		}
		
		
	}
	else
	{
		$_SESSION['uexist']=1;
		header('location:login.php');
		
	}


?>