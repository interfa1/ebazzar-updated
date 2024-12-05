<?php 

class Dashboard extends MY_Controller{
	
	public function __construct()
    {
		parent::__construct();
		$this->data['page_title'] = 'Dashboard';
	}
    

     public function cust_not_logged_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['logged_in'] == FALSE ) {
			redirect('auth/cust_login', 'refresh');
		}
	}

	public function index()
	{
        //$this->cust_not_logged_in();
        
        $this->ui_template('ui/index', $this->data);
	}
    
    public function getShopData($id = null)
    {
        if($id){
           $shop_id = $id; 
           $this->data['shop_id'] = $shop_id; 
          $this->catalouge(1,$shop_id);
        }
        else
        {
          $this->data['errors'] = 'Location not found. Please allow location';
            $this->ui_template('ui/index', $this->data);
        }
    
    }
    
    public function catalouge($id = null,$shop_id = null)
    {
      if($id && $shop_id){
//        $this->data['user_catlog_list'] = $this->Model_products->getCatlogsByVendorId($id);
        $this->data['shop_id'] = $shop_id;
        $this->data['catlog'] = $this->Model_products->getProductDataByCatID($id,$shop_id);
         $this->data['category'] = $this->Model_products->getCategoryData($id); 
        $this->ui_template('ui/catalouge', $this->data);
          
        }
        else
        {
            $this->data['errors'] = 'Location not found. Please allow location';
            $this->ui_template('ui/index', $this->data);
        }
    }
    
    public function about()
	{
        $this->ui_template('ui/about', $this->data);
	}
    
     public function bread()
	{
        $this->ui_template('ui/bread', $this->data);
	}
    
     public function checkout()
	{
        $user_id = $_SESSION['id'];
        if(empty($user_id))
        {
         redirect('auth/cust_login','refresh');
        }
        $someJSON = $this->input->post('name');
        $someArray = json_decode($someJSON, true);
		$count_name = count($someArray);
		if($count_name >= 1){
		$this->data['order_data'] = $someArray;
		$cust_data = $this->Model_users->getCustomersData($user_id);
		$this->data['cust_data'] = $cust_data;
//		$this->data['return_url'] = site_url().'transaction/store_callback';
//		$this->data['currency_code'] = 'INR';
		$total = 0;	
		 foreach ($someArray as $k => $v)
		 {
			 $total = $total + $v['total'];
		 }
		$this->data['shop_id'] = $this->input->post('shop_id');
		$this->data['order_tot_amt'] = $total;
        $this->ui_template('ui/checkout', $this->data);
        }
         else
         {
          $this->session->set_flashdata('error', 'It seems your cart is empty. Please add something.!!');
        	redirect('dashboard/', 'refresh');
         }
	}
    
    public function orders()
    {
        $user_id = $_SESSION['id'];
        if(empty($user_id))
        {
         redirect('auth/cust_login','refresh');
        }
        
        if($this->input->post('submit') == 'submit')
        {
          	$bill_no = 'ODRNO-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6));
            
        $cust_data = $this->Model_users->getCustomersData($user_id);
    	$data = array(
    		'bill_no' => $bill_no,
            'order_date' => date('Y-m-d h:i:s'),    
            'user_id' => $user_id,
            'vendor_id' => $this->input->post('shop_id'),
    		'name' => $this->input->post('name'),
            'mobile' => $this->input->post('mobile'),
            'email' => $cust_data['email'],
            'landmark' => $this->input->post('landmark'),
            'pincode' => $this->input->post('pincode'),
    		'address' => $this->input->post('address'),
    		'item_name' => serialize($this->input->post('item_name')),
    		'qty' => serialize($this->input->post('qty')),
    		'price' => serialize($this->input->post('price')),
    		'tot_qty' => $this->input->post('tot_qty'),
    		'tot_amt' => $this->input->post('tot_amt'),
		  );
//            var_dump($data);
//            die();
		$create = $this->Model_orders->create($data);
         if($create == true) {
                $this->mail_order_placed($create);
        		$this->session->set_flashdata('success', 'Order placed successfully');
            
    redirect('dashboard/', 'refresh');
        	}
            else {
        		$this->session->set_flashdata('error', 'error occurred while placing order. Please try again later.!!');
        		redirect('dashboard/', 'refresh');
        	}
        }else
        {
         $this->session->set_flashdata('error', 'Something went wrong.');
        		redirect('dashboard/', 'refresh');
        }
        
        
    }
    
    public function mail_order_placed($order_id)
    {
        $order_data= $this->Model_orders->getOrdersData($order_id);
        
        $mail_subject = 'Order Placed';
        $customer_email = $order_data['email'];
        $customer_name = $order_data['name'];
        $order_no = $order_data['bill_no'];
        $shop_data = $this->Model_users->getUserData($order_data['vendor_id']);
//        var_dump($order_data);
//        var_dump($shop_data);
//        die();
        $shop_name = $shop_data['shop_name'];
        
        $message = '<html><head><style>table, th, td {
                     border: 1px solid black;
                     }
                     table {
                     border-collapse: collapse;
                     }
                     </style></head> <body>';
        $message .= '<p>Dear <b>'.$customer_name.'</b>,<br>';
        $message .= 'Your order '.$order_no.' from '.$shop_name.' has been placed successfully. For more details please visit <b> My orders</b> section<br>';
        $message .= '</body> </html>';
