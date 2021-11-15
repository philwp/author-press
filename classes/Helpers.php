<?php
namespace AuthorPress;

class Helpers {
    
    public static function icon($name, $screen_reader) {
        ?>
        <span class="ap-icon" aria-hidden="true">
            <?php echo file_get_contents(AUTHOR_PRESS_DIR .'assets/svg/' . $name . '.svg'); ?>
        </span>
        <span class="screen-reader-text">
            <?php echo $screen_reader; ?>
        </span>

        <?php
    }
}