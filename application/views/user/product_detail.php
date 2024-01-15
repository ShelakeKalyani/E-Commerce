<br><br>

<div class="container">
	<div class="row">
		<div class="col-md-5">
			<img src="<?=base_url()?>uploads/<?=$product_det[0]['product_image']?>"width="100%">
		</div>

		<div class="col-md-7">
			<h3><?=$product_det[0]['product_name']?>-<?= dis($product_det[0]['product_price'],$product_det['0']['duplicate_price'])?>
                      		%</h3>
			<h4><del>&#8377;<?=$product_det[0]['duplicate_price']?></del>
				 - &#8377;<?=$product_det[0]['product_price']?>/-</h4>
				 <h5><?=$product_det[0]['product_color']?></h5>


				 <?php 
				 	if(!isset($cart[0]))
				 	{
				 ?>
				 		<a href="<?=base_url()?>in/add_to_cart/<?=$product_det[0]['product_id']?>">
						 <button class="btn btn-dark">Add Cart</button>
						</a>
				 <?php 
				 	}
				 	else 
				 	{
				 		?>
				 		Added in cart
				 		
				 <?php 
				 	}
				 ?>
				 

			
		</div>
	</div>
</div>
<br><br>