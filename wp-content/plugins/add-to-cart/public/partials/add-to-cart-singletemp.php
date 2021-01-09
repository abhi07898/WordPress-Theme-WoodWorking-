<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to redirect the items in this page.
 *
 * @link       www.cedcommercecom
 * @since      1.0.0
 *
 * @package    Add_To_Cart
 * @subpackage Add_To_Cart/public/partials
 */
session_start();
global $post;
get_header();
?>
 <h2>All the Products are showing below</h2>
     <table style = "width:100%; border:2px solid black;">
          <tr>
               <td style = "border:2px solid black;">Product</td>
               <td style = "border:2px solid black;">Image</td>
               <td style = "border:2px solid black;">Description</td>
               <td style = "border:2px solid black;">Inventory</td>
               <td style = "border:2px solid black;">Price</td>
               <td style = "border:2px solid black;">View More</td>
          </tr>
 <?php
 $id  = $post->ID;
the_title('<a href="' . get_permalink()  . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a>' ); 
     ?>
     <tr><td style = "border:2px solid black;"><a href="<?php echo get_the_permalink(get_the_ID()) ?>"><?php the_title();?> </a></td>
     <p><td style = "border:2px solid black;"><?php the_post_thumbnail('thumbnail', array ('class' => "alignleft border"));?></td>
     <div class="entry-content">
         
     </div>
     <td style = "border:2px solid black;"><?php  the_content();?></td>
     <td style = "border:2px solid black;"> <?php $data = get_post_meta($id,'product_meta_data',1);echo ($data['invent']) ;?></td>
     <td style = "border:2px solid black;"><?php if($data['disc'] > 0 ){
          echo $data['disc'];
     } else {
          echo $data['regular'];
     }
          ?></td>
     <td style = "border:2px solid black;"><a href="<?php echo get_the_permalink(get_the_ID()) ?>" >
     <form action="" method ="post">
          <input type="hidden" name="post_id" value="<?php echo $id; ?>">
          <input type="submit" value="Add To Cart" name="add_to_cart"></td></a>
          </tr>
     </form>
     </table>
 <?php
//  unset($_SESSION['product']);
if(empty( $_SESSION['product'])) {
     $_SESSION['product'] = array();
}
     if(isset($_POST['add_to_cart'])) {
          // session_destroy();
          $post_id = $_POST['post_id'];
          echo $post_id;
          $data = get_post($post_id);
          $meta_data = get_post_meta($post_id,'product_meta_data',1);
          echo "<pre>";
          $name = $data->post_title;
          if( $meta_data['disc'] > 0) {
               $price = $meta_data['disc'];
          } else {
               $price = $meta_data['regular'];
          }
          $item_array = array("key"=> $post_id,"name"=>$name, "price"=>$price, "qunatity"=>1);
          $var_for_check_condition;    
          if( empty( $_SESSION['product'] ) ) {
               array_push( $_SESSION['product'],$item_array);
          } else {     
               foreach($_SESSION['product'] as $key => $val){
                    if($val['key'] ==  $item_array['key'] ){
                         $var_for_check_condition = "false";
                         break;
                    } else {
                         $var_for_check_condition = "true";
                    } 
               }
               if($var_for_check_condition == "false") {
                    $new_qty = $val['qunatity'] + 1;
                    $_SESSION['product'][$key]['qunatity'] = $new_qty;
               }
               if($var_for_check_condition == "true") {
                    array_push( $_SESSION['product'],$item_array);
               }
          }
          print_r($_SESSION['product']); 
     }     
    
 ?>
 