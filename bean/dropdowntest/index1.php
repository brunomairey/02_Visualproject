<!DOCTYPE html> 
<html lang=eng>
	<head>
	<style>
	html, body{
	width: 100%;
	height: 100%;
	margin: 0%;
	font-family:"helvetica", "verdana",  "calibri", "san serif";
	overflow: hidden;
	padding: 0%;
	border: 0%;
	}
	 
	</style>
	 		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, target-densitydpi=device-dpi"/>
	
	<title>HTML Form</title>
	
	</head>
<body>
<?php
if(isset($_POST["submit"])){
echo $_POST["gender"]."<br>";
echo $_POST["cars"]."<br>";
}
else{
?>
<form action="index1.php" method ="post">
<select name=gender>
<option value= Female> Female </option>
<option value= Male> Male </option>
</select><br><br>
<select name=cars>
<option value= Volvo> Volvo </option>
<option value= Mercedes> Mercedes </option>
<option value= Peaugot> Peaugot </option>
<option value= Honda> Honda </option>
</select><br><br>
<input type="submit" value=submit name=submit>
</form>

<?php
}
?>
</body>
</html>