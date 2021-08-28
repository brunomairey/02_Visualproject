<!DOCTYPE html> 
<html lang=eng>
	<head>
	<style>
	html, body{
	width: 100%;
	height: 100%;
	margin: 0%;
	font-family: "helvetica", "verdana",  "calibri", "san serif";
	overflow: hidden;
	padding: 0%;
	border: 0%;
	}
	 
	</style>
	 		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, target-densitydpi=device-dpi"/>
	
	<title> HTML Form </title>
	
	</head>
<body>
<?php
if(isset($_POST["submit"])){
echo "<p>Your Selection Are: </p>";
echo $_POST["gender"] . "<br>";
if(isset($_POST["cars"])){
echo "<h3>The Cars You Selected Are: </h3>";
foreach($_POST["cars"] as $car)
echo $car ."<br>";
}
if(isset($_POST["name"])){
echo "<h3>The Names You Selected Are: </h3>";
foreach($_POST["name"] as $name)
echo $name ."<br>";
}

}
else{
?>
<form action="index2.php" method ="post">
<select name=gender>
<option value= Female> Female </option>
<option value= Male> Male </option>
</select><br><br>
<select name=cars[] multiple="mutiple" size="3">
<option value= Volvo> Volvo </option>
<option value= Mercedes> Mercedes </option>
<option value= Peaugot> Peaugot </option>
<option value= Honda> Honda </option>
</select><br><br>

<select name=name[] multiple="mutiple" size="3">
<option value= Kelvin> Kelvin </option>
<option value= John> John </option>
<option value= Ken> Ken </option>
<option value= Francis> Francis </option>
</select><br><br>

<input type="submit" value=submit name=submit>
</form>

<?php
}
?>
</body>
</html>