

<div class="container-fluid bg-white p-3">
	<div class="row">
		<div class="col-md-12">
			<h4>Product list</h4>
			
		</div>

		<div class="col-md-12">
			<table class="table table-sm table-bordered">
				<tr>
					<th>Action</th>
					<th>SN</th>
					<th> Product category</th>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Product Duplicate price</th>
					<th>Product Company</th>
					<th>Product image</th>
				</tr>

				<?php
				foreach($products as $key=>$row)
					{?>


					<tr>
						<td width="1%">
							<a href="<?=base_url()?>admin/remove_product/<?=$row['product_id']?>"onclick="return confirm('Are you sure...?')">
								<button class="btn btn-danger btn-sm p-2">
									<i class="fa fa-trash"></i>
								</button>
			   				</a>

			   				<a href="<?=base_url()?>admin/edit_product/<?=$row['product_id']?>">
									<button class="btn btn-primary btn-sm "><i class="fa fa-edit"></i></button>
			  				 </a>

			   				
						</td>

						
					<td><?=$key+1?></td>
					<td><?=$row['category_name']?></td>
					<td><?=$row['product_name']?></td>
					<td><?=$row['product_price']?></td>
					<td><?=$row['duplicate_price']?></td>
					<td><?=$row['product_company']?></td>
					<td>
						<img src="<?=base_url()?>uploads/<?=$row['product_image']?>"style="width:100px;height:auto;border-radius: 0px;">


						
					</td>
				</tr>

						<?php
					}
					?>



			</table>
			
		</div>
	</div>
	</div>
<!-- </div> -->