//        echo $message;
//        die();
        
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.interface11.com';
        $config['smtp_user'] = 'abhishek@interface11.com';
        $config['smtp_pass'] = 'khZEcA8JFT~L';
        $config['charset'] = 'utf-8';
        $config['smtp_port'] = 465;
        $config['smtp_crypto'] = 'ssl';
        $config['mailtype'] = 'html';
        $config['smtp_timeout'] = 4;
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
    
        $this->load->library('email',$config);
        $this->email->initialize($config);
        $this->email->from('abhishek@interface11.com','Ebazzar');
        $this->email->reply_to('abhishek@interface11.com','Ebazzar');
        $this->email->to($customer_email);
        $this->email->subject($mail_subject);
        $this->email->message($message);
        //Send mail
//         $mail_status = $this->email->send();
//        echo 'mail staus is: ' .$mail_status;
    
         if ($this->email->send()) {
            $this->session->set_flashdata('email_sent', 'Mail sent to registered email address ');
         }
    }
    
    public function mail_bill($id)
   {
        $booking_data = $this->Model_bookings->getBookingData($id);
        $journey_data = $this->Model_bookings->getJourneyDataByBookingId($id);
        $customer_data= $this->Model_users->getUserData($booking_data['customer_id']);
        
        $mail_subject = 'Travelling bill';
        $customer_email = $customer_data['email'];
//        echo 'customer email is : '.$customer_email.' Subject is : '.$mail_subject;
  
        $date= $booking_data['booking_date'];
        $name= $customer_data['firstname'].' '.$customer_data['lastname'];
        $contact = $customer_data['phone'];
        $from = $booking_data['pickup_location'];
        $to = $booking_data['drop_location'];
        $car_type='';
        $car = $booking_data['car_type'];
        if($car == 1)
         $car_type='Hatchback';
        elseif($car == 2)
         $car_type='Sedan';
        elseif($car == 3)
         $car_type='SUV';


        $distance = $journey_data['actual_distance'];
  
        $cost = $journey_data['actual_cost'];
        
        $message = '<html><head><style>table, th, td {
                     border: 1px solid black;
                     }
                     table {
                     border-collapse: collapse;
                     }
                     </style></head> <body>';
        
        $message .= '<center><table style="width:80%;"><tr><td colspan="5"><h1><center>GE        Cab</center> </h1></td> </tr>';
        $message .= '<tr><td colspan="5"><h3><center>Invoice</center> </h3></td> </tr>';
        $message .= '<tr><td colspan="5"><br>Booking ID: '.$id.'<br><br> Booking Date: '.$date.'</td></tr>';
        $message .= '<tr><td  colspan="2"><br>From<br>GE Cab<br>Address: 1001, Model colony,<br>Shivajinagar, Pune.</td>';
        $message .= '<td  colspan="3"><br>To<br>'.$name.'<br><br>'.$contact.'</td></tr>';
        $message .= '<tr><td colspan="5"><br>Hello, '.$name.'<br><br> Thank you for travelling with us.<br></td></tr>';
        $message .= '<tr><th>From</th><th>To</th><th>Car Type</th><th>Distance</th><th>Cost</th></tr>';
        $message .= '<tr><td> '.$from.'</td><td> '.$to.'</td><td> '.$car_type.'</td>     <td>'.$distance.' Km.</td><td> Rs. '.$cost.'</td></tr>';
        $message .= '<tr><td colspan="3"></td><th>Grand Total</th><td> Rs. '.$cost.'</td></tr>';
        $message .= '</table></center>';
        $message .= '</body> </html>';
