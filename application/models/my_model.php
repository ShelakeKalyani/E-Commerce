<?php
class my_model extends CI_model
{
	function insert($tname,$data)
	{
		$this->db->insert($tname,$data);
		return $this->db->insert_id();
	}
	function select($tname)
	{
		return $this->db->get($tname)->result_array();
	}

		function select_where($tname,$cond)
	{
		return $this->db->where($cond)->get($tname)->result_array();
	}

	function delete($tname,$cond)
	{
		 $this->db->where($cond)->delete($tname);
	}

	function delete_product($tname,$cond)
	{
		 $this->db->where($cond)->delete($tname);
	}

	function edit_category($id)
	{
		$condition = ['category_id'=>$id];
		return $this->db->where($condition)->get('category')->result_array();
	}
	function save_edited_category($condition,$data)
	{
		$this->db->where($condition)->update('category',$data);
	}

	function edit_product($id)
	{
		$condition = ['product_id'=>$id];
		return $this->db->where($condition)->get('product')->result_array();
	}
	function save_edited_product($condition,$data)
	{
		$this->db->where($condition)->update('product',$data);
	}

	function newProducts()
	{
		return $this->db->query("SELECT * FROM product ORDER BY product_id DESC limit 8")->result_array();
	}


	function cart_data()
	{
		return $this->db->query("SELECT * FROM user_cart,product WHERE user_cart.product_id=product.product_id AND  user_tbl_id = '".$_SESSION['user_tbl']."'")->result_array();
	}

	function inc_qty($user_cart_id)
	{
		$this->db->query("UPDATE user_cart SET qty=qty+1 WHERE user_cart_id='".$user_cart_id."'");
		// console.log($user_cart_id);
	}

	function dec_qty($user_cart_id)
	{
		$this->db->query("UPDATE user_cart SET qty=qty-1 WHERE user_cart_id='".$user_cart_id."'");
			// console.log($user_cart_id);
	}

	function create_table($tname,$arr)
	{
		$sql = "CREATE TABLE ".$tname."(".$tname."_id int auto_increment primary key";
			foreach($arr as $key=>$value){
				$sql.=",".$key."text";
			}
			$sql.=");";
			return($this->db->query($sql));
	}


	
}
?>


 