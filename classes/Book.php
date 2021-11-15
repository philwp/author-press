<?php
namespace AuthorPress;

use AuthorPress\Start;

class Book {

    public function register() {
        add_action( 'init', [ $this, 'register_cpt' ] );
    }

    public function register_cpt() {
        $labels = array(
            'name'                 => 'Books',
            'singular_name'        => 'Book',
            'add_new'              => 'Add New Book',
            'add_new_item'         => 'Add New Book',
            'edit'                 => 'Edit',
            'edit_item'            => 'Edit Book',
            'new_item'             => 'New Book',
            'view'                 => 'View',
            'view_item'            => 'View Book',
            'search_items'         => 'Search Books',
            'not_found'            => 'No Books found',
            'not_found_in_trash'   => 'No Books found in Trash',
            'parent_item_colon'    => '',
            'menu_name'            => 'Books'
        );
        
        $args = array(
            'labels' => $labels,
            'public'               => true,
            'publicly_queryable'   => true,
            'show_ui'              => true,
            'show_in_menu'         => true,
            'show_in_rest'         => true,
            'query_var'            => true,
            'rewrite'              => array( 'slug' => 'books' ),
            'capability_type'      => 'post',
            'menu_position'        => 4,
            'supports'             => array( 'title', 'editor', 'thumbnail', 'revisions'),
            'menu_icon'            => 'dashicons-book',
            'has_archive'          => true,
            'hierarchical'         => false,
            'template'             => $this->template(),
		    'template_lock'        => 'all',
        );	
        
        register_post_type( Start::BOOK_CPT, $args );
    }

    private function template() {      
        return array(
            array('core/columns', array(),
                array(
                    array('core/column', array('width' => 50), array(
                        array('core/post-featured-image', array()),
                    )),
                    array('core/column', array('width' => 50), array(
                        array('acf/ap-summary', array())
                    )),
                )
            ),
            array('acf/details', array()),
            array('acf/reviews', array())
        );     
    }
    
}