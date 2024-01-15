<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods:GET,POST,PUT,PATCH,DELETE');
header('Access-Control-Allow-Headers: content-type or other');
header('Content-Type: application/json');

$_POST = json_decode(file_get_contents("php://input"),true);

class Api extends CI_Controller
{
	
	public function index()
	{
		
		$data['prod_list']=$this->my_model->select("product");

		echo json_encode($data);
		// $this->ov("view_products",$data);
	}
	public function save_category()
	{
		$this->my_model->insert("category",$_POST);
		echo json_encode(['status'=>'success','message'=>'category added successfully']);
		// redirect(base_url()."admin/add_category");
	}
}