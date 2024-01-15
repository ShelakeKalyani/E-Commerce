<?php

class Admin extends CI_Controller
{
	protected function ov($filename,$data="")
	{
		$this->load->view("admin/nav");
		$this->load->view("admin/".$filename,$data);
		$this->load->view("admin/footer");
	}

	
	public function index()
	{
		$this->ov('index');
	}

	public function  add_category()
	{
		$data['category_list']=$this->my_model->select("category");
		$this->ov("add_category",$data);
	}
	public function save_category()
	{
		$this->my_model->insert("category",$_POST);
		redirect(base_url()."admin/add_category");
	}
	public function remove_category($category_id)
	{
		$cond=["category_id"=>$category_id];
		$this->my_model->delete("category",$cond);
		
		redirect(base_url()."admin/add_category");
	}

	public function add_product()
	{
		$data['category_list']=$this->my_model->select("category");
		$this->ov("add_product",$data);
		
	}

	protected function upload($key)
	{
		
		$file_name=time().$_FILES[$key]['name'];
	
		move_uploaded_file($_FILES[$key]['tmp_name'],"uploads/".$file_name);
		$_POST[$key]=$file_name;
	}
	public function save_product()
	{
		
		$this->upload("product_image");
		

		$this->my_model->insert("product",$_POST);
		redirect(base_url()."admin/add_product");
	}

    public function edit_category($id)
	{
		$data['category_det']=$this->my_model->edit_category($id);
		$this->load->view('admin/edit_cat',$data);
		}
		
		public function save_edited_category()
		{
			$condition = ['category_id'=>$_POST['category_id']];
			$this->my_model->save_edited_category($condition,$_POST);
			//con tbl data
			redirect(base_url()."admin/add_category");
		}




		public function product_list()
		{
			// $data['products'] = $this->my_model->select("product");
			$data['products']=$this->db->query("SELECT * FROM product,category WHERE category.category_id=product.product_category")->result_array();
			$this->ov("product_list",$data);
		}

		public function remove_product($product_id)
	{
		$cond=["product_id"=>$product_id];
		$this->my_model->delete_product("product",$cond);
		
		redirect(base_url()."admin/product_list");
	}

	 public function edit_product($id)
	{
		$data['product_det']=$this->my_model->edit_product($id);
		$this->load->view('admin/edit_pro',$data);
		}
		public function save_edited_product()
		{
			$condition = ['product_id'=>$_POST['product_id']];
			$this->my_model->save_edited_product($condition,$_POST);
			//con tbl data
			redirect(base_url()."admin/product_list");
		}


	
}
?>