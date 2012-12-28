<?php

class Books_model extends CI_Model {

	var $user_id = '';
	var $title = '';
	var $author = '';
	var $course_num = '';
	var $isbn = '';

	function __construct() {
		// Call the Model constructor
		parent::__construct();
	}


	// creates a new book for the user
	// user_id required : links this upload book to the user who is logged in
	// array optional : rest of the parameters for the book being uploaded
	function create_book($user_id, $array = null) {
		
		$this->user_id = $user_id;
		$this->title = $array['title'];
		$this->author = $array['author'];
		$this->course_num = $array['course_num'];
		$this->isbn = $array['isbn'];
		$this->date_uploaded = date("Y-m-d H:i:s"); 

		// create a new entry in books table
		$this->db->insert('books',$this);
		// get the id of book just created
		$book_id = $this->db->insert_id();

		// create a bookcover entry
		$bookcover_id = $this->create_bookcover($book_id);
		
		
		// go update the 'books' table with the newly created bookcover id
		$books_data['bookcover_id'] = $bookcover_id;
		$this->db->where('id',$book_id);
		$this->db->update('books',$books_data);

		
		return array('book_id' => $book_id, 'bookcover_id' => $bookcover_id);
	}

	// book_id required; the id of book assoc. with this bookcover
	// return bookcover_id: id of bookcover created 
	function create_bookcover($book_id){
		$bookcover_data['book_id'] = $book_id;
		$this->db->insert('bookcovers',$bookcover_data);
		// return the id of newly created bookcover
		return $this->db->insert_id();
	}
}
