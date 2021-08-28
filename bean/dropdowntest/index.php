<!DOCTYPE html> 
<html lang=eng>
	<head>
	<style>
	html, body{
	width:100%;
	height:100%;
	margin:0%;
	font-family:"helvetica","verdana","calibri", "san serif";
	overflow:hidden;
	padding:0%;
	border:0%;
	}
	 
	</style>
	 		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, target-densitydpi=device-dpi"/>
	
	<title>HTML Form</title>
	
	</head>
<body>
<form action="index.php" method ="post">
Name: 
<input type ="text" name ="name" required>
<br>
E-mail: 
<input type ="email" name ="email" required>
<br>
<input type="submit" value=submit>
</form>
</body>
</html>