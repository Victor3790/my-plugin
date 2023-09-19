<?php

if (! empty($atts['align'])) {

    $align_class = '';

    switch ($atts['align']) {
        case 'center':
            $align_class = 'center-text';
            break;

        case 'left':
            $align_class = 'left-text';
            break;

        case 'right':
            $align_class = 'right-text';
            break;
        
        default:
            $align_class = 'left-text';
            break;
    }
}
?>
<div class="container">
    <p <?php if ( isset($align_class) ) { echo 'class=' . $align_class; } ?>>
        <?php echo $content; ?>
    </p>
</div>
