<?php 
$_SESSION['page'] = 'checkout';
?>
<?php include('Components/Header.php')?>
 
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
      <span class="d-inliner-block mx-2"></span>
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
  </div>
</div>



<div class="checkout my-5">
    <div class="container">
        <form action="#">
            <div class="form-group mb-2">
                <label for="fullname">Fullname</label>
                <input type="text" name="fullname" id="fullname" class="form-control" />
            </div>
            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" />
            </div>
            <div class="form-group mb-2">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" />
            </div>
            <div class="form-group mb-2">
                <label for="address">Address</label>
                <textarea name="address" id="address" class="form-control"></textarea>
            </div>
            <hr />
            <div class="form-group mb-4">
                <textarea name="notes" id="notes" class="form-control" placeholder="Enter your notes here"></textarea>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </form>
    </div>
</div>  

<?php include('Components/Footer.php')?>