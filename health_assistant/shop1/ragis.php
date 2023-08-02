<?php
	include 'conn.php';
	extract($_REQUEST);
	if(isset($Ragistraion))
	{
			$file_name= $_FILES['certi']['name'];
		$file_tmp= $_FILES['certi']['tmp_name'];
		//print_r($_FILES['certi']);
		echo "hi";
		$q="insert into shop(usernm,pass,sknm,snm,phone,certi,status) values('$unm','$pass','$nm','$snm','$ph','$file_name',1)";
		if(mysqli_query($conn,$q))
		{
			$q="select id from shop where usernm='$unm' and pass='$pass'";
			$res=mysqli_query($conn,$q);
			if (mysqli_num_rows($res) > 0) 
			{
				while($row = mysqli_fetch_assoc($res)) 
				{
					@session_start();
					$_SESSION['sid']=$row["id"];
				}
			}	
		}
		if (isset($_SESSION['sid']))
		{
			$sid=$_SESSION['sid'];
		
		//print_r($_FILES);
		//echo $file_name;
		move_uploaded_file($file_tmp,"../admin/certi/".$sid.$file_name);	
		//echo "<script>alert('your id will be $sid');</script>";
			header("location:home.php?s=1");
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Helth Assistant/Shop Ragistration
		</title>
				<script>
			function remove()
			{
				if(document.frm1.pass.value==document.frm1.cpass.value)
					document.getElementById('cpass1').innerHTML = "";
				if(document.frm1.pass.value!="")
					document.getElementById('pass1').innerHTML = "";
				if(document.frm1.nm.value!="")
					document.getElementById('nm1').innerHTML = "";
				if(document.frm1.snm.value!="")
					document.getElementById('snm1').innerHTML="";
				/*if(document.frm1.locate.value!="")
					document.getElementById('locate').innerHTML = "";*/
				if(document.frm1.certi.value!="")
					document.getElementById('certi1').innerHTML = "";
			}
			function check()
			{
				var i=0;
				let result = "required".fontcolor("red");
				if(document.frm1.pass.value=="")
				{
					document.getElementById("pass1").innerHTML = "password ".fontcolor("red") + result;
					i++;
				}
				if(document.frm1.pass.value!=document.frm1.cpass.value)
				{
					document.getElementById("cpass1").innerHTML = "password And Confirm Password Must Match".fontcolor("red") ;
					i++;
				}

				if(document.frm1.nm.value=="")
				{
					document.getElementById("nm1").innerHTML = "shop owner ".fontcolor("red") + result;
					i++;
				}
				if(document.frm1.snm.value=="")
				{
					document.getElementById("snm1").innerHTML = "shop name ".fontcolor("red") + result;
					i++;
				}
				if(document.frm1.certi.value=="")
				{
					document.getElementById("certi1").innerHTML = "physician certificate ".fontcolor("red") + result;
					i++;
				}
				if(i>0)
				{
					return false;
				}
				return true;
				
			}
		</script>

		<link rel="stylesheet" href="../css/ragi.css">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>
		<form name="frm1" action="#" method="post" enctype="multipart/form-data">
			<center>
				<font size="5px">
					<div class="head">
						<img src="../images/logo.png" alt="Health Assistant" height="75" >	
						<img src="../images/connect.jpg" alt="connects with" height="70">
						<img src="../images/shop.jpg" alt="with you" height="75">
					</div>
					<font color="blue" size="5">
						Let's Connect With You
					</font>
					<div class="c">
						<table cellpadding="3px" cellspacing="3px">
							<tr>
								<th colspan=3 align="center" style="padding:15px;">
									<h2><font color="">Shop Ragistration
								</td>
							</tr>
							<tr>
								<td>User Name : 
								<td>
									<input type="text" name="unm" onchange="remove()" style="height:20px;width:auto;"/>
								</td>
							</tr>
							<tr>
								<td>Password: </td>
								<td>
									<input type="Password" id="pass" onchange="remove()" name="pass"  style="height:20px;width:auto;"><font color="red">*</font>
								</td>
								<td><h4 id="pass1"></h4></td>
							</tr>
							<tr>
								<td>Confirm Password: </td>
								<td>
									<input type="Password" onchange="remove()" name="cpass" id="cpass" style="height:20px;width:auto;"/>
								</td>
								<td id="cpass1">
								<br>
							</tr>
							<tr>
								<td colspan=3><br><hr color="white"><br>
							</tr>
							<tr>
								<td>Name : 
								<td>
									<input type="text" id="nm" name="nm" onchange="remove()" style="height:20px;width:auto;"/><font color="red">*</font>
								</td>
								<td><h4 id="nm1"></h4></td>
							</tr>
							<tr>
								<td>Shop Name: 
								<td>
									<input type="text" id="snm" name="snm" onchange="remove()" style="height:20px;width:auto;"/><font color="red">*</font>
								</td>
								<td><h4 id="snm1"></h4></td>
							</tr>
							<tr>
								<td>Phone no: 
								<td>
									<input type="number" id="ph" name="ph" style="height:20px;width:auto;"/>
								</td>	
							</tr>
							

							<tr>
								<td>Shop Location : 
								<td><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;select &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">*</font>
								<td><h4 id="locate1"></h4>
							</tr>
							<tr>
								<td>Certificate of physician : 
								<td>
									<font color="red">*</font><input type="file" id="certi" name="certi" />
								</td>
								<td><h4 id="certi1"></h4>
							</tr>
							<tr>
								<td colspan="3" align="center"><br>
									<input type="submit"  name="Ragistraion"  class="btn" onclick="return check()"/>
								</td>
							</tr>	
						</table>
					</div>
				</font>
			</center>
		</form>
	</body>
</html>
<?php
	@$state=$_GET['state'];
?>