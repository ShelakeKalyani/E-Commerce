<form action ="<?=base_url()?>admin/save_edited_product"method="post"enctype="multipart/form-data">

	<input type="hidden" name="product_id"value="<?=$product_det[0]['product_id']?>">

	<input type="text" name="product_category"placeholder="product_category"value="<?=$product_det[0]['product_category']?>"><br><br>

	<input type="text" name="product_name"placeholder="product_name"value="<?=$product_det[0]['product_name']?>"><br>
	<input type="number" name="product_price"placeholder="product_price"value="<?=$product_det[0]['product_price']?>"><br>
	<input type="number" name="duplicate_price"placeholder="duplicate_price"value="<?=$product_det[0]['duplicate_price']?>"><br>
	<input type="text" name="product_company"placeholder="product_company"value="<?=$product_det[0]['product_company']?>"><br>
	<input type="file" name="product_image"placeholder="product_image"value="<?=$product_det[0]['product_image']?>"><br>


	
	<button>update Product</button>
</form>