//        echo $message;
//        die();
  
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.interface11.com';
        $config['smtp_user'] = 'abhishek@interface11.com';
        $config['smtp_pass'] = 'khZEcA8JFT~L';
        $config['charset'] = 'utf-8';
        $config['smtp_port'] = 465;
        $config['smtp_crypto'] = 'ssl';
        $config['mailtype'] = 'html';
        $config['smtp_timeout'] = 4;
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
    
        $this->load->library('email',$config);
        $this->email->initialize($config);
        $this->email->from('abhishek@interface11.com','GE Cab Invoice');
        $this->email->reply_to('abhishek@interface11.com','GE Cab ');
        $this->email->to($customer_email);
        $this->email->subject($mail_subject);
        $this->email->message($message);
        //Send mail
//         $mail_status = $this->email->send();
//        echo 'mail staus is: ' .$mail_status;
    
         if ($this->email->send()) {
             $this->session->set_flashdata('email_sent', 'Mail sent to registered email address ');
		     redirect('journeys/completed_journeys', 'refresh');
//        echo 'Your email was sent, thanks chamil.';
         } 
         else {
             $this->session->set_flashdata('error', 'unable to send mail please try again later.');
		     redirect('journeys/completed_journeys', 'refresh');
//        show_error($this->email->print_debugger());
         }
   }
    public function myorders()
    {
       $user_id = $_SESSION['id'];
        if(empty($user_id))
        {
         redirect('auth/cust_login','refresh');
        }
        else
        {
        $order_data = $this->Model_orders->getMyOrders($user_id);
	    $this->data['order_data'] = $order_data;
        $this->ui_template('ui/myorders', $this->data);
        
        }
    }
    
    public function vieworder($id = null)
    {
      $user_id = $_SESSION['id'];
        if(empty($user_id))
        {
         redirect('auth/cust_login','refresh');
        }
        else
        {
           $order_data = $this->Model_orders->getOrdersData($id);
		   $this->data['order_data'] = $order_data;
           $this->data['vendor_data'] = $this->Model_users->getUserData($order_data['vendor_id']);
           $this->ui_template('ui/vieworder', $this->data);
        }
    
    }
    
     public function drinks()
	{
        $this->ui_template('ui/drinks', $this->data);
	}
    
     public function events()
	{
        $this->ui_template('ui/events', $this->data);
	}
    
     public function faqs()
	{
        $this->ui_template('ui/faqs', $this->data);
	}
    
     public function frozen()
	{
        $this->ui_template('ui/frozen', $this->data);
	}
    
     public function household()
	{
        $this->ui_template('ui/household', $this->data);
	}
    
     public function kitchen()
	{
        $product_data = $this->Model_products->getProductData();
	    $this->data['product_data'] = $product_data;
        $this->ui_template('ui/kitchen', $this->data);
	}
    
     public function login()
	{
        $this->ui_template('ui/login', $this->data);
	}
    
     public function mailpage()
	{
        $this->ui_template('ui/mail', $this->data);
	}
    
     public function payment()
	{
        $this->ui_template('ui/payment', $this->data);
	}
    
     public function pet()
	{
        $this->ui_template('ui/pet', $this->data);
	}
    
     public function privacy()
	{
        $this->ui_template('ui/privacy', $this->data);
	}
    
     public function products()
	{
        $this->ui_template('ui/products', $this->data);
	}
    
     public function services()
	{
        $this->ui_template('ui/services', $this->data);
	}
    
     public function short_codes()
	{
        $this->ui_template('ui/short_codes', $this->data);
	}
    
    public function vegetables()
    {
        $this->ui_template('ui/vegetables',$this->data);
    }
    
     public function single($id = null)
    {
        
         if($id){
			$product_data = $this->Model_products->getProductData($id);
		    $this->data['product_data'] = $product_data;
             
             $this->data['category'] = $this->Model_products->getCategoryData(); 
             
            $this->ui_template('ui/single',$this->data);
          }
         else
         {
            $this->index();
         }
    }
    
