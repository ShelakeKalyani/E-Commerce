<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class In extends CI_Controller {

	
	protected function ov($filename,$data="")
	{
		$nav_data['cat_list'] = $this->my_model->select("category");
		if(isset($_SESSION['user_tbl']))
		{
			$nav_data['cart_qty']=count($this->my_model->select_where("user_cart",['user_tbl_id'=>$_SESSION['user_tbl']]));
		}
		$this->load->view("user/nav",$nav_data);
		$this->load->view("user/".$filename,$data);
		$this->load->view("user/footer");
	}

	
	public function index()
	{
		$data['new_products']=$this->my_model->newProducts();
		$this->ov('index',$data);
	}

	public function view_products()
	{
		$cond = ["product_category"=>$_GET['cat_id']];
		$data['prod_list']=$this->my_model->select_where("product",$cond);

		$this->ov("view_products",$data);
	}

	public function product_detail($product_id)
	{
		// echo $product_id;
		$cond = ["product_id"=>$product_id];
		$data['product_det']=$this->my_model->select_where("product",$cond);

		if(isset($_SESSION['user_tbl']))
		{
			$cond = ["product_id"=>$product_id,"user_tbl_id"=>$_SESSION['user_tbl']];
			$data['cart'] = $this->my_model->select_where("user_cart",$cond);	
		}
		

		$this->ov("product_detail",$data);
	}

	public function login()
	{
		$this->ov("login");
	}

	public function register_user()
	{

		$this->my_model->insert("user_tbl",$_POST);
		redirect(base_url()."in/login");
	}

	public function login_process()
	{
		$cond = ["usermobile"=>$_POST["email_mobile"],"password"=>$_POST["password"]];
		$loginbymobile = $this->my_model->select_where("user_tbl",$cond);

		
	

		if(!isset($loginbymobile[0]))
		{
			//not by mobile try by email
		$cond = ["useremail"=>$_POST['email_mobile'],"password"=>$_POST['password']];
		$loginbyemail = $this->my_model->select_where("user_tbl",$cond);
		$login_data = $loginbyemail;
		}
		else
		{
			//by mobile
			$login_data = $loginbymobile;
		}

		if(isset($login_data[0]))
		{
			
			$_SESSION['user_tbl']=$login_data[0]['user_tbl'];
			$_SESSION['username']=$login_data[0]['username'];
			
			redirect(base_url());
		}
		else
		{
			// echo "Login Failed";
			redirect(base_url()."in/login");
		}
	}

	public function logout()
	{
		session_destroy();
		redirect(base_url());
	}

	public function add_to_cart($product_id)
	{
		// echo"<br>";
		// echo "Product -".$product_id;
		// echo "<br>";
		// echo "User -".$_SESSION['user_tbl'];
		// echo "<br>";
		// echo "Qty-1";
		// user cart->product_id,user_tbl,qty


		if(isset($_SESSION['user_tbl']))
		{
			$data = [
				"product_id"=>$product_id,
				"user_tbl_id"=>$_SESSION['user_tbl'],
				"qty"=>1
		];
		$cond = ["product_id"=>$product_id,"user_tbl_id"=>$_SESSION['user_tbl']];
		$cart = $this->my_model->select_where("user_cart",$cond);

		if(!isset($cart[0]))
		{
			$this->my_model->insert("user_cart",$data);	
		}
	// history.back();

		redirect(base_url()."in/product_detail/".$product_id);
		}

		else
		{
			redirect(base_url()."in/login");
		}
		
	}

	public function cart()
	{
		$data['cart_list']=$this->my_model->cart_data();
		$this->ov("cart",$data);
	}

	public function inc_qty()
	{
		// $_POST['user_cart_id'];
		$this->my_model->inc_qty($_POST['user_cart_id']);
		// $res=["status"=>"success"];
		$data = $this->my_model->select_where("user_cart",["user_cart_id"=>$_POST['user_cart_id']])[0];

		$res=["status"=>"success","data"=>$data];
		echo json_encode($res);
	}

	public function dec_qty()
	{
		// $_POST['user_cart_id'];
		$data = $this->my_model->select_where("user_cart",["user_cart_id"=>$_POST['user_cart_id']])[0];
		if($data['qty']>1)
		{
			$this->my_model->dec_qty($_POST['user_cart_id']);

		}		
				
				$res=["status"=>"success"];
				$data = $this->my_model->select_where("user_cart",["user_cart_id"=>$_POST['user_cart_id']])[0];

				$res=["status"=>"success","data"=>$data];
				echo json_encode($res);
	}


	public function confirm_order()
	{
		$data['cart_list']=$this->my_model->cart_data();
		$this->ov("confirm_order",$data);
	}

	public function place_order()
	{
		$cart_data=$this->my_model->cart_data();

		$ttl = 0;
		foreach ($cart_data as $key => $row)
		 {
		 	$ttl = $ttl+$row['qty']*$row['product_price'];
			
		}
		
		$_POST['user_tbl_id']=$_SESSION['user_tbl'];
		$_POST['customer_name']=$_SESSION['username'];
		$_POST['order_date']=date('Y-m-d');
		$_POST['order_amt']=$ttl;
		$_POST['order_status']="pending";
		$order_tbl_id = $this->my_model->insert("order_tbl",$_POST);
		
		foreach ($cart_data as $key => $row)
		 {
		 	// $order_products['order_tbl_id']=$order_tbl_id;
		 	$order_products['product_id']=$row['product_id'];
		 	$order_products['qty']=$row['qty'];
	 	 	$order_products['product_name']=$row['product_name'];
 	 	 	$order_products['product_price']=$row['product_price'];
 	 	 	$order_products['product_company']=$row['product_company'];
		 	$order_products['product_color']=$row['product_color'];
		 	$order_products['product_details']=$row['product_details'];
		 	$order_products['product_image']=$row['product_image'];
		 	$this->my_model->insert("order_product_tbl",$order_products);
		 }
		 $this->my_model->delete("user_cart",['user_tbl_id'=>$_SESSION['user_tbl_id']]);
		 redirect(base_url()."in/track_order/".$order_tbl_id);
		 
    }

    public function track_order($order_tbl_id)
    {
    	// echo $order_tbl_id;
    }
}
?>


