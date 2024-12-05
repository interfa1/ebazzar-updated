<?php 

class Groups extends MY_Controller  
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		//$this->isChecked();
		$this->data['page_title'] = 'Groups';
	}

	public function index()
	{

		if(!in_array('createGroup', $this->permission)||
           !in_array('updateGroup', $this->permission)||
           !in_array('deleteGroup', $this->permission)||
           !in_array('viewGroup', $this->permission)) {
            $this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin/', 'refresh');
		   }

		$groups_data = $this->Model_groups->getGroupData();
		$this->data['groups_data'] = $groups_data;

		$this->adn_template('groups/index', $this->data);
	}	

	public function create()
	{

		 $this->data['page_title'] = 'Create Group';
		if(!in_array('createGroup', $this->permission)) {
			$this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin/', 'refresh');
		}

		$this->form_validation->set_rules('group_name', 'Group name', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $permission = serialize($this->input->post('permission'));
            
        	$data = array(
        		'group_name' => $this->input->post('group_name'),
        		'permission' => $permission
        	);

        	$create = $this->Model_groups->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('groups/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('groups/create', 'refresh');
        	}
        }
        else {
            // false case
            $this->adn_template('groups/create', $this->data);
        }	
	}

	public function edit($id = null)
	{

		if(!in_array('updateGroup', $this->permission)) {
			$this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin', 'refresh');
		}
		
		$this->data['page_title'] = 'Edit Group';

		if($id) {

			$this->form_validation->set_rules('group_name', 'Group name', 'required');

			if ($this->form_validation->run() == TRUE) {
	            // true case
	            $permission = serialize($this->input->post('permission'));
	            
	        	$data = array(
	        		'group_name' => $this->input->post('group_name'),
	        		'permission' => $permission
	        	);

	        	$update = $this->Model_groups->edit($data, $id);
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('groups/', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('groups/edit/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	            $group_data = $this->Model_groups->getGroupData($id);
				$this->data['group_data'] = $group_data;
				$this->adn_template('groups/edit', $this->data);	
	        }	
		}
	}

	
	public function delete($id)
	{

		if(!in_array('deleteGroup', $this->permission)) {
			$this->session->set_flashdata('error', 'Permission denied!!');
			redirect('admin', 'refresh');
		}

		 $this->data['page_title'] = 'Delete Group';
		if($id) {
			if($this->input->post('confirm')) {

				$check = $this->Model_groups->existInUserGroup($id);
				if($check == true) {
					$this->session->set_flashdata('error', 'Group exists in the users');
	        		redirect('groups/', 'refresh');
				}
				else {
					$delete = $this->Model_groups->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('groups/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('groups/delete/'.$id, 'refresh');
		        	}
				}	
			}	
			else {
				$this->data['id'] = $id;
				$this->adn_template('groups/delete', $this->data);
			}	
		}
	}


}