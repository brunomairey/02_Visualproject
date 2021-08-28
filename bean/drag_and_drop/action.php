<?php  
	include('conn.php');	
	if(isset($_POST['action'])){  
		$id=$_POST['id'];
		$name=$_POST['name'];
		
		mysqli_query($conn,"insert into product_drop (productid, product_name) values ('$id', '$name')");
		
	}  
?>  