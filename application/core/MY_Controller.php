<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load required libraries, helpers, and models
        $this->load->database();
        $this->load->helper(['form', 'cookie']);
        $this->load->library(['pagination', 'session']);
        $this->load->model(['Model_auth', 'Model_groups', 'Model_users', 'Model_products', 'Model_orders']);

        // Logging to debug constructor initialization
        log_message('debug', 'MY_Controller initialized');

        // Group data initialization
        $group_data = [];

        // Perform auto approval logic
        $this->auto_approval();

        // Session and authentication handling
        if (!$this->session->has_userdata('logged_in')) {
            // If no session data, initialize as not logged in
            $this->session->set_userdata(['logged_in' => FALSE]);
        } else {
            // Process session data if logged in
            $session_data = $this->session->userdata();
            $this->session_data = $session_data;

            if (isset($session_data['id'])) {
                // Load user data
                $data = $this->Model_users->getUserData($session_data['id']);
                if ($data) {
                    $this->data['profile_data'] = [
                        'name' => $data['username'],
                        'id' => $data['id'],
                        'group' => 'System User'
                    ];

                    // Load group permissions
                    $group_data = $this->Model_groups->getUserGroupByUserId($session_data['id']);
                    $this->data['user_data'] = $data;

                    if (!empty($group_data) && isset($group_data['permission'])) {
                        try {
                            $this->data['user_permission'] = unserialize($group_data['permission']);
                            $this->permission = unserialize($group_data['permission']);
                        } catch (Exception $e) {
                            log_message('error', 'Error unserializing permissions: ' . $e->getMessage());
                            $this->data['user_permission'] = [];
                            $this->permission = [];
                        }
                    } else {
                        $this->data['user_permission'] = [];
                        $this->permission = [];
                    }
                }
            }
        }
    }

    // Template rendering for admin panel
    public function adn_template($page = null, $data = [])
    {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer', $data);
    }

    // Template rendering for UI
    public function ui_template($page = null, $data = [])
    {
        $this->load->view('templates/ui_header', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/ui_footer', $data);
    }

    // Redirect based on logged-in status
    public function logged_in()
    {
        $session_data = $this->session->userdata();
        if (!empty($session_data['logged_in']) && $session_data['user'] == 'user') {
            redirect('admin/', 'refresh');
        } else {
            redirect('dashboard/', 'refresh');
        }
    }

    // Redirect if not logged in
    public function not_logged_in()
    {
        $session_data = $this->session->userdata();
        if (empty($session_data['logged_in'])) {
            redirect('auth/login', 'refresh');
        }
    }

    // Automatic approval logic for unapproved users
    public function auto_approval()
    {
        $user_data = $this->Model_users->getNotApprovedUserData();
        foreach ($user_data as $v) {
            $d1 = $v['created'];
            $d2 = date("Y-m-d H:i:s");
            $datetime1 = new DateTime($d2);
            $datetime2 = new DateTime($d1);
            $interval = $datetime1->diff($datetime2);
            $hours = $interval->format('%H');
            $days = $interval->format('%d');

            if ($hours >= 24 || $days >= 1) {
                $data = ['approved' => 1, 'active' => 1];
                $this->Model_users->edit($data, $v['id']);
            }
        }
    }

    // Check if a user is verified
    public function isChecked()
    {
        $user_id = isset($this->session_data['id']) ? $this->session_data['id'] : null;
        if ($user_id) {
            $user_data = $this->Model_users->getUserData($user_id);
            if (isset($user_data['isChecked']) && $user_data['isChecked'] != 1) {
                redirect('users/profile', 'refresh');
            }
        }
    }
}
