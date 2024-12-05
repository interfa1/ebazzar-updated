<?php 

class Admin extends MY_Controller{
	
	public function __construct()
    {
		parent::__construct();
		$this->data['page_title'] = 'Admin Dashboard';
        $this->not_logged_in();
        $this->isChecked();
	}

	public function index()
	{
        $this->data['groups_count'] = $this->Model_groups->countTotalGroups();
        $this->data['users_count'] = $this->Model_users->countTotalUsers();
        $this->data['products_count'] = $this->Model_products->countTotalProducts();
        $this->data['orders_count'] = $this->Model_orders->countTotalOrders();
        $this->adn_template('admin/index', $this->data);
	}
    
    public function signin()
	{
        $this->load->view('admin/signin', $this->data);
	}
    
    public function signup()
	{
        $this->load->view('admin/signup', $this->data);
	}
    
     public function page_404()
	{
        $this->load->view('admin/404', $this->data);
	}
	
     public function invoice()
	{
        $this->adn_template('admin/invoice', $this->data);
	}
	
}