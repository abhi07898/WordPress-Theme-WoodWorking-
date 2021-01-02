<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
       body {
        background-color: red;
       }
    </style>
</head>
<body>


<?php
get_template_part('template-part/about', 'header');
echo "single poertfolio.php";
$data = get_post_meta(161, "portfolio_meta_data", true);
if ($data==='') {
    echo '';
} else {
    echo '<h1>'.$data."</h1>";
}
get_header();
get_sidebar();
the_post();
the_content();
// get_footer();
?>
<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
 
<div id="comments" class="comments-area" style="background-color:#221e15; border:2px solid red; box-shadow: 5px 5px 5px 7px red;color:white;">
 
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title" style="color:#2b2519;">
            <?php
                printf( _nx( 'One thought on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title', 'twentythirteen' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h2>
 
        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 74,
                ) );
            ?>
        </ol><!-- .comment-list -->
 
        <?php
            // Are there comments to navigate through?
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&amp;larr; Older Comments', 'twentythirteen' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &amp;rarr;', 'twentythirteen' ) ); ?></div>
        </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>
 
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p>
        <?php endif; ?>
 
    <?php endif; // have_comments() ?>
 
    <?php 
    
    // comment_form(); 
    if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
    get_comments();
    // comments_template('comments.php');
    get_footer();?>
 
</div><!-- #comments -->
</body>
</html>