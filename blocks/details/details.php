<?php
use AuthorPress\Helpers;

$fields = get_fields();

$number_of_pages  = $fields['ap_number_of_pages'];
$formats          = $fields['ap_formats'];
$publication_date = $fields['ap_publication_date'];
$language         = $fields['ap_language'];
$dimensions       = $fields['ap_dimensions'];
if (!$fields && $is_preview) {
    echo 'Enter details';
} else {
?>
    <section>
        <h2>Details</h2>
        <dl class="details">
            <?php if($number_of_pages): ?>
                <div>
                    <dt class="pages"><?php Helpers::icon('bookmark', 'Number of pages'); ?></dt>
                    <dd><?php echo esc_html($number_of_pages); ?></dd>
                </div>
            <?php endif; ?>
            <?php if($formats): ?>
                <div>
                    <dt class="formats"><?php Helpers::icon('book', 'Formats'); ?></dt>
                    <?php foreach($formats as $format):?>
                        <dd><?php echo esc_html($format); ?></dd>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if($publication_date): ?>
                <div>
                    <dt class="date"><?php Helpers::icon('calendar', 'Publication Date'); ?></dt>
                    <dd><?php echo esc_html($publication_date); ?></dd>
                </div> 
            <?php endif; ?>
            <?php if($language): ?>
                <div>
                    <dt><?php Helpers::icon('globe', 'Language'); ?></dt>
                    <dd><?php echo esc_html($language); ?></dd>
                </div>  
            <?php endif; ?>
            <?php if($dimensions): ?>
                <div>
                    <dt class="dimensions"><?php Helpers::icon('ruler', 'Dimensions'); ?></dt>
                    <dd><?php echo esc_html($dimensions); ?></dd>
                </div>   
            <?php endif; ?>  
        </dl>
    </section>
<?php 
}