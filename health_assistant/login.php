<?php
session_start();
$msg="";
/*if($_SESSION['loginid'])
{
//	unset($_SESSION['loginid']);
	header('location:home.php');
}*/
 //print_r($_SESSION);
 if(@$_SESSION['uexist']==1)
 {
 	$msg="User Id/ Password invalid";
	unset($_SESSION['uexist']);
	//$msg="";
	unset($_SESSION['uexist']);
}
// $r="";
// if(@isset($Ragistration))
// {
// 	if(@$role=="shop")
// 	$r="shop/ragis.php";
// elseif(@$role=="user")
// 	$r="ragic.php";

// }
if(@isset($btnreg))
{
	header("location:login_check.php");
}
?>
<html>
	<head>
		<title>Login </title>
		<style>
			body
{
		
		background-size:110%;
		background-position:center;
}
table{
				margin-top:100;
				padding:40;
				background-color:white;
				font-size:20px;
				border-radius:40px;
			}
input
{
	border-radius:40px;
	height:30;
	width:180;
}

		</style>
		<script>
			function check_role()
			{
				if(document.frm1.role.value=="admin")
				{
					alert("please select role for Ragistration!");
					 document.getElementById("role").focus();		
					 return false;
				}
				else
				{
					var r=document.getElementById('role').value;
					if(r=="user")
					{
						window.location.href = "ragic.php";

					}
					else
					{
						window.location.href = "shop/ragis.php";						
					}
					document.getElementById("ref").value = test;					
				}
			}
			function remove()
			{
				if(document.frm1.id.value!="")
					document.getElementById('id1').innerHTML = "";
				if(document.frm1.pass.value!="")
					document.getElementById('pass1').innerHTML="";
			}
			function check()
			{
				var i=0;
				if(document.frm1.id.value=="")
				{
					document.getElementById('id1').innerHTML = "required";
					i++;
				}
				if(document.frm1.pass.value=="")
				{
					document.getElementById('pass1').innerHTML="required";
					i++;
				}
				if (i>0)
					return false;
			}
		</script>

	</head>
	<body background="images/back1.jpg">
		<form name="frm1" action="login_check.php" method="post">
		<table align="center" cellpadding=7 cellspacing=5>
			<tr>
				<td colspan="3" align="center"> Login
			</tr>
			<tr>
				<td colspan="3"><hr color="orange"/>
			<tr>
			<tr>
				<td>User ID&nbsp;&nbsp;&nbsp;&nbsp;:
				<td>
					<div class="search">
					<select id="role" name="role" class="role" style="border-radius:40px;height:auto;width:auto;background-color:white;">
						<option value="admin">admin</option>
						<option value="user">user</option>
						<option value="shop">shop</option>
					</select>
					<input type="text" id="id" name="id" onchange="remove()"/> <font color="red" size="5">*</font>
				<td id="id1">
				</td>
			</div>
			</tr>
			<tr>
				<td>Password :
				<td ><input type="password" id="pass" name="pass" onchange="remove()" style="width: 250px" /> <font color="red" size="5">*</font>
				<td id="pass1"/>
			</tr>
			<tr>
			
				<td colspan=2 align="center">
				<div class="btn">
					<input type="submit" value="login" style="border-radius:40px;text-transform:uppercase;color:white;font-size:18px;padding:7;margin:10px 0;height:30;width:90;border:none;background:linear-gradient(90deg,#0162c8,#55e7fc);"  onclick="return check()"/>
					<input type="button" style="border-radius:40px;text-transform:uppercase;color:white;font-size:18px;padding:7;margin:10px 0;height:30;width:90;border:none;background:linear-gradient(90deg,#0162c8,#55e7fc);" value="cancel"/>
			    </div>		
				</td>
				
			</tr>
			<tr align="center">
				<td colspan="3"><font color="red" size="5"><?php echo $msg; ?></font>
			</td>
			<tr>
				<td colspan=3 align="center">
					<input type="button" onclick="return check_role()" value="Registration" name="btnreg" style="border-radius:40px;text-transform:uppercase;color:white;font-size:18px;padding:7;margin:10px 0;height:30;width:170;border:none;background:linear-gradient(90deg,#0162c2,#55e7fc);">
					<!-- <font size=6> -->

					<!-- <a onclick="return check_role()" href="" id="ref" name="Ragistration"> -->
						<!-- Ragistration -->
					<!-- </a> -->
			</tr>
		</table>
	
	</form>
	</body>
</html>