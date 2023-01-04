<?php

  include('Components/Header.php');
  $_SESSION['page'] = 'CheckOut';

    include('classes/CRUD.php');
    $crud = new CRUD;
  
    $error = '';
    $errors = [];
    
    if(isset($_POST['checkout_btn'])) {
         //validation
        if(strlen($_POST['username']) < 3)
            $errors[] = 'username is empty or too short!';

        if(strlen($_POST['email']) < 4)
            $errors[] = 'email is not valid!';

        if(strlen($_POST['address']) < 4)
            $errors[] = 'address is not valid!';
            
        if(strlen($_POST['phone']) < 6)
            $errors[] = 'phone is not valid!';

if(count($errors) === 0){

        $total = 0.0;
        foreach($_SESSION['cart'] as $b_id => $book) {
            $total += ($book['qty'] + $book['price']);
        }

        // create order
        $data = [
            'user_id' => $_SESSION['user_id'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone'],
            'notes' => $_POST['notes'],
            'total' => $total
        ];
        
        $crud->create('orders', $data);


        // foreach cart book update order_product
        $o_id = $crud->read('orders', [], 1, ['column' => 'id', 'order' => 'DESC'])[0]['id'];
        foreach($_SESSION['cart'] as $b_id => $book) {
            $crud->create('order_book', ['order_id' => $o_id, 'book_id' => $b_id]);
        }

        $_SESSION['cart'] = [];

        header('Location: index.php');
    }
  }
?>

<div class="cart my-5">
    <div class="container">
        <?php if(count($_SESSION['cart']) > 0) {
        ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                <tr>
                    <?php 
                    $total = 0.00;
                    foreach($_SESSION['cart'] as $book) {
                        $total += ($book['qty'] * $book['price']);
                    ?>
                    <tr>
                        <td><?= $book['title'] ?></td>
                        <td>
                            <span class="d-inline-block mx-2"><?= $book['qty'] ?></span>
                        </td>
                        <td><?= $book['price'] ?> EUR</td>
                        <td><?= $book['qty'] * $book['price'] ?> EUR</td>
                    </tr>
                    <?php
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><b><?= $total ?> EUR</b></td>
                </tr>
            </table>
        </div>
        <?php
        } else {
        ?>
        <p>Cart is empty!</p>
        <?php
        }
        ?>
    </div>
</div>  


<div class="checkout my-5">
    <div class="container">
       <?php if(isset($error)) echo '<p>'.$error.'</p>'; ?>
                <?php 
                    if(count($errors)) {
                        echo '<ul>';
                        foreach($errors as $error) {
                            echo '<li>'.$error.'</li>';
                        }
                        echo '</ul>';
                    }
                ?>
        <?php 
        if(!isset($_SESSION['is_loggedin'])) {
        ?>
        <p>Please login first - <a href="login.php">login here</a>.</p>
        <?php
        } else {
        ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" required/>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required/>
            </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address" required/>
            </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="phone" name="phone" class="form-control" id="phone" required/>
            </div>
            <hr />
            <div class="form-group mb-4">
                <textarea name="notes" id="notes" class="form-control" placeholder="Enter your notes here"></textarea>
            </div>
            <button type="submit" name="checkout_btn" class="btn btn-sm btn-primary">Submit</button>
        </form>
        <?php } ?>
    </div>
</div>  

<?php include('Components/footer.php') ?>