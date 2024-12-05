<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->isChecked();
		$this->data['page_title'] = 'Orders';
		
	}

	
	public function index()
    {
        if(!in_array('createOrder', $this->permission)||
           !in_array('updateOrder', $this->permission)||
           !in_array('deleteOrder', $this->permission)||
           !in_array('viewOrder', $this->permission)) {
            $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin/', 'refresh');
		   }
		$this->data['order_data']  = $this->Model_orders->getOrdersData();
		$this->adn_template('orders/index', $this->data);
	}
    
   
	public function edit($id = null)
	{
		if(!in_array('updateOrder', $this->permission)) {
		 $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin', 'refresh');
		}
		$this->data['page_title'] = 'Confirm Order';

		if($id) {
			if($this->input->post('confirm')) {
                   
                $data = array('confirm' => 1);	
				$update = $this->Model_orders->edit($data, $id);
                
					if($update == true) {
		        		$this->session->set_flashdata('success', 'Order confirmed.');
		        		redirect('orders/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('orders/edit/'.$id, 'refresh');
		        	}

			}
            elseif($this->input->post('reject')) {
                   
                $data = array('confirm' => 2);	
				$update = $this->Model_orders->edit($data,$id);
                
					if($update == true) {
		        		$this->session->set_flashdata('success', 'Order rejected.');
		        		redirect('orders/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('orders/edit/'.$id, 'refresh');
		        	}

			}
			else {
				$this->data['id'] = $id;
				$this->adn_template('orders/edit', $this->data);
			}	
		}
        else
        {
         $this->index();
        }
	}
    
    
     public function view($id = null){
		
         if(!in_array('viewOrder', $this->permission)) {
			 $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('dashboard', 'refresh');
		}
		if($id){
			$order_data = $this->Model_orders->getOrdersData($id);
		    $this->data['order_data'] = $order_data;
			$this->adn_template('orders/view', $this->data);	
		}
		else{
			$this->index();
		}
	}
    
    
    
}
?>