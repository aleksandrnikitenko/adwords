<?php
	include "gears.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="wraper">
		<!-- <h1>Введи келючевики и выбери метод</h1> -->
			<form action="index.php" method="POST">
				<textarea type="text" name="keywords"> </textarea> 
				<textarea type="text" name="keywords1"> </textarea> </br>
				<button  name='val' value="concat">concat OK</button> <!-- </br> -->
				<button  name='val' value="replace">replace</button> <!-- </br> -->
				<button  name='val' value="wrap">wrap OK</button> <!-- </br> -->
				<button  name='val' value="filterBy">filterBy OK</button> <!-- </br> -->				
			</form>
	</div>

	<div class="result">
		<?php
			$getData = new Gear;	
		?>
	</div>
</body>
</html>