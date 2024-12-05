<?php 

class Model_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUserData($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM users WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getUserGroup($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM user_group WHERE user_id = ?";
			$query = $this->db->query($sql, array($userId));
			$result = $query->row_array();

			$group_id = $result['group_id'];
			$g_sql = "SELECT * FROM groups WHERE id = ?";
			$g_query = $this->db->query($g_sql, array($group_id));
			$q_result = $g_query->row_array();
			return $q_result;
		}
	}
	
	
	public function getUserBranch($branch_id = null) 
	{
		if($branch_id) {
			$sql = "SELECT * FROM branch WHERE b_id = ?";
			$query = $this->db->query($sql, array($branch_id));
			$result = $query->row_array();
			return $result;
		}
	}
     public function countUsers()
	{
		$sql = "SELECT * FROM users";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
    public function getVendorData()
    {
       $sql= "SELECT * FROM users WHERE id IN(SELECT user_id FROM user_group WHERE group_id IN(SELECT id FROM groups WHERE group_name LIKE '%Vendor%'))";
        $query= $this->db->query($sql);
        $result= $query->result_array();
        return $result;
    }
	public function create($data = '', $group_id = null)
	{

		if($data && $group_id) {
			$create = $this->db->insert('users', $data);

			$user_id = $this->db->insert_id();
			$group_data = array(
				'user_id' => $user_id,
				'group_id' => $group_id,
				//'branch_id' => $data['branch_id'],
			);

			$group_data = $this->db->insert('user_group', $group_data);

			return ($create == true && $group_data) ? true : false;
		}
	}

	public function edit($data = array(), $id = null, $group_id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('users', $data);

		if($group_id) {
			// user group
			$update_user_group = array('group_id' => $group_id);
			$this->db->where('user_id', $id);
			$user_group = $this->db->update('user_group', $update_user_group);
			return ($update == true && $user_group == true) ? true : false;	
		}
			
		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('users');
		return ($delete == true) ? true : false;
	}

	public function countTotalUsers()
	{
		$sql = "SELECT * FROM users";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	public function existInUser($user_id)
	{
		$id = 1;
		$sql = "SELECT * FROM users WHERE id = ? AND id <>'$id' ";
		$query = $this->db->query($sql,$user_id);
		return ($query->num_rows() == 1) ? true : false;
	}
	
	
		public function existInUserEmail($email,$user_id)
	{
		$sql = "SELECT * FROM users WHERE email = ? AND id <>'$user_id' ";
		$query = $this->db->query($sql,$email);
		return ($query->num_rows());
	}
	
	
	public function getNotApprovedUserData()
	{
		$sql = "SELECT * FROM users WHERE approved != ?";
		$query = $this->db->query($sql,1);
		return $query->result_array();
	}
	
    
    public function create_customer($data = '')
	{

		if($data) {
			$create = $this->db->insert('customers', $data);
			return ($create == true ) ? true : false;
		}
	}
    
    	public function getCustomersData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM customers WHERE cust_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM customers ORDER BY cust_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
}