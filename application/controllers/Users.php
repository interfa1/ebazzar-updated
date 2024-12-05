<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		//$this->isChecked();
		$this->data['page_title'] = 'Users';
		
	}

	
	public function index()
	{
		  if(!in_array('createUser', $this->permission)||
           !in_array('updateUser', $this->permission)||
           !in_array('deleteUser', $this->permission)||
           !in_array('viewUser', $this->permission)) {
            $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin', 'refresh');
		   }

		$user_data = $this->Model_users->getUserData();
		
		$result = array();
		foreach ($user_data as $k => $v) 
		{

			$result[$k]['user_info'] = $v;

			$group = $this->Model_users->getUserGroup($v['id']);
			
			$result[$k]['user_group'] = $group;
			
//			$branch = $this->Model_users->getUserBranch($v['branch_id']);
//			$result[$k]['user_branch'] = $branch;
		}
	    $this->data['users_data'] = $result;

		$this->adn_template('users/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createUser', $this->permission)) {
			 $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin', 'refresh');
		}

		$this->form_validation->set_rules('groups', 'Group', 'required');
		//$this->form_validation->set_rules('branch_id', 'Branch', 'required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $password = $this->password_hash($this->input->post('password'));
            $upload_image=$this->upload_image();
           
        	$data = array(
        		'username' => $this->input->post('username'),
        		//'branch_id' => $this->input->post('branch_id'),
        		'password' => $password,
        		'email' => $this->input->post('email'),
        		'name' => $this->input->post('name'),
        		'address' => $this->input->post('address'),
        		'phone' => $this->input->post('phone'),
        		//'gender' => $this->input->post('gender'),
				//'gender' => $this->input->post('gender'),
				'active' => $this->input->post('active'),
                'profile' => $upload_image
        	);

        	$create = $this->Model_users->create($data, $this->input->post('groups'));
        	if($create == true) {
        		$this->session->set_flashdata('success', 'user created successfully');
        		redirect('users/', 'refresh');
        	}
        	else {

				
				 $this->data['page_title'] = 'Create User';
        		$this->session->set_flashdata('error', 'error occurred while creating user!!');
        		redirect('users/create', 'refresh');
        	}
        
        }
        else {
           	
            $this->data['page_title'] = 'Create User';
			
			$user_data = $this->Model_users->getUserData();
			$this->data['user_data'] = $user_data;
						
			$group_data = $this->Model_groups->getGroupData();
			$this->data['group_data'] = $group_data;
			
//			$branch_data = $this->Model_branch->getBranchData();
//			$this->data['branch_data'] = $branch_data;

            $this->adn_template('users/create', $this->data);
        }	

		
	}

	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}
    
     public function upload_image()
    {
    	// assets/images/product_image
        $config['upload_path'] = 'uploads';
        $config['file_name'] =  uniqid();
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1000';

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('logo'))
        {
            $error = $this->upload->display_errors();
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['logo']['name']);
            $type = $type[count($type) - 1];
            
            $path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;
            return ($data == true) ? $path : false;            
        }
    } 
    
	public function edit($id = null)
	{
		if(!in_array('updateUser', $this->permission)) {
			 $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin', 'refresh');
		}

		if($id) {
			$this->form_validation->set_rules('groups', 'Group', 'required');
		//	$this->form_validation->set_rules('branch_id', 'Branch', 'required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('name', 'Name', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
                      //  $upload_image=$this->upload_image();

                    $data = array(
		        		'username' => $this->input->post('username'),
		        		'email' => $this->input->post('email'),
						//'branch_id' => $this->input->post('branch_id'),
		        		'name' => $this->input->post('name'),
		        		'address' => $this->input->post('address'),
		        		'phone' => $this->input->post('phone'),
		        		//'gender' => $this->input->post('gender'),
		        		'active' => $this->input->post('active'),
		        		'approved' => $this->input->post('approved'),
                       // 'profile' => $upload_image

		        		
		        	);

					$isEmail = $this->Model_users->existInUserEmail($this->input->post('email'), $id);
					
		        	 if($isEmail == 0)
					 {
						 
					$oldData=$this->Model_users->getUserData($id);
					$oldFile=$oldData['profile'];
					unlink($oldFile);
					$update = $this->Model_users->edit($data, $id, $this->input->post('groups'));
					if($update == true)
							{
								$this->session->set_flashdata('success', 'Successfully updated');
								redirect('users/', 'refresh');
							}
							else 
							{
								$this->session->set_flashdata('error', 'Error occurred!!');
								redirect('users/edit/'.$id, 'refresh');
							}
					 }
					else
					{
						$this->session->set_flashdata('error', 'Email already exist!!');
					   redirect('users/edit/'.$id, 'refresh');
						
					}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {
                           // $upload_image=$this->upload_image();

		$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'username' => $this->input->post('username'),
			        		'password' => $password,
			        		'email' => $this->input->post('email'),
							//'branch_id' => $this->input->post('branch_id'),
			        		'name' => $this->input->post('name'),
			        		'address' => $this->input->post('address'),
			        		'phone' => $this->input->post('phone'),
			        		//'gender' => $this->input->post('gender'),
							'active' => $this->input->post('active'),
		        			'approved' => $this->input->post('approved'),
			        	 //   'profile' => $upload_image
			        	);
//                        $oldData=$this->Model_users->getUsersData($id);
//						if($oldData['profile'] != null)
//					    $oldFile=$oldData['profile'];
//				     	unlink($oldFile);
						$update = $this->Model_users->edit($data, $id, $this->input->post('groups'));
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'user details updated successfully');
			        		redirect('users/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('error', 'error occurred while updating user details!!');
			        		redirect('users/edit/'.$id, 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->Model_users->getUserData($id);
					//	$branch_data = $this->Model_branch->getActiveBranch($id);
			        	$groups = $this->Model_users->getUserGroup($id);

			        	$this->data['user_data'] = $user_data;
						//$this->data['branch_data'] = $branch_data;
			        	$this->data['user_group'] = $groups;
						
						
					

			            $group_data = $this->Model_groups->getGroupData();
			        	$this->data['group_data'] = $group_data;

						$this->adn_template('users/edit', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->Model_users->getUserData($id);
	        	//$branch_data = $this->Model_branch->getActiveBranch($id);
	        	$groups = $this->Model_users->getUserGroup($id);

	        	$this->data['user_data'] = $user_data;
	        	//$this->data['branch_data'] = $branch_data;
	        	$this->data['user_group'] = $groups;
				
				

	            $group_data = $this->Model_groups->getGroupData();
	        	$this->data['group_data'] = $group_data;

				$this->adn_template('users/edit', $this->data);	
	        }	
		}	
	}

	public function delete($id)
	{
		if(!in_array('deleteUser', $this->permission)) {
		 $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin', 'refresh');
		}
		$this->data['page_title'] = 'Delete User';

		if($id) {
			if($this->input->post('confirm')) {
					$delete = $this->Model_users->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('users/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->adn_template('users/delete', $this->data);
			}	
		}
	}

    public function view($id = null){
		
		if(!in_array('viewUser', $this->permission)) {
		 $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin', 'refresh');
		}
		
		if($id){
			$user_data = $this->Model_users->getUserData($id);
		    $this->data['user_data'] = $user_data;
//			$this->data['files'] = $this->File->getRows($id);
//			$this->data['slot_data'] = $this->Model_doctor->getSlotData();
			$this->adn_template('users/profile', $this->data);	
		}
		else{
			$this->index();
		}
	}
    
	public function profile()
	{
		if(!in_array('viewProfile', $this->permission)) {
			 $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin', 'refresh');
		}
			
			$id = $this->session->userdata('id');

		if($id) {
			$this->form_validation->set_rules('shop_name', 'Name', 'trim|required');
		//	$this->form_validation->set_rules('file', 'Logo', 'required');


			if ($this->form_validation->run() == TRUE) {
				
				$logo = $this->upload_image();
				
				 $data = array(
		        		'logo' => $logo,
		        		'shop_name' => $this->input->post('shop_name'),
		        		'isChecked' => 1
		        	);

		        	$update = $this->Model_users->edit($data, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully updated');
		        		redirect('admin/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/profile/', 'refresh');
		        	}
			}
			else
			{
			$user_id = $this->session->userdata['id'];
		 
			$user_data = $this->Model_users->getUserData($user_id);
			$this->data['user_data'] = $user_data;

			$user_group = $this->Model_users->getUserGroup($user_id);
			$this->data['user_group'] = $user_group;
			$this->data['page_title'] = 'Users Profile';
			$this->adn_template('users/profile', $this->data);

			}
		}

	}

	public function setting()
	{	
		if(!in_array('updateSetting', $this->permission)) {
		 $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin', 'refresh');
		}
		   $this->data['page_title'] = 'Users Information';

		$id = $this->session->userdata('id');

		if($id) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('name', 'Name', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	$data = array(
		        		'username' => $this->input->post('username'),
		        		'email' => $this->input->post('email'),
		        		//'firstname' => $this->input->post('fname'),
		        		'name' => $this->input->post('name'),
		        		'phone' => $this->input->post('phone'),
		        		//'gender' => $this->input->post('gender'),
		        	);

		        	$update = $this->Model_users->edit($data, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully updated');
		        		redirect('users/setting/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/setting/', 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'username' => $this->input->post('username'),
			        		'password' => $password,
			        		'email' => $this->input->post('email'),
			        		'name' => $this->input->post('name'),
			        		//'lastname' => $this->input->post('lname'),
			        		'phone' => $this->input->post('phone'),
			        		//'gender' => $this->input->post('gender'),
			        	);

			        	$update = $this->Model_users->edit($data, $id, $this->input->post('groups'));
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/setting/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/setting/', 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->Model_users->getUserData($id);
			        	$groups = $this->Model_users->getUserGroup($id);

			        	$this->data['user_data'] = $user_data;
			        	$this->data['user_group'] = $groups;

			            $group_data = $this->Model_groups->getGroupData();
			        	$this->data['group_data'] = $group_data;

						$this->adn_template('users/setting', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->Model_users->getUserData($id);
	        	$groups = $this->Model_users->getUserGroup($id);

	        	$this->data['user_data'] = $user_data;
	        	$this->data['user_group'] = $groups;

	            $group_data = $this->Model_groups->getGroupData();
	        	$this->data['group_data'] = $group_data;

				$this->adn_template('users/setting', $this->data);	
	        }	
		}
	}


}