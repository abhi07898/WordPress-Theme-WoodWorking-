<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to redirect the cart items in this page.
 *
 * @link       www.cedcommercecom
 * @since      1.0.0
 *
 * @package    Add_To_Cart
 * @subpackage Add_To_Cart/public/partials
 */
session_start();
get_header();
if(isset($_POST['update'])) {
    echo '<pre>';
    $quantity = isset($_POST['quantity']) ? sanitize_text_field($_POST['quantity']) : '';
    $key = isset($_POST['key']) ? sanitize_text_field($_POST['key']) : '';
    foreach($_SESSION['product'] as $product_key => $value) {
        if($value['key'] == $key){
           $_SESSION['product'][$product_key]['qunatity'] = $quantity;
        }
    }

    // print_r($_SESSION['product']);
}
if(isset($_POST['delet'])) {
    $key = isset($_POST['key']) ? sanitize_text_field($_POST['key']) : '';
    // echo '<pre>';
    foreach($_SESSION['product'] as $sess_key => $val) {
        foreach($val as $products){
            if($val['key'] == $key) {
                // print_r($_SESSION['product'][$sess_key]);
                unset ($_SESSION['product'][$sess_key]);
            }
            
        break;
        }
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
        foreach($_SESSION['product'] as $product => $value) {
            echo "<tr>";
            echo "<td>".$srno++."</td>";
            echo "<td>".$value['name']."</td>";
            $p =  $value['price'];
            echo "<td>".$p."</td>";
            $q = $value['qunatity'];
            echo '<form action="" method="post">';
            echo "<td> <input type = 'number' value = ".$q." name = 'quantity' min='1'></td>";
            $bill = $p * $q;
            echo "<td>".$bill."</td>";
            ?>   
               <input type="hidden" name = "price" value = "<?php echo $p;?>">
               <input type="hidden" name = "key" value = "<?php echo  $value['key'];?>">             
            <?php
            echo "<td> <input type='submit' name = 'update' value = 'Update'></td>";
            echo "<td> <input type='submit' name = 'delet' value = 'Delet'></td>";
            echo "</form>";
            echo "</tr>";  
            $total_bill =  $total_bill + $bill;      
        }
        // echo "<input type='button' name = 'total_bill' value = 'Total Price = $total_bill'>";
       
    ?>
    </tr>
  
  
</table>
<input type='button' name = 'total_bill' value = 'Total Price = <?php echo $total_bill ?>'>