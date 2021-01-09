<?php get_header();
?>

<div id="page">
    <div id="page-bgtop">
        <div id="page-bgbtm">
            <div id="content">
                <?php
                wp_list_categories();
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