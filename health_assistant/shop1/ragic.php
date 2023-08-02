<?php
	include 'conn.php';
	extract($_REQUEST);
	if(isset($Ragistraion))
	{
		 //background-color:#183C65;
		 //,lnm,gen,age,gmail,blod_grup,disease
		 //,'$fnm','$lnm',$gen,$age,'$gmail','$blod_grup','$disease'
		$q="insert into user(usernm,pass) values('$unm','$pass')";
		if(mysqli_query($conn,$q))
		{
			$q="select id from user where usernm='$unm' and pass='$pass'";
			$res=mysqli_query($conn,$q);
			if(mysqli_num_rows($res)>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
					echo $row["id"];
					@session_start();
					$_SESSION['cid']=$row["id"];
					echo $_SESSION['cid'];
				}
					
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Helth Assistant/Customer Ragistration</title>
	<link rel="stylesheet" href="css/ragi.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<script>
		function check()
		{
			/*if(document.getElementById("blod_grup_A").checked ==false or document.getElementById("blod_grup_B").checked ==false or document.getElementById("blod_grup_BM").checked ==false or document.getElementById("blod_grup_OP").checked ==false or document.getElementById("blod_grup_OM").checked ==false or document.getElementById("blod_grup_AB").checked ==false )
			{
				alert("hi");
				return false;
			}*/
				let result = "required".fontcolor("red");
			
				if(document.frm1.pass.value=="")
				{
					document.getElementById("pass1").innerHTML = "password ".fontcolor("red") + result;
				}
				if(document.frm1.pass.value!=document.frm1.cpass.value)
				{
					document.getElementById("cpass1").innerHTML = "password And Confirm Password Must Match".fontcolor("red") ;
				}

			
				return false;
		}
	</script>
</head>
<body>
	<form id="frm1" method="post" action="home.php">
		<center>	

				<div class="head">
					<img src="images/logo.png" alt="Health Assistant" height="75"/>&nbsp;&nbsp;&nbsp;
					<img src="images/delivery.jpg" alt="fast Access to needed madicine" height="60" />&nbsp;&nbsp;&nbsp;
					<img src="images/patient.png" alt="to you" height="75"/>&nbsp;&nbsp;&nbsp;
				</div>

				<font color="blue" size="5">
				Let's get fast madicine to needed madicine</font>
				<div class="c">
			<table cellspacing="3px" cellpadding="3px">
		<tr>
			<td colspan="3" align="center">Ragistraion</td>
		</tr>
		<tr>
			<td colspan="3"><hr color="white"></td>
		</tr>
		<tr>
			<td>User Name: </td>
			<td>
				<input type="textbox" name="unm" style="height:20px;width:auto;"/>
			</td>
			<td id="unm1"></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td>
				<input type="Password" name="pass" style="height:20px;width:auto;"><font color="red">*</font>
			</td>
			<td id="pass1"></td>
		</tr>
		<tr>
			<td>Confirm Password: </td>
			<td>
				<input type="Password" name="cpass" style="height:20px;width:auto;"/>
			</td>
			<td id="cpass1">
			<br>
		</tr>
		<tr>
			<td colspan="3">
				<center>
				<a href="#" class="active"><i class="fa fa-google"></i></a>
				<a href="#" class="active"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a href="#" class="active"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				</center>
			</td>
		</tr>
		<tr>
			<td colspan="3"><hr color="white"></td>
		</tr>
		<tr>
			<td colspan="3">
				Personal Informaiton
			</td>
		</tr>
		<tr>
			<td>First Name: </td>
			<td>
				<input type="textbox" name="fnm" style="height:20px;width:auto;"/><font color="red">*</font>
			</td>
		</tr>
		<tr>
			<td>Last Name: </td>
			<td>
				<input type="textbox" name="lnm" style="height:20px;width:auto;"/>
			</td>
		</tr>
		<tr>
			<td>Gender: </td>
			<td>
				<input type="radio" name="gen" value=0>Male
				<input type="radio" name="gen" value=1>Female
				<font color="red">*</font>
			</td>
		</tr>
		<tr>
			<td>age:</td>
			<td><input type="number" name="age" style="height:20px;width:auto;"/><font color="red">*</font>
			</td>
		</tr>
		<tr>
			<td>Blood Group</td>
			<td>
				<input type="radio" name="blod_grup" id="blod_grup_A" style="height:20px;width:auto;">A
				<input type="radio" name="blod_grup" id="blod_grup_AB" style="height:20px;width:auto;">AB-
				<input type="radio" name="blod_grup" id="blod_grup_B" style="height:20px;width:auto;">B+<br>
				<input type="radio" name="blod_grup" id="blod_grup_BM" style="height:20px;width:auto;">B-
				<input type="radio" name="blod_grup" id="blod_grup_OP" style="height:20px;width:auto;">O+
				<input type="radio" name="blod_grup" id="blod_grup_OM" style="height:20px;width:auto;">O-
				&nbsp;&nbsp;<font color="red">*</font>
			</td>
			<td id="blod_grup1">
		</tr>
		<tr>
			<td>
				disease:
			</td>
			<td>
				<input type="textbox" name="disease" style="height:20px;width:auto;"/>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<input class="btn" type="submit"  name="Registration" onclick="return check()" value="Registration">
				
			</td>
		</tr>
	</table>
	</div>
</center>

</form>
</body>
</html>