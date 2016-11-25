<?php if ( post_password_required() ) return; ?>
<?php if ( have_comments() ) : ?>
<?php wp_list_comments( 'type=comment&callback=mytheme_comment' ); ?> 
<?php endif; // have_comments() ?>   
 <?php 

 
    $comments_args = array(
        'class_form'=>'test',
        'label_submit'=>'Submit',
        'title_reply_before' => '<h2>',
        'title_reply'=>'Write a Reply or Comment',
        'title_reply_after' => '</h2>',
        'comment_notes_after' => '',
        'comment_field' => '<textarea id="comment" name="comment" placholder="Message"></textarea>'
        );
?>
<div id="respond" class="leave-reply">
    <?php comment_form($comments_args); //comment_form($args); ?>  
    </div>     
