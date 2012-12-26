<?php if (!defined('BASEPATH')) die();
class Dashboard extends Main_Controller {

	public function index(){
		
		// is user logged in
		if(!$this->ion_auth->logged_in()) {
			// user is NOT logged in, redirect to login page
			redirect('frontpage/','refresh');
		} elseif ($this->ion_auth->is_admin()) {
			// user is signed in and IS A admin
			redirect('administrator/','refresh');
		}
		

		$this->load->view('include/header');
		$this->load->view('dashboard');
		$this->load->view('include/footer');
		
	}
}
