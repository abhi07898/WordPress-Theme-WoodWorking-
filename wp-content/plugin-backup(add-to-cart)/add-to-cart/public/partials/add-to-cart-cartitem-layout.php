<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to redirect the cart items in this page.
 *
 * @link       www.cedcommerce.com
 * @since      1.0.0
 *
 * @package    Add_To_Cart
 * @subpackage Add_To_Cart/public/partials
 */
session_start();
get_header(); 
//implimentation of updation the cart item
if(isset($_POST['update'])) {
    $cart_data_update = array();
    if(is_user_logged_in()) {
        if ( ! function_exists( 'get_current_user_id' ) ) {
            return 0;
        }
        $user_id = get_current_user_id();
        $cart_data_arr = get_user_meta( $user_id, 'add_to_cart_details');
        $cart_data_update = $cart_data_arr[0];
    } else {
        if(isset($_SESSION['product'])) {
            $cart_data_update = $_SESSION['product'];
        }  
    }
    $quantity = isset($_POST['quantity']) ? sanitize_text_field($_POST['quantity']) : '';
    $key = isset($_POST['key']) ? sanitize_text_field($_POST['key']) : '';
    foreach($cart_data_update as $product_key => $value) {
        if($value['key'] == $key){
        //$cart_data_update[$product_key]['qunatity'] = $quantity;
        $_SESSION['product'][$product_key]['qunatity']= $quantity;
        // if user logged_in so update the cart data 
        if(is_user_logged_in()) {
                if ( ! function_exists( 'get_current_user_id' ) ) {
                    return 0;
                }
                $cart_data_update[$product_key]['qunatity']= $quantity;
                $user_id = get_current_user_id();
                update_user_meta( $user_id, 'add_to_cart_details', $cart_data_update);
            }
        } 
    }
}
// implimentation of deletion the cart item
if(isset($_POST['delet'])) {
    $cart_data_delet = array();
    if(is_user_logged_in()) {
        if ( ! function_exists( 'get_current_user_id' ) ) {
            return 0;
        }
        $user_id = get_current_user_id();
        $cart_data_arr = get_user_meta( $user_id, 'add_to_cart_details');
        $cart_data_delet = $cart_data_arr[0];
    } else {
        if(isset($_SESSION['product'])) {
            $cart_data_delet = $_SESSION['product'];
        }
       
    }
    $key = isset($_POST['key']) ? sanitize_text_field($_POST['key']) : '';
    foreach($cart_data_delet as $sess_key => $val) {
        foreach($val as $products){
            if($val['key'] == $key) {
                // echo 'matched'; die;
                // print_r($_SESSION['product'][$sess_key]);
                unset($_SESSION['product'][$sess_key]);
                // if user logged_in and delete the cart item so it will updated 
                if(is_user_logged_in()) {
                    if ( ! function_exists( 'get_current_user_id' ) ) {
                        return 0;
                    }
                    unset ($cart_data_delet[$sess_key]);
                    $user_id = get_current_user_id();
                    update_user_meta( $user_id, 'add_to_cart_details', $cart_data_delet);
                }
            }
        break;
        }
    }
}
$cart_data = array();     
if(is_user_logged_in()) {
    if ( ! function_exists( 'get_current_user_id' ) ) {
        return 0;
    }
    $user_id = get_current_user_id();
    $cart_data_arr = get_user_meta( $user_id, 'add_to_cart_details');
    $cart_data = $cart_data_arr[0];
    // unset($_SESSION['product']);
} else {
    if(isset($_SESSION['product'])) {
        $cart_data = $_SESSION['product'];
    }
}
    ?>
    <table>
        <tr>
            <th>Sr No</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Update</th>
            <th>Delet</th>
        </tr>
        <tr>
        <?php
            $p = 0;
            $q = 0;
            $bill = 0;
            $total_bill = 0;
            $srno = 0;
                if(!empty($cart_data)) {
                    foreach($cart_data as $product => $value) {
                        echo "<tr>";
                        echo "<td>".$srno++."</td>";
                        echo "<td>".$value['name']."</td>";
                        $p =  $value['price'];
                        echo "<td>".$p."</td>";
                        $q = $value['qunatity'];
                        echo '<form action="" method="post">';
                        echo "<td> <input type = 'number' id = 'quantity' value = ".$q." name = 'quantity' min='1'></td>";
                        $bill = $p * $q;
                        echo "<td>".$bill."</td>";
                        ?>   
                        <input type="hidden" name = "price" value = "<?php echo $p;?>">
                        <input type="hidden" name = "key" value = "<?php echo  $value['key'];?>">             
                        <?php
                        echo "<td> <input type='submit' name = 'update' value = 'Update' id='cart_update'></td>";
                        echo "<td> <input type='submit' name = 'delet' value = 'Delete'  id='cart_delet'></td>";
                        echo "</form>";
                        echo "</tr>";  
                        $total_bill =  $total_bill + $bill;      
                    }  
                } 
        echo ' </tr></table>';
        echo "<input type='button' name = 'total_bill' value = 'Total Price = $total_bill'>";
    ?>

