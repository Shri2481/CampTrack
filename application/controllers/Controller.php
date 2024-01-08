<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');	
	  
		
	}

	

	private function is_logged_in() {
        return $this->session->userdata('logged_in') === true;
    }

	public function login() {
		$username = $this->input->post('name');   // Get the 'name' input from the POST data
		$password = $this->input->post('pass');   // Get the 'pass' input from the POST data
	
		if ($username == "Shashikant" && $password == "Rev@2217") {
			// If the username and password match, set a session variable and load a view
			$this->session->set_userdata('logged_in', true);
			$data['result'] = $this->Model->readData();  // Assuming there's a Model class with a readData method
			$this->load->view('index', $data);
		} else {
			
			
			echo "<script>alert('Invalid Username or Password! Please try again.')</script>";
			redirect('controller/logout');
			
		}

	}
	

	public function index(){
		$data['result'] = $this->Model->readData();
		$this->load->view('index', $data);	
	}

	public function insert() {
        if ($this->is_logged_in()) {
            $data = array(
                'date' => $this->input->post('date'),
                'mmu' => $this->input->post('mmu'),
                'currentkm' => $this->input->post('kms'),
                'currentcount' => $this->input->post('count')
            );

            $this->Model->insertData($data);

            redirect('controller/index'); // Assuming 'index' is the method in your Controller

        } else {
            echo "You are not logged in!";
        }
    }
	
		

	public function get($id) {
		if ($this->is_logged_in()){

			$data['result'] = $this->Model->getDataById($id);
		
			if ($data['result']) {
				$this->session->set_userdata('inceptionKm', $data['result']->inceptionkm);
				$this->session->set_userdata('inceptionCount', $data['result']->inceptioncount);
				$this->session->set_userdata('monthKm', $data['result']->monthkm);
				$this->session->set_userdata('monthCount', $data['result']->monthcount);
		
				$this->load->view('update', $data);

				
			} else {
				// Handle the case where data is not retrieved
				echo "Data not found.";
			}
	    }

		else{
			echo "You are not logged in!";
		}
	}
	
	

	public function update($id) {
		// Check if the user is logged in
		if ($this->is_logged_in()){
	
			// Retrieve session data
			$inceptionKm = (int) $this->session->userdata('inceptionKm');
			$inceptionCount = (int) $this->session->userdata('inceptionCount');
			$monthKm = (int) $this->session->userdata('monthKm');
			$monthCount = (int) $this->session->userdata('monthCount');
	
			// Retrieve input data
			$currentkm = (int) $this->input->post('kms');
			$currentcount = (int) $this->input->post('count');
			$currentdate =  $this->input->post('date');
	
			// Perform arithmetic operations
			$updateInceptionKm = $inceptionKm + $currentkm;
			$updateInceptionCount = $inceptionCount + $currentcount;
			$updateMonthKm = $monthKm + $currentkm;
			$updateMonthCount = $monthCount + $currentcount;
	
			// Prepare data for update
			$data = array(
				'date' => $currentdate,
				'currentkm' => $currentkm,
				'currentcount' => $currentcount,
				'monthkm' => $updateMonthKm,
				'monthcount' => $updateMonthCount,
				'inceptionkm' => $updateInceptionKm,
				'inceptioncount' => $updateInceptionCount
			);
	
			// Update data in the model
			$this->Model->updateData($data, $id);
	
			// Unset session data
			$this->session->unset_userdata('inceptionKm');
			$this->session->unset_userdata('inceptionCount');
			$this->session->unset_userdata('monthKm');
			$this->session->unset_userdata('monthCount');
	
			// Redirect to the index page
			redirect('controller/index');
		}
	
		// If the user is not logged in, display an error message
		else {
			echo "You are not logged in!";
		}
	}
	
	
	
	public function delete($id){
		if ($this->is_logged_in()){
			$result = $this->Model->deleteData($id);

			redirect('controller/index');

		}

		else{
			echo "You are not logged in!";
		}
		
	}

	public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->load->view('login');
    }
	

	
}
