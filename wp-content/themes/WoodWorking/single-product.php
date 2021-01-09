<?php
global $post;
$id  = $post->ID;
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
                 $data = get_post_meta($id,'product_meta_data',1);
                 echo "Enevntory = ".($data['invent']) ;?></td>
                    <td><?php if($data['disc'] > 0 ){
                         echo "Price = ". $data['disc'];
                    } else {
                         echo "Price = ".$data['regular'];
                    }
                        endwhile; 
                    endif;
                   echo ' <input type="button" value ="add to Cart">';
?>