<br><br>
<form action="<?=base_url()?>in/place_order"method="post">
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h4>Order Address</h4>
			<div class="row">
				<div class="col-md-6">
						Enter Country
						<input type="text" name="country"class="form-control">
				</div>
			<div class="col-md-6 mb-2">
				Enter State
				<input type="text" name="state"class="form-control">
			</div>
			<div class="col-md-6 mb-2">
				Enter Dist
				<input type="text" name="dist"class="form-control">
			</div>
			<div class="col-md-6 mb-2">
				Enter City
				<input type="text" name="city"class="form-control">
			</div>
			<div class="col-md-6 mb-2">
				Enter Village
				<input type="text" name="village"class="form-control">
			</div>
			<div class="col-md-6 mb-2">
				Enter Area
				<input type="text" name="area"class="form-control">
			</div>
			<div class="col-md-6 mb-2">
				Enter Landmark
				<input type="text" name="landmark"class="form-control">
			</div>
			<div class="col-md-6 mb-2">
				Enter Appartment/House no
				<input type="text" name="apartment_house"class="form-control">
			</div>
			<div class="col-md-6 mb-2">
				Enter Pincode
				<input type="text" name="pincode"class="form-control">
			</div>
			<div class="col-md-6 mb-2">
				Enter Mobile no
				<input type="text" name="mobile_no"class="form-control">
			</div>
</div>
		</div>
		<div class="col-md-6">
			<h4>Order Products</h4>
			<table class="table table-sm">
				<?php
				$ttl =0;
				foreach($cart_list as $key=>$row)
				{
					
					?>
					<tr>
						<td><?=$key+1?></td>
						<td><?=$row['product_name']?></td>
						<td class="text-end"><?=$row['qty']?>qty</td>
						<td class="text-end">&#8377;<?=$row['product_price']?>/-</td>
						<td class="text-end">&#8377;<?=$row['qty']*$row['product_price']?></td>
					</tr>
				<?php
				$ttl = $ttl+($row['qty']*$row['product_price']);
			    }
			   
				?>
				
					<tr>
						<th class="text-end"colspan="5">
							<h5> Total:&#8377;<?=$ttl?>/-</h5></th>
					</tr>

			</table>
			<br>
			<h4>Payment Option</h4>
			<br>
				<input type="radio" name="payment_method"value="Online"checked>Online Payment
				<br>
				<input type="radio" name="payment_method"value="COD">Cash on Delivery
				<br><br>

		</div>
		<div class="col-md-12">
			<br>
			<button class="btn btn-primary">Place Order</button>
			<br>
		</div>
	</div>
</div>
</form>
<br><br>

