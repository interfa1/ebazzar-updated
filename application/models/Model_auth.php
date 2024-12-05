<?php 

class Model_auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function check_mobile($mobile) 
	{
		if($mobile) {
			$sql = "SELECT * FROM users WHERE phone = '".$mobile."' OR email = '".$mobile."'";
			$query = $this->db->query($sql);
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
	}
	
	
	public function check_approval($mobile) 
	{
		if($mobile) {
			$app = 1;
			$sql = "SELECT * FROM users WHERE  approved = '".$app."' AND phone = '".$mobile."' OR email = '".$mobile."'";
			$query = $this->db->query($sql);
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
	}
	
	public function login($mobile, $password) {
		if($mobile && $password) {
			$active = 1;
			$sql = "SELECT * FROM users WHERE active = '".$active."' AND phone = '".$mobile."' OR email = '".$mobile."'";
			$query = $this->db->query($sql);

			if($query->num_rows() == 1) {
				$result = $query->row_array();

				$hash_password = password_verify($password, $result['password']);
				if($hash_password === true) {
					return $result;	
				}
				else {
					return false;
				}
	
			}
			else {
				return false;
			}
		}
	}
    
    
    public function check_cust_mobile($mobile) 
	{
		if($mobile) {
			$sql = "SELECT * FROM customers WHERE mobile = '".$mobile."' OR email = '".$mobile."'";
			$query = $this->db->query($sql);
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
	}
    
    
    public function cust_login($mobile, $password) {
		if($mobile && $password) {
			$active = 1;
			$sql = "SELECT * FROM customers WHERE mobile = '".$mobile."' OR email = '".$mobile."'";
			$query = $this->db->query($sql);

			if($query->num_rows() == 1) {
				$result = $query->row_array();

				$hash_password = password_verify($password, $result['password']);
				if($hash_password === true) {
					return $result;	
				}
				else {
					return false;
				}
	
			}
			else {
				return false;
			}
		}
	}
	
}