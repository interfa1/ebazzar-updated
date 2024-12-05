<?php 

class Model_groups extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getGroupData($groupId = null) 
	{
		if($groupId) {
			$sql = "SELECT * FROM groups WHERE id = ?";
			$query = $this->db->query($sql, array($groupId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM groups WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
    public function countTotalGroups()
	{
		$sql = "SELECT * FROM groups";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	public function create($data = '')
	{
		$create = $this->db->insert('groups', $data);
		return ($create == true) ? true : false;
	}

	public function edit($data, $id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('groups', $data);
		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('groups');
		return ($delete == true) ? true : false;
	}

	public function existInUserGroup($id)
	{
		$sql = "SELECT * FROM user_group WHERE group_id = ?";
		$query = $this->db->query($sql, array($id));
		return ($query->num_rows() == 1) ? true : false;
	}

	public function getUserGroupByUserId($user_id) 
	{
		$sql = "SELECT * FROM user_group 
		INNER JOIN groups ON groups.id = user_group.group_id 
		WHERE user_group.user_id = ?";
		$query = $this->db->query($sql, array($user_id));
		$result = $query->row_array();

		return $result;

	}
	
	
	public function getStudentGroup()
	{
		$sql = "SELECT * FROM groups WHERE group_name LIKE '%Student%' LIMIT 1 ";
		$query = $this->db->query($sql);
		$result = $query->row_array();

		return $result;

	}
	
	
	public function getGroupIdByGroupName($group)
	{

		 $this->db->select('id');
    	$this->db->from('groups');
		$this->db->where('group_name',$group);
		return $this->db->get()->row()->id;
		
		
	}
	
	public function getGroupName($userId = null) 
	{
		if($userId) {
			$sql = "SELECT group_name FROM groups WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}
	}
	
	public function getUsersByGroupId($group_id)
	{
			$sql = "SELECT user_id FROM  user_group WHERE group_id = ?";
		$query = $this->db->query($sql,$group_id);
		$result = $query->result_array();

		return $result;	
	}
		
	public function getUsersByGroupIdArray($asm_data)
	{
		
			$sql = "SELECT user_id FROM  user_group WHERE group_id = ?";
		$query = $this->db->query($sql,$asm_data);
		$result = $query->result_array();

		return $result;	
	}
	
	
}