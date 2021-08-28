<!DOCTYPE html>  
<html>  
    <head>  
        <title>Drag, Drop and Insert into Database using AJAX/jQuery</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <style>  
           .product_drag_area{  
                width:350px;  
                height:350px;  
                border:2px dashed #ccc;  
                color:#ccc;  
                line-height:200px;  
                text-align:center;  
                font-size:24px;  
           }  
           .product_drag_over{  
                color:#000;  
                border-color:#000;  
           }  
        </style>  
      </head>  
      <body>  
        <div class="container">
			<div style="height: 30px;"></div>
			<div class="well">
                <h3 align="center" style="color: blue">Drag, Drop and Insert into Database using AJAX/jQuery</h3>
				<div style="height: 20px;"></div>
				<div class="row">
                <?php
				include('conn.php');
				$query=mysqli_query($conn,"select * from product");
				while($row=mysqli_fetch_array($query)){
					?>
					<div class="col-lg-4">  
                     <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; cursor:move" align="center">  
                          <img src="<?php echo $row['photo']; ?>" data-id="<?php echo $row['productid']; ?>" data-name="<?php echo $row['product_name']; ?>" class="img-responsive product_drag" style="height:220px; width:150px;">  
                          <h4 class="text-info"><?php echo $row['product_name']; ?></h4>   
                     </div>  
					</div>  
					<?php
					
				}  
                ?>  
				</div>
                <div style="clear:both"></div> 
				<div style="height:20px"></div> 
				<div class="row">
					<div class="col-lg-4">  
						<div class="product_drag_area">Drop Product Here</div>  
					</div>
					<div class="col-lg-4">  
						<span style="font-size: 25px;"><strong>Drop Products:</strong></span>
						<div style="height:10px"></div> 
						<div id="dragable_product_order"></div>
					</div>
				</div>
			</div>
        </div> 
      </body>  
 </html>  
 <script>  
	$(document).ready(function(data){ 

		showDrop();
		
		$('.product_drag_area').on('dragover', function(){  
			$(this).addClass('product_drag_over');  
			return false;  
		});  
		$('.product_drag_area').on('dragleave', function(){  
			$(this).removeClass('product_drag_over');  
			return false;  
		});  
		$('.product_drag').on('dragstart', function(e){  
			e.originalEvent.dataTransfer.setData('productid', $(this).data('id')); 
			e.originalEvent.dataTransfer.setData('productname', $(this).data('name')); 		   
		});  
		$('.product_drag_area').on('drop', function(e){  
			e.preventDefault();  
			$(this).removeClass('product_drag_over');  
			var id = e.originalEvent.dataTransfer.getData('productid'); 
			var name = e.originalEvent.dataTransfer.getData('productname');	
			$.ajax({  
                url:"action.php",  
                method:"POST",  
                data:{
					id:	id,
					name: name,
					action: 1,
				},  
                success:function(){  
                    showDrop(); 
                }  
			})  
		});  
	}); 
	
	function showDrop(){
		$.ajax({  
            url:"fetch_drop.php",  
            method:"POST",  
            data:{
				fetch: 1,
			},  
            success:function(data){  
                $('#dragable_product_order').html(data);  
            }  
		})
	}
 </script> 