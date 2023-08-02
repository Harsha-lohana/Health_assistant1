<?php
		include '../conn.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	.all{
    background-color: transparent;
	}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color: transparent;

}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
h1{

}
a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<div class="all" >
<h2 style="text-align:center">User Profile Card</h2>

<div class="card" >
  <img src="../images/user.png" style="width:100%">
  <?php
  		$sid=$_SESSION['id1'];
   $q="select * from shop where id='$sid'";
	 $res=mysqli_query($conn,$q);
	 if (mysqli_num_rows($res) > 0)
	 {
	 	while($row = mysqli_fetch_assoc($res)) 
	 	{
	 		?>
  		<h1><?php echo $row['sknm']; ?></h1>
  <p class="title"><?php echo $row['usernm']."<br>";}} ?></p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  <p><button>View</button></p>
</div>
</div>
</body>
</html>
