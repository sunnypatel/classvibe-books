<?php if (!defined('BASEPATH')) die ();
class Tests extends Main_Controller {

	public function index()
	{
		echo 'test';	
	}
	public function sel_single_ind(){
		// select a user email field by id
		$this->benchmark->mark('code_start');
		$query = $this->db->get_where('users',array('id'=>22049));
		$this->benchmark->mark('code_end');
		var_dump( $query);
		echo $this->benchmark->elapsed_time('code_start', 'code_end');
	}
	public function create_users(){
        $runs = 10000;
		$data = array();
 
		for($i=0;$i<=$runs;$i++){
			$data[$i]['username'] = $this->_randString(rand(5,20));
			$data[$i]['password'] = $this->_randString(rand(8,15));
			$data[$i]['email'] = $this->_randString(rand(8,15));
		}

		// start timer
		$this->benchmark->mark('code_start');
	    foreach($data as $a){
            $username = $a['username'];
            $password = $a['password'];
            $email = $a['email'];
            $addition_data = array( 'first_name' => '',
                                    'last_name' => '');
            $group = array('1');
            $this->ion_auth->register($username,$password,$email,$addition_data,$group);
        }
		// end timer
		$this->benchmark->mark('code_end');
		echo $this->benchmark->elapsed_time('code_start', 'code_end');

	}

	private function _randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
	{
    	$str = '';
    	$count = strlen($charset);
    	while ($length--) {
    	    $str .= $charset[mt_rand(0, $count-1)];
    	}
    	return $str;
	}
}
