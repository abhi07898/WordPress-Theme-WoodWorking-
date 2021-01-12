<?php get_header();?>

<div class="row ">
<div class="col col-sm-6 col-lg-6 p-5 bg-success text-primary">
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
                            echo "<td id = 'price-".$p."' data-price='.$p.'>".$p."</td>";
                            $q = $value['qunatity'];
                            echo '<form action="" method="post">';
                            echo "<td>".$q."</td>";
                            // $bill = $p * $q;
                            // echo "<td>".$bill."</td>";
                            ?>   
                            <input type="hidden" name = "price" value = "<?php echo $p;?>">
                            <input type="hidden" name = "key" id="key<?php echo  $value['key'];?>" value = "<?php echo  $value['key'];?>">             
                            <?php
                            // echo "<td> <input type='submit' name = 'update' value = 'Update' id='cart_update'></td>";
                            echo "<td> <input type='submit' name = 'delet' value = 'Delete'  id='cart_delet'></td>";
                            echo "</form>";
                            echo "</tr>";  
                            $total_bill =  $total_bill + $bill;      
                        }  
                    } 
            echo ' </tr></table>';
            // echo "<input type='button' name = 'total_bill' value = 'Total Price = $total_bill'>";
        ?>
</div>
<div class="col col-sm-6 col-lg-6 p-5 bg-light overflow-auto"  style=" max-height: 500px;">
<form>
  <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Ex - Abhishek Pandey">
  </div>
  <div class="form-group">
    <label for="Contact">Contact Number</label>
    <input type="text" class="form-control" id="contact" placeholder="Ex 9120197515">
  </div>
  <div class="form-group">
    <label for="E-Mail">E-Mail</label>
    <input type="text" class="form-control" id="email" placeholder="Ex - ced@gmail.com">
  </div>
  <hr>
  <div class="row">
    <div class="col">
        <div class="form-group">
            <label for="pin code">Country</label>
            <input type="text" class="form-control" id="country" placeholder="Ex - INDIA">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="pin code">Pin Code</label>
            <input type="number" class="form-control" id="pincode" placeholder="Ex - 226063">
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
        <div class="form-group">
            <label for="flat-street">Flat Street</label>
            <input type="text" class="form-control" id="street" placeholder="Ex - AW-365 North road ">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="land mark">Land Mark</label>
            <input type="number" class="form-control" id="landmark" placeholder="Ex - Revtinagar">
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
        <div class="form-group">
            <label for="town">Town</label>
            <input type="text" class="form-control" id="town" placeholder="Ex - AW-365 North road ">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="state">State</label>
            <input type="number" class="form-control" id="state" placeholder="Ex - Revtinagar">
        </div>
    </div>
  </div>
  <hr>
  <div class="form-group">
  <input type="checkbox" id="check_box_address">
    <label for="billing address">Biling Address</label>
    <textarea name="" id="billingaddress" cols="10" rows="2"></textarea>
  </div>
  <div class="row">
    <div class="col">
        <div class="form-group">
            <input type="button" value="Submit" id ='submitdetail' class="ml-5 btn-danger-outline">   </div>
        </div>
    <div class="col">
        <div class="form-group">
        <input type="button" value="Cancel" id ='submitdetail' class="ml-5 btn-danger-outline">   </div>        </div>
    </div>
  </div>
  
</form>
</div>
</div>
 <button class = "btn btn-danger">Hello</button>
