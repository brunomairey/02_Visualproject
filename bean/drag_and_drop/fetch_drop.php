<?php
	include('conn.php');
	if(isset($_POST['fetch'])){
		$query=mysqli_query($conn,"select * from product_drop order by dropid desc");
		while($row=mysqli_fetch_array($query)){
			?>
			<div><?php echo $row['product_name'] ?></div>
			<?php
		}
	}

?>