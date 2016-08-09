<?php
include 'php/Main.php';
?>
<html>
	<head>
		<title>Game 2048</title>
		<style type="text/css">body {
	font-family: "Consolas";
}

table {
	width: 500px;
	height: 500px;
	font-size: 20px;
	border: 1px solid #2EF;
}

#display {
	border: 4px solid aquamarine;
}

td {
	font-size: 35px;
	color: #900;
}</style>
		<data id="data"></data>
		<script src="js/key-listener.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/ajax-functions.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			document.onkeydown = keyDown;
		</script>
	</head>
	<body>
		<div align="center" id="display">
			<img src="img/ajax-loader.gif" id="loader"> 
			<table>
			<tr>
				<td id="0,0"></td>
				<td id="0,1"></td>
				<td id="0,2"></td>
				<td id="0,3"></td>
			</tr>
			<tr>
				<td id="1,0"></td>
				<td id="1,1"></td>
				<td id="1,2"></td>
				<td id="1,3"></td>
			</tr>
			<tr>
				<td id="2,0"></td>
				<td id="2,1"></td>
				<td id="2,2"></td>
				<td id="2,3"></td>
			</tr>
			<tr>
				<td id="3,0"></td>
				<td id="3,1"></td>
				<td id="3,2"></td>
				<td id="3,3"></td>
			</tr>
			</table>
		</div>
	</body>
</html>