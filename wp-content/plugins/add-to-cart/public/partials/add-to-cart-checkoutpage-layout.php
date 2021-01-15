<?php 
session_start();
get_header(); 

?>
<div class="row ">
<div class="col col-sm-6 col-lg-6 p-3 bg-light border text-primary">
<?php 
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
        <table class="table text-center border">
            <tr>
                <th>Sr No</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <!-- <th>Delet</th> -->
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
                            echo "<td id = 'price-".$p."' data-price='.$p.'>".$p."</td>";
                            $q = $value['qunatity'];
                            echo '<form action="" method="post">';
                            echo "<td>".$q."</td>";
                            $bill = $p * $q;
                            // echo "<td>".$bill."</td>";
                            ?>   
                            <input type="hidden" name = "price" value = "<?php echo $p;?>">
                            <input type="hidden" name = "key" id="key<?php echo  $value['key'];?>" value = "<?php echo  $value['key'];?>">             
                            <?php
                            // echo "<td> <input type='submit' name = 'update' value = 'Update' id='cart_update'></td>";
                            // echo "<td> <input type='submit' name = 'delet' value = 'Delete'  id='cart_delet'></td>";
                            echo "</form>";
                            echo "</tr>";  
                            $total_bill =  $total_bill + $bill;      
                        }  
                    } 
            echo ' </tr></table>';
        ?>  
        <div class="p-2 bg-dark text-light text-center mb-3">
           Please Select Payment Mode <input type="radio" name = "orderMethod" id="order_method" value="COD"> COD <br>
        </div>
            

            <input type='button' name = 'total_bill' value = 'Total Price = <?php echo $total_bill ?>'>
            <input type="button" value="Place Order !!  " id ='submitdetail' class="ml-5 btn-danger-outline">   
</div>
<div class="col col-sm-6 col-lg-6 p-3 bg-light overflow-auto border"  style=" max-height: 500px;">
<form id='check_out_details'>
  <div class="form-group">
    <label for="Name">Name *</label>
    <input type="text" class="form-control" id="name" required placeholder="Ex - Abhishek Pandey">
    <span id="name_error" style= "color:red"></span>
  </div>
  <div class="form-group">
    <label for="contact">Contact Number *</label>
    <input type="text" class="form-control" id="contact" required placeholder="Ex 9120197515">
     <span id="contact_error" style= "color:red"></span>
  </div>
  <div class="form-group">
    <label for="email">E-Mail *</label>
    <input type="email" class="form-control" id="email" required placeholder="Ex - ced@gmail.com">
     <span id="email_error" style= "color:red"></span>
  </div>
  <hr>
  <div class="row">
    <div class="col">
        <div class="form-group">
            <label for="country">Country *</label>
            <input type="text" class="form-control" required id="country" placeholder="Ex - INDIA">
            <span id="country_error" style= "color:red"></span>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="pincode">Pin Code *</label>
            <input type="text" class="form-control" required id="pincode" placeholder="Ex - 226063">
             <span id="pincode_error" style= "color:red"></span>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
        <div class="form-group">
            <label for="street">Flat Street *</label>
            <input type="text" class="form-control"  required id="street" placeholder="Ex - AW-365 North road ">
            <span id="street_error" style= "color:red"></span>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="landmark">Land Mark *</label>
            <input type="text" class="form-control" required id="landmark" placeholder="Ex - Revtinagar">
            <span id="landmark_error" style= "color:red"></span>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
        <div class="form-group">
            <label for="town">Town *</label>
            <input type="text" class="form-control" required id="town" placeholder="Ex - AW-365 North road ">
            <span id="town_error" style= "color:red"></span>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="state">State *</label>
            <input type="text" class="form-control" required id="state" placeholder="Ex - Revtinagar">
            <span id="state_error" style= "color:red"></span>
        </div>
    </div>
  </div>
  <hr>
  <div class="form-group">
  <input type="checkbox" id="check_box_address" value = 'same as address'>
    <label for="billingaddress">Biling Address</label>
    <textarea name="" id="billingaddress" cols="10" rows="2"></textarea>
    <span id="billingaddress_error" style= "color:red"></span>
  </div> 
</form>
</div>
</div>
 <button class = "btn btn-danger">Hello</button>
