<?php
/**
 * Summary Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create class attribute allowing for custom "className" and "align" values.
$classes = '';
if( !empty($block['className']) ) {
    $classes .= sprintf( ' %s', $block['className'] );
}
if( !empty($block['align']) ) {
    $classes .= sprintf( ' align%s', $block['align'] );
}

// Load custom field values.
$summary_title = get_field('summary_title');
$book_link = $is_preview ? '#' : get_field('summary_book_link');
$allowed_blocks = array( 'core/paragraph' );

?>
<div class="ap-summary-block <?php echo esc_attr($classes); ?>">
    <h2><?php echo esc_html($summary_title);?></h2>
    <div>
        <InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks )); ?>" />
    </div>
    <!-- add screen reader text here -->
    <a class="button" href="<?php echo esc_url($book_link); ?>">
        Buy Book 
        <span class="screen-reader-text">
            <?php echo get_the_title(); ?>
        </span>
    </a> 
</div>