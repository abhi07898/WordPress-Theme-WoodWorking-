<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to redirect the product's single items in this page.
 *
 * @link       www.cedcommerce.com
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
          <?php 
          //++++++++++++++++++++ inventory logic  +++++++++++++++
          $count = 0;
          $id  = $post->ID;
          $meta_data = get_post_meta($id,'product_meta_data',1);
          $inventory_available_data = $meta_data['invent']; 

          $updated_qnt = 0;
          if(is_user_logged_in()) {
               if ( ! function_exists( 'get_current_user_id' ) ) {
                    return 0;
               }
                $user_id = get_current_user_id();
                $data = get_user_meta( $user_id, 'add_to_cart_details', 1);
                $current_product_name =  get_the_title();
                foreach($data as $key_res => $val_res) {
                  if($val_res['name'] == $current_product_name) 
                  {
                    $updated_qnt  =  $val_res['qunatity'];
                  } 
                }     
          }
          if(!empty($_SESSION['product'])) {
            foreach($_SESSION['product'] as $key => $val){
               $updated_qnt =   $_SESSION['product'][$key]['qunatity']; 
             }
          }

          //++++++++++++++++++++   +++++++++++++++

           if($inventory_available_data < 0 && $inventory_available_data <= $updated_qnt ) {
              echo '<input type="button" value="Out of Stocks !!!" name="out-of-stocks" disabled ></td></a>';           
           } else {
               echo '<input type="submit" value="Add To Cart" name="add_to_cart"></td></a>';             
           } 

          ?>
         
          </tr>
     </form>
     </table>
 <?php
//  unset($_SESSION['product']);

if(empty( $_SESSION['product'])) {
     $_SESSION['product'] = array();
}
     if(isset($_POST['add_to_cart'])) {   
          // echo "<script>alert(str.link('https://www.w3schools.com'));</script>";
          // session_destroy();
          $post_id = $_POST['post_id'];
          $data = get_post($post_id);
          $meta_data = get_post_meta($post_id,'product_meta_data',1);
          $name = $data->post_title;
          if( $meta_data['disc'] > 0) {
               $price = $meta_data['disc'];
          } else {
               $price = $meta_data['regular'];
          }
          $inventor = $meta_data['invent'];
          $item_array = array("key"=> $post_id,"name"=>$name, "price"=>$price, "qunatity"=>1, "invent"=>$inventor);
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
          // insert the session data (add to cart)  into database in user_meta table if user is already logged-in
          if(is_user_logged_in()) {
               if ( ! function_exists( 'get_current_user_id' ) ) {
                    return 0;
               }
                $user_id = get_current_user_id();
                if(!empty($_SESSION['product'])){
                    update_user_meta( $user_id, 'add_to_cart_details', $_SESSION['product']);  
                }         
          }
          if(!empty($_SESSION['product'])) {
               print_r($_SESSION['product']);
          }
           
     }     
    
 ?>
