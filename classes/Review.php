<?php
namespace AuthorPress;

use AuthorPress\Start;

class Review {

    public function register() {
        add_action( 'init', [$this, 'register_cpt']);
    }

    public function register_cpt() {
        $labels = array(
            'name'                 => 'Reviews',
            'singular_name'        => 'Review',
            'add_new'              => 'Add New',
            'add_new_item'         => 'Add New Review',
            'edit'                 => 'Edit',
            'edit_item'            => 'Edit Review',
            'new_item'             => 'New Review',
            'view'                 => 'View',
            'view_item'            => 'View Review',
            'search_items'         => 'Search Reviews',
            'not_found'            => 'No Reviews found',
            'not_found_in_trash'   => 'No Reviews found in Trash',
            'parent_item_colon'    => '',
            'menu_name'            => 'Reviews'
        );
        
        $args = array(
            'labels'             => $labels,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => 'edit.php?post_type=' . Start::BOOK_CPT,
            'show_in_rest'       => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'menu_position'      => 4,
            'supports'           => array( 'title', 'editor', 'revisions'),
            'has_archive'        => false,
            'hierarchical'       => false,
            'template'           => $this->template(),
            'template_lock'      => 'all',
        );	
        
        register_post_type( Start::REVIEW_CPT, $args );
    }

    private function template() {      
        return array(
            array( 'core/quote',
            array( 'className' => 'is-style-large' )
            )
        );
    }
}