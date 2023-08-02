<?php
	$conn = mysqli_connect("localhost","root" ,"","health_assistant");
	if (!$conn)
	{
		die("<br>Connection failed: " . mysqli_connect_error());
	}
	@session_start();
	//echo "<br>Connected successfully";
?>
	<script src="https://kit.fontawesome.com/11172b164f.js" crossorigin="anonymous"></script>
	