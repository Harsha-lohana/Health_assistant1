<?php
	include 'conn.php';
	extract($_REQUEST);
	print_r($_REQUEST);
	//echo "ok".$_GET[$state];	
	//echo $_SESSION['role'];
	if(@$state=="shop")
	{
		echo "hello";
		//header("Location:shop/ragis.php");
	
	}
//	echo $gen;
	if(@isset($Registration))
	{
//		echo $gen;		
		/*$q="insert into user(usernm,pass) values('$unm','$pass')";*/
			$q="insert into user(usernm,pass,fnm,lnm,gen,age,disease) values('$unm','$pass','$fnm','$lnm',0,$age,'$disease')";
		if(mysqli_query($conn,$q))
		{
			echo "hi";
			$q="select id from user where usernm='$unm' and pass='$pass'";
			$res=mysqli_query($conn,$q);
			if (mysqli_num_rows($res) > 0) 
			{
				while($row = mysqli_fetch_assoc($res)) 
				{
					@session_start();
					$_SESSION['id1']=$row["id"];
				}
			}	
		}
		if (isset($_SESSION['id1']))
		{
			$_SESSION['loginid1']=1;
			$_SESSION['c']=1;
			header("location:home.php");
		}
	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Helth Assistant/Customer Ragistration</title>
	<link rel="stylesheet" href="css/ragi.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<style>
		
{
	

}
body{
	font-family: roboto;
}

.c{
	
	background-position:center;
	background-size:100%;
color: black;
	background:radial-gradient(#e8eae7,#e8eae7);
	padding: 10px;
	margin:30px; 
	justify-content:space-around;
	width: 500px;
	border-radius: 40px;
}

.c a
{
	color: black;
	size:20px;
}
.c i
{
	height: 10px;
	width: 15px;
	padding: 10px;
	
}

.btn
{
	padding:10px;
	border-radius:40px;
	text-transform:uppercase;
	color:white;
	font-size:18px;
	padding:7;
	margin:10px 0;
	height:30;
	width:auto;
	border:none;
	background:linear-gradient(90deg,#0162c8,#55e7fc);
	box-shadow: 5px 5px #808080;
}
.head 
{

}
.btn:hover
{	
	height:40px;
	width: 200px;
	background-color:white;
	display:inline-block;
}

	</style>
	<script>
			/*if(document.getElementById("blod_grup_A").checked ==false or document.getElementById("blod_grup_B").checked ==false or document.getElementById("blod_grup_BM").checked ==false or document.getElementById("blod_grup_OP").checked ==false or document.getElementById("blod_grup_OM").checked ==false or document.getElementById("blod_grup_AB").checked ==false )
			{
				alert("hi");
				return false;
			}*/
				/*function remove()
			{
				if(document.frm1.pass.value==document.frm1.cpass.value)
					document.getElementById('cpass1').innerHTML = "";
				if(document.frm1.pass.value!="")
					document.getElementById('pass1').innerHTML = "";
				if(document.frm1.nm.value!="")
					document.getElementById('nm1').innerHTML = "";
				if(document.frm1.snm.value!="")
					document.getElementById('snm1').innerHTML="";
				if(document.frm1.location.value!="")
					document.getElementById('locate').innerHTML = "";
				if(document.frm1.certi.value!="")
					document.getElementById('certi1').innerHTML = "";
			}*/
			function check()
			{
				var i=0;
				let result = "required".fontcolor("red");

				/*if(document.frm1.pass.value=="")
				{
					alert(i);
					document.getElementById("pass1").innerHTML = "password ".fontcolor("red") + result;
					i++;
				}
				alert(i);
				if(document.frm1.pass.value!=document.frm1.cpass.value)
				{
					document.getElementById("cpass1").innerHTML = "password And Confirm Password Must Match".fontcolor("red") ;
					i++;
				}*/

alert(		document.frm2.fnm.value);
alert(i);
				if(document.frm2.fnm.value=="")
				{
					
				/*	document.getElementById("fnm1").innerHTML = "shop owner ".fontcolor("red") + result;
					i++;*/
				}
				/*if(document.frm1.age.value=="")
				{
					document.getElementById("age1").innerHTML = "shop name ".fontcolor("red") + result;
					i++;
				}*/
				if(i>0)
				{

					return false;
				}
				
				return true;
				
			}

			
		
		
	</script>
</head>
<body>
	<form id="frm2" method="post" action="">
		<center>	

				<div class="head">
					<img src="images/logo.png" alt="Health Assistant" height="75"/>&nbsp;&nbsp;&nbsp;
					<img src="images/delivery.jpg" alt="fast Access to needed madicine" height="60" />&nbsp;&nbsp;&nbsp;
					<img src="images/patient.png" alt="to you" height="75"/>&nbsp;&nbsp;&nbsp;
				</div>

				<font color="blue" size="5">
				Let's get fast Medicine to needed Patient</font>
				<div class="c">
			<table cellspacing="3px" cellpadding="3px">
		<tr>
			<td colspan="3" align="center"><font size="5">
			Registration</td>
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
				<input type="Password" name="pass" id="pass" style="height:20px;width:auto;">
			</td>
			<td id="pass1"></td>
		</tr>
		<tr>
			<td>Confirm Password: </td>
			<td>
				<input type="Password" id="cpass" name="cpass" style="height:20px;width:auto;"/>
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
				<input type="textbox" name="fnm" id="fnm" style="height:20px;width:auto;"/>
			</td>
			<td id="fnm1"></td>
		</tr>
		<tr>
			<td>Last Name: </td>
			<td>
				<input type="textbox" name="lnm" id="lnm" style="height:20px;width:auto;"/>
			</td>
			<td id="lnm1"></td>
		</tr>
		<tr>
			<td>Gender: </td>
			<td>
				<input type="radio" name="gen" value=0>Male
				<input type="radio" name="gen" value=1 checked>Female
				
			</td>
		</tr>
		<tr>
			<td>age:</td>
			<td><input type="number" name="age" id="age" style="height:20px;width:auto;"/>
			</td>
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