public function getPlaceName()
{
   $latitude = $this->input->post('latitude');
   $longitude = $this->input->post('longitude');
   //This below statement is used to send the data to google maps api and get the place
 //  $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$latitude.','.$longitude.'&sensor=false&key=AIzaSyACvdH6GgA5wWrOF4838PORRIULGSSKXkQ&callback=initMap');

   
   // $output= json_decode($geocode);
//	var_dump($output); 
//    die();

   //Here "formatted_address" is used to display the address in a user friendly format.
 //echo json_encode($output->results[0]->formatted_address)  ;
	//var_dump($output);
	
	$curl = curl_init();
              curl_setopt_array($curl, array(
       CURLOPT_URL => "https://maps.googleapis.com/maps/api/geocode/json?latlng=$latitude,$longitude&sensor=false&key=AIzaSyACvdH6GgA5wWrOF4838PORRIULGSSKXkQ&callback=initMap",



       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_ENCODING => "",
       CURLOPT_MAXREDIRS => 10,
       CURLOPT_TIMEOUT => 30,
       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => "GET",
       CURLOPT_POSTFIELDS => "",
       CURLOPT_HTTPHEADER => array(
         "content-type: application/x-www-form-urlencoded"
       ),
     ));

     $response = curl_exec($curl);
     $err = curl_error($curl);
     
	$output= json_decode($response);
    echo json_encode($output->results[0]->formatted_address);
    
     curl_close($curl);
		
}
    
    public function findshop()
    {
        
      $distance_arr = array();
      $vendors = $this->Model_users->getVendorData();
      foreach($vendors as $k => $v)
      {
          $from = $this->input->post('p_location');
          $to = $v['address'];
         // $vendor_dis = $v['km'];
          $distance = $this->getDistance($from,$to);
//          echo $distance."<br>";
           $km = $distance;
          $distance_arr[$v['id']] = $km;
	 } 
     $this->data['vendor_data'] = $distance_arr;
     $this->ui_template('ui/shops',$this->data);
//       foreach($d_arr as $x => $x_value) {
//    echo "Key=" . $x . ", Value=" . $x_value;
//    echo "<br>";
}
        
    
    public function getDistance($from,$to)
    {	
        $from = urlencode($from);
        $to = urlencode($to);
        $apiKey= "AIzaSyACvdH6GgA5wWrOF4838PORRIULGSSKXkQ";  
        $data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&key=$apiKey&language=en-EN&sensor=false");
        $data = json_decode($data);
        $time = 0;
        $distance = 0;

        foreach($data->rows[0]->elements as $road) {
            $time += $road->duration->value;
            $distance += $road->distance->value;
        }
        $final = round($distance/1000);
        return $final;
	
    }
	
	
}