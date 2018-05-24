<?php
	include "gears.php";
	//header('location:/index.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Инструменты для работы с ключевыми слвоами | PPC</title>
	<meta name="description" content="инструменты для ключевых слов Adwords" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</head>
<body>

<script type="text/javascript"></script>

	<div class="wraper">
		<h1>Введи келючевики и выбери метод</h1>
			<form action="index.php" method="POST">
				<textarea id="first" type="text" name="keywords"> </textarea> 
				<textarea id="second" type="text" name="keywords1"> </textarea> </br>
				<button  name='val' value="concat">Соединить строки</button> <!-- </br> -->
				<button  name='val' value="replace">заменить символы</button><!--  </br> -->
				<button  name='val' value="wrap">Обернуть в " "</button> <!-- </br> -->
				<button  name='val' value="filterBy">отфильтровать</button> <!-- </br> -->				
			</form>
			</div>

	<div class="result">
	
		<input id="" type="text"></input>
		<textarea id="textInput" value=""><?php $getData = new Gear; ?></textarea>
		<button id="clearButton" onclick="cleartextarea()"> Очистить </button>
	</div>
</body>
</html>