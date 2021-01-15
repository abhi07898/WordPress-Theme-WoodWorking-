<table id="order_table" class="table table-bordered text-center table-dark text-dark" style="width:100%">
    <thead>
        <tr class="text-light">
            <th>USER_ID</th>
            <th>TIME</th>
            <th>NAME</th>
            <th>CONTACT</th>
            <th>E MAIL</th>
            <th>ADDRESS</th>
            <th>PRODUCT NAME</th>
            <th>PRODUCT PRICE</th>
            <th>PAYEMENT</th>
        </tr>
    </thead>
    <tbody>
<?php 
  global $wpdb;
  $order_resutl = $wpdb->get_results("SELECT * FROM wp_ced_order_table");
  foreach($order_resutl as $order_key => $order_val) {
      $order_id= ($order_val->order_id);
      $user_id = ($order_val->user_id);
      $time = ($order_val->time);
      $customer_detail = json_decode($order_val->customer_detail) ;
      $cname =  $customer_detail[0];
      $ccontact = $customer_detail[1];
      $cemail = $customer_detail[2];
      $caddress = "<ul><li>".$customer_detail[3]."</li><li>".$customer_detail[4]."</li><li>".$customer_detail[5]."</li><li>".$customer_detail[6]."</li><li>".$customer_detail[7]."</li></ul>";
      $cpay_method = $customer_detail[10];
      $ordered_data = json_decode($order_val->order_detail);
     
      foreach ($ordered_data as $ordered_data_key => $ordered_data_value) {
          $product_name = ($ordered_data_value->name);
          $prod_price = ($ordered_data_value->price);?>  
          <tr>  
            <td><?php echo  $user_id;?></td>
            <td><?php echo $time;?></td>
            <td><?php echo $cname;?></td>
            <td><?php echo $ccontact;?></td>
            <td><?php echo $cemail;?></td>
            <td><?php echo $caddress;?></td>
            <td><?php echo  $product_name;?></td>
            <td><?php echo  $prod_price;?></td>
            <td><?php echo  $cpay_method;?></td>
            </tr>
          <?
      }
  }
  echo "</tbody></table>";
?>