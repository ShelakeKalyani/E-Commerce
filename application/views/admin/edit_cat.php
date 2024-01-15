<form action ="<?=base_url()?>admin/save_edited_category"method="post">

	<input type="hidden" name="category_id"value="<?=$category_det[0]['category_id']?>">
	<input type="text" name="category_name"placeholder="category_name"value="<?=$category_det[0]['category_name']?>"><br><br>


	
	<button>update category</button>
</form>