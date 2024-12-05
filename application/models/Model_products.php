<?php 

class Model_products extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getProductData($productId = null) 
	{
		if($productId) {
			$sql = "SELECT * FROM products WHERE id = ?";
			$query = $this->db->query($sql, array($productId));
			return $query->row_array();
		}
        else{
        
			$user_id = $_SESSION['id'];
			if($user_id == 1)
			{
				$sql = "SELECT * FROM products";
				$query = $this->db->query($sql);
				return $query->result_array();
			}
			else
			{
        
		      $sql = "SELECT * FROM products WHERE user_id = ?";
		      $query = $this->db->query($sql, array($user_id));
		      return $query->result_array();
            }
        }
	}

	public function getProductGroup($productId = null) 
	{
		if($productId) {
			$sql = "SELECT * FROM product_group WHERE product_id = ?";
			$query = $this->db->query($sql, array($productId));
			$result = $query->row_array();

			$group_id = $result['group_id'];
			$g_sql = "SELECT * FROM groups WHERE id = ?";
			$g_query = $this->db->query($g_sql, array($group_id));
			$q_result = $g_query->row_array();
			return $q_result;
		}
	}
	
	
	public function getProductBranch($branch_id = null) 
	{
		if($branch_id) {
			$sql = "SELECT * FROM branch WHERE b_id = ?";
			$query = $this->db->query($sql, array($branch_id));
			$result = $query->row_array();
			return $result;
		}
	}
     public function countProducts()
	{
         $user_id = $_SESSION['id'];
			if($user_id == 1)
			{
				$sql = "SELECT * FROM products";
		        $query = $this->db->query($sql);
		        return $query->num_rows();
			}
			else
			{
                $sql = "SELECT * FROM products WHERE user_id = ?";
		         $query = $this->db->query($sql, array($user_id));
		       return $query->num_rows();
            }
		
	}
    public function getDealerData()
    {
       $sql= "SELECT * FROM products WHERE id IN(SELECT product_id FROM product_group WHERE group_id IN(SELECT id FROM groups WHERE group_name LIKE '%Dealer%'))";
        $query= $this->db->query($sql);
        $result= $query->result_array();
        return $result;
    }
    
	public function create($data = '')
	{
		$create = $this->db->insert('products', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	public function edit($data, $id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('products', $data);
		return ($update == true) ? true : false;	
	}
    

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('products');
		return ($delete == true) ? true : false;
	}

	public function countTotalProducts()
	{
		$sql = "SELECT * FROM products";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	public function existInProduct($product_id)
	{
		$id = 1;
		$sql = "SELECT * FROM products WHERE id = ? AND id <>'$id' ";
		$query = $this->db->query($sql,$product_id);
		return ($query->num_rows() == 1) ? true : false;
	}
	
	
		public function existInProductEmail($email,$product_id)
	{
		$sql = "SELECT * FROM products WHERE email = ? AND id <>'$product_id' ";
		$query = $this->db->query($sql,$email);
		return ($query->num_rows());
	}
	
	
	public function getNotApprovedProductData()
	{
		$sql = "SELECT * FROM products WHERE approved != ?";
		$query = $this->db->query($sql,1);
		return $query->result_array();
	}
	
    
    public function getCategoryData($cat_id = null) 
	{
		if($cat_id) {
			$sql = "SELECT * FROM categories WHERE cat_id = ?";
			$query = $this->db->query($sql, array($cat_id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM categories";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
    
    public function getProductDataByCatID($cat_id = null,$shop_id = null) 
	{
		if($cat_id && $shop_id) {
			$sql = "SELECT * FROM products WHERE category = '$cat_id' AND user_id = '$shop_id'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		$sql = "SELECT * FROM products";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
    
    public function getProductDataByname($name)
    {
      $sql = "SELECT * FROM products WHERE name LIKE '%$name%' LIMIT 1";   $query = $this->db->query($sql);
			return $query->row_array();
    }
    
    public function getCatlogsByVendorId($id)
    {
$sql = "SELECT DISTINCT category FROM products WHERE user_id = ? ";  
    $query = $this->db->query($sql,array($id));
     return $query->result_array();
    }
	
}