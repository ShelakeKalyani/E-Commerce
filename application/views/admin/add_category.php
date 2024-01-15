<form action="<?=base_url()?>admin/save_category" method="post">

<div class="container-fluid p-3 bg-white">
	<div class="row">
		<div class="col-md-12">
			<h4>Add new Category</h4>
		</div>

		<div class="col-md-12">
			<label>Enter category name</label>
			<input type="text" name="category_name"class="form-controller">
		</div>

		<div class="col-md-12 mt-3 text-center">
			<button class="btn btn-dark btn-sm ">Save category</button>
		</div>


	</div>
</div>
</form>


<div class="container-fluid p-3 bg-white">

<table class="table table-bordered">
	<tr>
		<th></th>
		<th></th>
		<th>SN</th>
		<th>Category name</th>
	</tr>
	<?php
	foreach($category_list as $key=>$row)
	{
		?>
		<tr>
			<td width="1%">
				<a href="<?=base_url()?>admin/remove_category/<?=$row['category_id']?>"onclick="return confirm('Are you sure...?')">
					<button class="btn btn-danger btn-sm p-2">
						<i class="fa fa-trash"></i>
					</button>
			   </a>
			</td>

			<td width="1%">
				<a href="<?=base_url()?>admin/edit_category/<?=$row['category_id']?>">
					<button class="btn btn-success btn-sm p-2">
						Edit
					</button>
			   </a>
			</td>
		<td><?=$key+1?></td>
		<td><?=$row['category_name']?></td>
	</tr>
	<?php

	}
	?>
</table>
</div>
