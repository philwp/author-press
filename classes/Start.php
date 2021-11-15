<?php
namespace AuthorPress;

class Start {

	/*
	Define CPT Constants
	*/
	const BOOK_CPT   = 'ap-book';

	const REVIEW_CPT = 'ap-review';

	public function __construct() {

		//Review CPT
		$this->review = new Review();
		$this->review->register();

		//Book CPT
		$this->book   = new Book();
		$this->book->register();

		//ACF Blocks
		$this->blocks = new Blocks();
		$this->blocks->register();	
		
		add_action( 'init', [$this,'rewrite'] );
		
	}
	
	public function rewrite() {
		if( !get_option('author_press_permalinks_flushed') ) {
			flush_rewrite_rules();
			update_option('author_press_permalinks_flushed', 1);
	
		}
	}
	
}