<?php
// get_header();
// die('index.php');
global $post;
 $loop = new WP_Query( array( 'post_type' => 'product', 'posts_per_page' => 10 ) ); ?>
 <h2>All the Products are showing below</h2>
     <table style = "width:80%; border:2px solid black;">
          <tr>
               <td>Product</td>
               <td>Image</td>
               <td>Inventory</td>
               <td>Price</td>
               <td>View More</td>
          </tr>
 <?php
 while ( $loop->have_posts() ) : $loop->the_post();
 $id  = $post->ID;
the_title('<a href="' . get_permalink()  . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a>' ); 

     ?>
     <tr><td><a href="<?php echo get_the_permalink(get_the_ID()) ?>"><?php the_title();?> </a></td>
     <p><td><?php the_post_thumbnail('thumbnail', array ('class' => "alignleft border"));?></td>
     <div class="entry-content">
         
     </div>
     <td> <?php $data = get_post_meta($id,'product_meta_data',1);echo ($data['invent']) ;?></td>
     <td><?php if($data['disc'] > 0 ){
          echo $data['disc'];
     } else {
          echo $data['regular'];
     }
          ?></td>
     <td><a href="<?php echo get_the_permalink(get_the_ID()) ?>" ><input type="button" value="Show Details"></td></a>
          </tr> 
  <?php endwhile;    
  ?>
  </table>