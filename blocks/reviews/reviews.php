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
//array of IDs
$reviews = get_field('reviews');

if (!$reviews && $is_preview):
?>
<p>Please add at least 1 review</p>
<?php elseif($reviews): 
    $total_reviews = count($reviews);
    $current_review = 1;
?>
    <section class="ap-reviews-block <?php echo esc_attr($classes); ?>">
        <h2>Reviews</h2>
        <div class='slider'>
            <?php foreach($reviews as $review): ?>
                <div>
                    <span class="screen-reader-text">
                        <?php echo sprintf('Review %s of %s', $current_review, $total_reviews ); ?>
                    </span>
                    <?php echo get_the_content(null, false, $review); ?>
                </div>
            <?php 
                $current_review++;
            endforeach; ?>
        </div>
    </section>
<?php endif; ?>
