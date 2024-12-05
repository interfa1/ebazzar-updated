<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->isChecked();
		$this->data['page_title'] = 'Products';
		
	}

	
	public function index()
    {
        if(!in_array('createProduct', $this->permission)||
           !in_array('updateProduct', $this->permission)||
           !in_array('deleteProduct', $this->permission)||
           !in_array('viewProduct', $this->permission)) {
            $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin/', 'refresh');
		   }

        
		$product_data = $this->Model_products->getProductData();
	    $this->data['products_data'] = $product_data;
		$this->adn_template('products/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createProduct', $this->permission)) {
			 $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin', 'refresh');
		}

            $this->form_validation->set_rules('category[]', 'Category', 'required');
	       $this->form_validation->set_rules('name[]', 'Product name', 'trim|required');
		  $this->form_validation->set_rules('price[]', 'Price', 'trim|required');
		  $this->form_validation->set_rules('qty[]', 'Quantity', 'trim|required');
		  $this->form_validation->set_rules('description[]', 'Description', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            
             $files = $_FILES;
            
             $count_name = count($this->input->post('name'));
    		for($x = 0; $x < $count_name; $x++) {
                
             $config = array();
             $config['upload_path'] = 'assets/images/products';
             $config['file_name'] =  uniqid();
             $config['allowed_types'] = 'gif|jpg|png|jpeg';
             $config['max_size'] = '1000';
             $this->load->library('upload');
                
        $_FILES['picture']['name']= $files['picture']['name'][$x];
        $_FILES['picture']['type']= $files['picture']['type'][$x];
        $_FILES['picture']['tmp_name']= $files['picture']['tmp_name'][$x];
        $_FILES['picture']['error']= $files['picture']['error'][$x];
        $_FILES['picture']['size']= $files['picture']['size'][$x];    

        $this->upload->initialize($config);
        $this->upload->do_upload('picture');
        $type1 = explode('.', $files['picture']['name'][$x]);
        $type = end($type1);
        $path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;           
        $data = array(
        		'name' => $this->input->post('name')[$x],
        		'price' => $this->input->post('price')[$x],
        		'qty' => $this->input->post('qty')[$x],
        		'category' => $this->input->post('category')[$x],
				'description' => $this->input->post('description')[$x],
                'image' => $path,
                'user_id' => $_SESSION['id']
        	);
//            var_dump($data);
//            die();
        	$create = $this->Model_products->create($data);
            }
        	if($create == true) {
        		$this->session->set_flashdata('success', 'product created successfully');
                
        		redirect('products/', 'refresh');
        	}
            else {
                $this->data['page_title'] = 'Create Product';
        		$this->session->set_flashdata('error', 'error occurred while creating product!!');
        		redirect('products/create', 'refresh');
        	}
        
        }
        else {
           	
            $this->data['page_title'] = 'Create Product';
			
			$product_data = $this->Model_products->getProductData();
			$this->data['product_data'] = $product_data;
            
    $this->data['cat_data'] = $this->Model_products->getCategoryData();
		    
			
            $this->adn_template('products/create', $this->data);
        }	
  }

	
    
     public function upload_image()
    {
    	// assets/images/product_image
        $config['upload_path'] = 'assets/images/products';
        $config['file_name'] =  uniqid();
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1000';

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('picture'))
        {
            $error = $this->upload->display_errors();
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['picture']['name']);
            $type = $type[count($type) - 1];
            
            $path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;
            return ($data == true) ? $path : false;            
        }
    } 
    
	public function edit($id = null)
	{
        
        if(!in_array('updateProduct', $this->permission)) {
			 $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin', 'refresh');
		}


		if($id) {
			$this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('name', 'Product name', 'trim|required');
		    $this->form_validation->set_rules('price', 'Price', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
                if(empty($_FILES['picture']['name']))
//           if(null!=($this->input->post('stud_pic')))
           {
            $upload_image= $this->input->post('old_pic');
//                        $upload_image= $this->upload_image();

           }
           else 
           {
//                $upload_image= $this->input->post('old_pic');
              $old_data = $this->Model_products->getProductData($id);
              $old_pic = $old_data['image'];
              unlink($old_pic);
            $upload_image= $this->upload_image();
           }

                    $data = array(
        		'name' => $this->input->post('name'),
        		'price' => $this->input->post('price'),
        		'category' => $this->input->post('category'),
				'description' => $this->input->post('description'),
                'image' => $upload_image
        	);

					
						 
					
					$update = $this->Model_products->edit($data, $id);
					if($update == true)
							{
								$this->session->set_flashdata('success', 'Successfully updated');
								redirect('products/', 'refresh');
							}
							else 
							{
								$this->session->set_flashdata('error', 'Error occurred!!');
								redirect('products/edit/'.$id, 'refresh');
							}
					 
							       
	        }
	        else {
	            // false case
	        	$product_data = $this->Model_products->getProductData($id);
                
	        	$this->data['product_data'] = $product_data;

				$this->adn_template('products/edit', $this->data);	
	        }	
		}	
	}

	public function delete($id)
	{
		if(!in_array('deleteProduct', $this->permission)) {
		 $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin', 'refresh');
		}
		$this->data['page_title'] = 'Delete Product';

		if($id) {
			if($this->input->post('confirm')) {
                    $product_data = $this->Model_products->getProductData($id);
                    $old_image = $product_data['image'];
                    unlink($old_image);
					$delete = $this->Model_products->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('products/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('products/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->adn_template('products/delete', $this->data);
			}	
		}
	}

    public function view($id = null){
        
		if(!in_array('viewProduct', $this->permission)) {
			 $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin', 'refresh');
		}
		if($id){
			$product_data = $this->Model_products->getProductData($id);
		    $this->data['product_data'] = $product_data;
			$this->adn_template('products/view', $this->data);	
		}
		else{
			$this->index();
		}
	}
    
	public function getCategoryData()
	{
		$products = $this->Model_products->getCategoryData(); 
		echo json_encode($products);
		
	}

	


}