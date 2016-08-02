<?php
include 'Main.php';
?>
<html>
<head>
<title>Game 2048</title>
<style type="text/css">
body {
	font-family: "Consolas";
}

table, td {
	font-size: 9px;
	border: 1px solid #2EF;
}

td {
	color: #900;
}
</style>
</head>
<body>
<?php
if (! isset($_GET['mtr'])) {
    $mtr = Main::initial();
} else {
    $mtr = json_decode($_GET['mtr']);
    $dirct = $_POST[ 'method'];
    $mtr = Main::move($mtr, $dirct);   
}
Main::display($mtr);
?>
<form method="post"<?php echo 'action="index.php?mtr='.json_encode($mtr).'"'?>>
		<select name="method">
			<option value=-2>Up</option>
			<option value=-1>Down</option>
			<option value=2>Left</option>
			<option value=1>Right</option>
		</select> <input type="submit" value="Submit">
	</form>
</body>
</html>