<?php get_header();?>
<div id="page">
    <div id="page-bgtop">
        <div id="page-bgbtm">
            <div id="content">
                <?php
                    if ( have_posts() ) : 
                        while ( have_posts() ) : the_post(); ?>
                        <div class="post">
                            <h2 class="title"><a href="<?php the_permalink();?>"><?php the_title() ?> </a></h2>
                            <p class="meta">Posted by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author();?></a> <?php the_time();?>
                                <a href="#" class="comments">Comments (64)</a> &nbsp;&<a href="" class="permalink">Full article</a></p>
                            <div class="entry">
                                <p><?php the_post_thumbnail('thumbnail', array ('class' => "alignleft border"));?> 
                                <?php the_content()?> </p>
                            </div>
                        </div>  
                    <?php 
                        endwhile; 
                    endif; 
                ?> 
            </div>
            <?php get_sidebar();?>
            <div style="clear: both;">&nbsp;</div>
        </div>
    </div>
</div>
<?php get_footer();?>

<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
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
    // get_comments();
    // comments_template('comments.php');
    get_footer();?>
 
</div><!-- #comments -->


