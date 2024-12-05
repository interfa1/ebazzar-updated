<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller 
{

	public function __construct()
	{
		parent::__construct();
    }


	public function login()
	{
	   // $this->logged_in();
		$this->form_validation->set_rules('userid', 'Enter email or mobile number', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE)
		{
		 // true case for admin and users
           	$mobile_exists = $this->Model_auth->check_mobile($this->input->post('userid'));
			if($mobile_exists == TRUE) 
			{
				$approval = $this->Model_auth->check_approval($this->input->post('userid'));
				if($approval == TRUE)
				{
						$login = $this->Model_auth->login($this->input->post('userid'), $this->input->post('password'));

						if($login) 
						{
								$logged_in_sess = array(
								'id' => $login['id'],
								'username'  => $login['username'],
								'email'     => $login['email'],
								'user'     => 'user',
								'logged_in' => TRUE
							);

							$this->session->set_userdata($logged_in_sess);
							redirect('admin/', 'refresh');
						}
						else 
						{
							$this->data['errors'] = 'Incorrect username/password combination';
							$this->load->view('signin', $this->data);
						}	
				}
				else
				{
					$this->data['errors'] = 'approval is still pending. Please try after sometime or contact to admin.';
					$this->load->view('signin', $this->data);
				}
           		
           	}
			
			else
			{
				
				$this->data['errors'] = 'email or contact number  does not exists';
				$this->load->view('signin', $this->data);
			}
        }
        else 
		{
            // false case
            $this->load->view('signin');
        }	
	}

	/*
		clears the session and redirects to login page
	*/
	public function logout()
	{
		$this->session->sess_destroy();   
		redirect('auth/login', 'refresh');
	}
	
	
	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}
	
	public function signup()
	{
		//$this->form_validation->set_rules('groups', 'Group', 'required');
		//$this->form_validation->set_rules('branch_id', 'Branch', 'required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
//		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('name', 'name', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $password = $this->password_hash($this->input->post('password'));
           // $upload_image=$this->upload_image();
           
        	$data = array(
        		'username' => $this->input->post('username'),
        		//'branch_id' => $this->input->post('branch_id'),
        		'password' => $password,
        		'email' => $this->input->post('email'),
        		'name' => $this->input->post('name'),
        		//'lastname' => $this->input->post('lname'),
        		'phone' => $this->input->post('phone'),
        		'created' => date("Y-m-d h:i:s")
                );
            $group_id = 2;
        	$create = $this->Model_users->create($data,$group_id);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'You are registerd succesfully. Please login after 24 Hours.');
        		redirect('auth/login', 'refresh');
        	}
        	else {

				
				 $this->data['page_title'] = 'Create User';
        		$this->session->set_flashdata('error', 'error occurred while creating user!!');
        		redirect('auth/signup', 'refresh');
        	}
        
        }
		else
		{
			$this->load->view('signup');
		}
	   
	}
    
    
    	public function cust_login()
	{
	    //$this->logged_in();
		$this->form_validation->set_rules('userid', 'Enter email or mobile number', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE)
		{
		 // true case for admin and users
           	$mobile_exists = $this->Model_auth->check_cust_mobile($this->input->post('userid'));
			if($mobile_exists == TRUE) 
			{
				
						$login = $this->Model_auth->cust_login($this->input->post('userid'), $this->input->post('password'));

						if($login) 
						{
								$logged_in_sess = array(
								'id' => $login['cust_id'],
								'username'  => $login['username'],
								'email'     => $login['email'],
								'user'     => 'customer',
								'logged_in' => TRUE
							);

							$this->session->set_userdata($logged_in_sess);
							redirect('dashboard/', 'refresh');
						}
						else 
						{
							$this->data['errors'] = 'Incorrect username/password combination';
							 $this->ui_template('ui/login', $this->data);
						}	
            }
			else
			{
				
				$this->data['errors'] = 'email or contact number  does not exists';
				 $this->ui_template('ui/login', $this->data);
			}
        }
        else 
		{
            // false case
            $this->ui_template('ui/login');
        }	
	}
    
    public function cust_logout()
	{
		$this->session->sess_destroy();   
		redirect('auth/cust_login', 'refresh');
	}
    
    
    	public function cust_signup()
	{
		//$this->form_validation->set_rules('groups', 'Group', 'required');
		//$this->form_validation->set_rules('branch_id', 'Branch', 'required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
//		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('name', 'name', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $password = $this->password_hash($this->input->post('password'));
           // $upload_image=$this->upload_image();
           
        	$data = array(
        		'username' => $this->input->post('username'),
        		//'branch_id' => $this->input->post('branch_id'),
        		'password' => $password,
        		'email' => $this->input->post('email'),
        		'name' => $this->input->post('name'),
        		//'lastname' => $this->input->post('lname'),
        		'mobile' => $this->input->post('mobile'),
        		//'created' => date("Y-m-d h:i:s")
                );
        	$create = $this->Model_users->create_customer($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'You are registerd succesfully. Please login with credentails.');
        		redirect('auth/cust_login', 'refresh');
        	}
        	else {

				
        		$this->session->set_flashdata('error', 'error occurred while creating profile!!');
        		redirect('auth/cust_login', 'refresh');
        	}
        
        }
		else
		{
			 $this->ui_template('ui/login', $this->data);
		}
	   
	}
	
	

}

