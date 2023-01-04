<?php 
  include('Components/Header.php');
  $_SESSION['page'] = 'cart';
?>
 
<div class="cart my-5">
  <div class="container">
    <div class="table-responsive">
<table class="table table-bordered ">
  <thead class="table-warning">
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
      <th scope="col">Subtotal</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <td>The art city</td>
      <td>
          <a href="" class="btn btn-sm btn-primary">-</a>
          <span class="d-inline-block mx-2">3</span>
          <a href="" class="btn btn-sm btn-primary">+</a>
      </td>
      <td>1.20 EUR</td>
      <td>3.60 EUR</td>
    </tr>
       <tr>
           <td colspan="3">Total</td>
           <td><b>3.60 EUR</b></td>
       </tr>
  </tbody>
</table>      
    </div>
     <a href="checkout.php" class="btn btn-sm btn-success">Checkout</a>
        <a href="?action=delete_cart_items" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Empty cart</a>
  </div>
</div>

<?php include('Components/Footer.php')?>