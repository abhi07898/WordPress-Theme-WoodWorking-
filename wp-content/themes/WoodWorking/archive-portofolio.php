<?php
/*
Template Name: PortfolioContent
*/
echo('portfolio.php');
get_template_part('template-part/about', 'header');
get_header();
get_sidebar();
$loop = new WP_Query( array( 'post_type' => 'Portofolio', 'posts_per_page' => 10 ) ); 
while ( $loop->have_posts() ) : $loop->the_post();
echo '<a href="'. get_the_author() .'">'.get_author_posts_url("1").'</a><br>';
next_post_link();
the_ID().'<br>';
the_time();
    the_title('<h2 class="entry-title"><a href="' . get_permalink()  . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); 
    ?>
    <div class="entry-content">
         <?php the_content(); ?>
    </div>
 <?php endwhile;    
?>  
     