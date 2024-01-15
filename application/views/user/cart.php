<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4>user cart</h4>
			<table class="table table-bordered table-sm">
				<tr>
					<th>SN</th>
					<th>Image</th>
					<th>Name</th>
					<th>Qty</th>
					<th>Rate</th>
					<th>Total</th>
				</tr>
				<?php
				$total = 0;
				foreach($cart_list as $key=>$row)
				{
					?>

				<tr>
					<td><?=$key+1?></td>
					<td>
						<img src="<?=base_url()?>uploads/<?=$row['product_image']?>"width="100px">
					<td><?=$row['product_name']?></td>
					<td width="1%"style="white-space: nowrap">
							<button class="btn btn-primary btn-sm"onclick="dec_qty('<?=$row['user_cart_id']?>')">-</button>
				 		<input type="text"id="my_inp_id<?=$row['user_cart_id']?>" class="btn btn-sm "style="width:50px;"value="<?=$row['qty']?>">
				 		<button class="btn btn-primary btn-sm" onclick="inc_qty('<?=$row['user_cart_id']?>')">+</button>
						
					</td>
					<td>
						<input type="hidden" id="rate_id<?=$row['user_cart_id']?>" value="<?=$row['product_price']?>">
						<?=$row['product_price']?></td>

					<td id="row_ttl<?=$row['user_cart_id']?>"><?=$row['qty']*$row['product_price']?></td>
				</tr>

					<?php
					$total = $total+($row['qty']*$row['product_price']);
				}
				?>
				<tr>
					<th class="text-end" colspan="6">
						<b>Total : &#8377; <?=$total?></b>
					</th>
				</tr>
			</table>
			<div class="text-center">
				<br><br>
				<a href="<?=base_url()?>in/confirm_order">
				<button class="btn btn-primary">confirm order</button>
			</a>
			</div>
			<br><br>
			<br><br>
		</div>
	</div>
</div>





<script type="text/javascript">
	// function dec_qty(user_cart_id)
	// {
	// 	alert(user_cart_id);
	// 	$("#my_inp_id"+user_cart_id).html();

	// }
	function inc_qty(user_cart_id)
	{
		
		// var inp = document.getElementById("my_inp_id"+user_cart_id);
		// $("#my_inp_id"+user_cart_id).val("2");

		$.ajax({
			url:'<?=base_url()?>in/inc_qty',
			type :'POST',
			dataType:'json',
			data : {'user_cart_id':user_cart_id},

		})
		.done(function(res)
		{
		
			// console.log(res);
			$("#my_inp_id"+user_cart_id).val(res['data']['qty']);
			var rate = $("#rate_id"+user_cart_id).val();
			var ttl = rate*res['data']['qty'];
			$("#row_ttl"+user_cart_id).html(ttl);
			console.log(ttl);
			// console.log("success",res['data']['qty']);
		})


		// console.log(inp);

	}

	function dec_qty(user_cart_id)
	{
		
		

		$.ajax({
			url:'<?=base_url()?>in/dec_qty',
			type :'POST',
			dataType:'json',
			data : {'user_cart_id':user_cart_id},

		})
		.done(function(res)
		{
		

			$("#my_inp_id"+user_cart_id).val(res['data']['qty']);
			var rate = $("#rate_id"+user_cart_id).val();
			var ttl = rate*res['data']['qty'];
			$("#row_ttl"+user_cart_id).html(ttl);
			// console.log("success",res['data']['qty']);
		})


		// console.log(inp);

	}
</script>