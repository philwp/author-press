<?php
namespace AuthorPress;

class Blocks {

    public function register(){
        add_action('acf/init', [$this, 'register_blocks']);
        add_action('acf/init', [$this, 'register_fields']);
    }

    public function register_blocks() {
        if( function_exists('acf_register_block_type') ) {

            acf_register_block_type(array(
                'name'            => 'reviews',
                'title'           => __('Author Press Reviews'),
                'description'     => __('List reviews for your books'),
                'render_template' => AUTHOR_PRESS_DIR . '/blocks/reviews/reviews.php',
                'category'        => 'formatting',
                'mode'            => 'preview',
                'enqueue_assets'  => [$this, 'reviews_assets']
            ));

            acf_register_block_type(array(
                'name'            => 'details',
                'title'           => __('Author Press Details'),
                'description'     => __('List details for your books'),
                'render_template' => AUTHOR_PRESS_DIR . '/blocks/details/details.php',
                'category'        => 'formatting',
                'mode'            => 'preview',
                'enqueue_assets'  => [$this, 'details_assets']
            ));

            acf_register_block_type(array(
                'name'              => 'ap-summary',
                'title'             => 'Author Press Summary',
                'description'       => 'A book summary block.',
                'category'          => 'formatting',
                'mode'              => 'preview',
                'supports'          => array(
                    'align' => true,
                    'mode'  => false,
                    'jsx'   => true
                ),
                'render_template'   => AUTHOR_PRESS_DIR . '/blocks/summary/summary.php',
            ));
        }
    }

    public function reviews_assets() {
        wp_enqueue_style( 'slick-css', AUTHOR_PRESS_URL . 'vendor/slick/slick.min.css');
        wp_enqueue_style( 'slick-theme-css', AUTHOR_PRESS_URL . 'vendor/slick/accessible-slick-theme.min.css');
        wp_enqueue_script( 'slick-js', AUTHOR_PRESS_URL . 'vendor/slick/slick.min.js', ['jquery'], '', true);
        wp_enqueue_script( 'review', AUTHOR_PRESS_URL . 'blocks/reviews/reviews.js', [ 'slick-js'],'', true);
    }
    public function details_assets() {
        wp_enqueue_style( 'details', AUTHOR_PRESS_URL . 'blocks/details/details.css');
    }

    public function register_fields() {
        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_61734bbdbfd87',
                'title' => 'Details',
                'fields' => array(
                    array(
                        'key' => 'field_61734bcd4fa1f',
                        'label' => 'Number of Pages',
                        'name' => 'ap_number_of_pages',
                        'type' => 'number',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => 234,
                        'prepend' => '',
                        'append' => '',
                        'min' => '',
                        'max' => '',
                        'step' => '',
                    ),
                    array(
                        'key' => 'field_617598ebfdc64',
                        'label' => 'Formats',
                        'name' => 'ap_formats',
                        'type' => 'checkbox',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'Paperback' => 'Paperback',
                            'Kindle' => 'Kindle',
                            'Audio' => 'Audio',
                        ),
                        'allow_custom' => 0,
                        'default_value' => array(
                        ),
                        'layout' => 'vertical',
                        'toggle' => 0,
                        'return_format' => 'value',
                        'save_custom' => 0,
                    ),
                    array(
                        'key' => 'field_61802f05ee1d2',
                        'label' => 'Publication Date',
                        'name' => 'ap_publication_date',
                        'type' => 'date_picker',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'display_format' => 'F j, Y',
                        'return_format' => 'F j, Y',
                        'first_day' => 1,
                    ),
                    array(
                        'key' => 'field_61802f3dee1d3',
                        'label' => 'Language',
                        'name' => 'ap_language',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_61802fbcee1d4',
                        'label' => 'Dimensions',
                        'name' => 'ap_dimensions',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'block',
                            'operator' => '==',
                            'value' => 'acf/details',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'show_in_rest' => false,
            ));
            
            acf_add_local_field_group(array(
                'key' => 'group_617344cd3c04c',
                'title' => 'Reviews',
                'fields' => array(
                    array(
                        'key' => 'field_6173460df5e23',
                        'label' => 'Reviews',
                        'name' => 'reviews',
                        'type' => 'post_object',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => array(
                            0 => 'ap-review',
                        ),
                        'taxonomy' => '',
                        'allow_null' => 0,
                        'multiple' => 1,
                        'return_format' => 'object',
                        'ui' => 1,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'block',
                            'operator' => '==',
                            'value' => 'acf/reviews',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'show_in_rest' => false,
            ));
            
            acf_add_local_field_group(array(
                'key' => 'group_617aae9a4bf8b',
                'title' => 'Summary Block',
                'fields' => array(
                    array(
                        'key' => 'field_617aaea59551a',
                        'label' => 'Title',
                        'name' => 'summary_title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 'Summary',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_617ab0456490b',
                        'label' => 'Book Link',
                        'name' => 'summary_book_link',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'block',
                            'operator' => '==',
                            'value' => 'acf/ap-summary',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'show_in_rest' => false,
            ));
            
            endif;		
    }

}