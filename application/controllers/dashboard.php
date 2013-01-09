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
		$user = $this->ion_auth->user()->row();
		// get all books by user
		$query = $this->db->get_where('books',array('user_id'=>$user->id));		

		$books = array();
		if($query->num_rows()>0) {
			foreach($query->result_array() as $row)
			{
				// load the bookcover if available or load the default bookcover image
//				echo 'http:/localhost/classvibe-books/assets/user_data/bookcovers/'. $row['user_id'].'_'.$row['id'].'_'.$row['bookcover_id'].'_160x120.jpg';
				$file = 'assets/user_data/bookcovers/'. $row['user_id'].'_'.$row['id'].'_'.$row['bookcover_id'].'_160x120.jpg';
			
				// check if bookcover file exists
				if($loc = file_exists($file)) 
					$row['bookcover_url'] = base_url($file);
				else // no bookcover for this book was uploaded, load default img
					$row['bookcover_url'] = base_url('assets/user_data/bookcovers/default_160x120.jpg');

				array_push($books,$row);
			}
		}
		
		$data['books'] = $books;	
		$this->load->view('include/header');
		$this->load->view('dashboard', $data);
		$this->load->view('include/footer');
		
	}

	public function create_newBook() {
		$this->load->library('form_validation');
		//validate form input
		$this->form_validation->set_rules('title','Title', '');
		$this->form_validation->set_rules('author','Author','');
		$this->form_validation->set_rules('course_num','Course Number', '');

		if($this->form_validation->run() == true){
			// form validation passed, upload book for user
			$user = $this->ion_auth->user()->row();
			
			// infomation to insert into 'Books' table
			$insert_data['title'] = $this->input->post('title');
			$insert_data['author'] = $this->input->post('author');
			$insert_data['course_num'] = $this->input->post('course_num');
			$insert_data['isbn'] = $this->input->post('isbn');
			// create a new book in db
			$this->load->model("books_model");
			$book = $this->books_model->create_book($user->id,$insert_data);
			
			// is there a bookcover to upload for this book?
			if($_FILES['bookcover'] != null) {
				// begin bookcover upload
				$config['upload_path'] = './assets/user_data/bookcovers';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = $user->id . "_" . $book['book_id'] . "_" . $book['bookcover_id'];	
				$this->load->library('upload',$config);
		
				// perform the bookcover img upload
				$this->upload->do_upload('bookcover');
				// get the uploaded image's data
				$upload_data = $this->upload->data();
				// Check if image that was uploaded meets our requirements, size and image type
				$this->check_bookcover($upload_data);
			}

			redirect('dashboard','refresh');
		}
		else {
			// basic server side form validation failed
			$this->data['message'] = validation_errors();
			// pass back entry information
			$this->data['title'] = array(
				'name' => 'title',
				'id' => 'title',
				'type' => 'text',
				'value' => $this->form_validation->set_value('title')
			);

            $this->data['author'] = array(
                'name' => 'author',
                'id' => 'author',
                'type' => 'text',
                'value' => $this->form_validation->set_value('author')
            );

            $this->data['course_num'] = array(
                'name' => 'course_num',
                'id' => 'course_num',
                'type' => 'text',
                'value' => $this->form_validation->set_value('course_num')
            );

            $this->data['isbn'] = array(
                'name' => 'isbn',
                'id' => 'isbn',
                'type' => 'text',
                'value' => $this->form_validation->set_value('isbn')
            );
			echo "failed";
		}

	}


	// check if bookcover image uploaded is jpg if not then converts to jpg
	// scales the image down to 1024x720
	// creates a thumbnail
	private function check_bookcover($data){
		// load CI image manpulation library
		$this->load->library('image_lib');
		// set the image processing library to ImageMagick, this library 
		// allows converting images to .jpg
//		$config['image_library'] = 'ImageMagick';	
		
		// if image isnt jpg convert it
		if($data['file_ext'] != ".jpg"){

			$config['source_image'] = $data['full_path'];
			$config['new_image'] = $data['file_path'] . $data['raw_name'] . '.jpg';
			// convert image to jpg
			$data['full_path'] =	$this->image_lib->image_to_jpeg($config['source_image'],$config['new_image'],$data['file_ext'], 50);
			
		}	

		// create a 320x280 image copy	
		// reset vars and prepare for more image processing
		$config = array();
		$this->image_lib->clear();

        // resize if needed
//        if($data['image_width'] > 320 || $data['image_height'] > 280) {
            // bookcover prefs
            $config['source_image'] = $data['full_path'];
			$config['new_image'] =$data['file_path'] . $data['raw_name'] . '_320x280.jpg';
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 320;
            $config['height'] = 280;
            $config['create_thumb'] = FALSE;
            // re-initialize image library config
            $this->image_lib->initialize($config);
            // process
            $this->image_lib->resize();
        //  $this->image_lib->display_errors();
//        }

		// create a 160x120 image copy
        // reset vars and prepare for more image processing
        $config = array();
        $this->image_lib->clear();

        // resize if needed
        // bookcover prefs
        $config['source_image'] = $data['full_path'];
        $config['new_image'] =$data['file_path'] . $data['raw_name'] . '_160x120.jpg';
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 160;
        $config['height'] = 120;
        $config['create_thumb'] = FALSE;
        // re-initialize image library config
        $this->image_lib->initialize($config);
        // process
		$this->image_lib->resize();
//        $this->image_lib->display_errors();
        // reset vars and prepare for another image process
        $config = array();
        $this->image_lib->clear();


		// Creates the thumbnail
		// set the prefs
		$config['source_image'] = $data['full_path'];
		
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 75;
		$config['height'] = 50;
		// re-initialize image library w/ new configs
		$this->image_lib->initialize($config);	
		// process
		$this->image_lib->resize();

	} 
}
