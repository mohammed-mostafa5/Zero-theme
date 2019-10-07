<?php
?>
<h5 class="comments_number">
<?php comments_number( 'No Comments', '1 comment', '% Comments' ); ?>
</h5>
<ul class="comments list-unstyled">
<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
    $comments_args = array(
        'max_depth'  => 5,
        'type'       => 'comment'
    );
    wp_list_comments($comments_args);
}
?>
</ul>
