<?php 

class Model_orders extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the orders data */
	public function getOrdersData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM orders WHERE order_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
        else{
        
			$user_id = $_SESSION['id'];
			if($user_id == 1)
			{
				$sql = "SELECT * FROM orders ORDER BY order_id DESC";
		        $query = $this->db->query($sql);
		        return $query->result_array();
			}
			else
			{
              $sql = "SELECT * FROM orders ORDER BY order_id DESC";
		        $query = $this->db->query($sql);
		        return $query->result_array();
            }
        }

		
	}


	public function create($data = '')
	{
	    $insert = $this->db->insert('orders', $data);
		$order_id = $this->db->insert_id();
	    return ($order_id) ? $order_id : false;
	}
    
    
    public function edit($data, $id)
	{
		$this->db->where('order_id', $id);
		$update = $this->db->update('orders', $data);
		return ($update == true) ? true : false;	
	}
    
    
    public function countTotalOrders()
	{
		$sql = "SELECT * FROM orders";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
    
    public function getMyOrders($id)
    {
        if($id) {
			$sql = "SELECT * FROM orders WHERE user_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}
    
    }

	

}