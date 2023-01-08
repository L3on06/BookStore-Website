<?php 
  include('Components/Header.php');
  $_SESSION['page'] = 'cart';

    include('classes/CRUD.php');
    $crud = new CRUD;

    $error = '';
    $errors = [];


    if(isset($_GET['id'])) {
        $book = $crud->read('books', ['column' => 'id', 'value' => $_GET['id']]);
        $book = count($book) > 0 ? $book[0] : null;
    }

    if(isset($_GET['action'])){
        $id = $_GET['id'];
    
    if($_GET['action'] === 'increase'){
        if(isset($id)) {
            $cbook = $_SESSION['cart'][$id];
             if($cbook['qty'] >= $book['qty']){
            $errors[] = 'Qty must be from 1 - '.$book['qty'];
        } else {
            $cbook['qty'] += 1;
            $_SESSION['cart'][$id] = $cbook;
        }
        header('Location: cart.php');
        }
    }

    if($_GET['action'] === 'decrease'){
        if(isset($id)) {
            $cbook = $_SESSION['cart'][$id];
            if(0 === $cbook['qty']){
                $errors[] = 'Qty must be from 1 - '.$book['qty'];
        } else {
            $cbook['qty'] -= 1;
            $_SESSION['cart'][$id] = $cbook;
        }
        header('Location: cart.php');
        }
    }

    if(isset($_GET['action']) && ($_GET['action'] === 'empty_cart')) {
        $_SESSION['cart'] = [];
        header('Location: cart.php');
    }
    }
?>
 
<div class="cart my-5">
    <div class="container">
        <?php if(isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
        ?>
        <div class="table-responsive">
            <table class="table table-bordered">

                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Qty</th>
                    <th>Price</th>
                </tr>
                                   <?php 
                    if(count($errors)) {
                        echo '<ul>';
                        foreach($errors as $error) {
                            echo '<li>'.$error.'</li>';
                        }
                        echo '</ul>';
                    }
                ?>
                <tr>
                    <?php 
                    $total = 0.00;
                    foreach($_SESSION['cart'] as $book) {
                        // print_r($book);
                        // if($book !== ''){
                        if($book['qty'] > 0){
                      print_r($book['qty']);

                        $total += ($book['qty'] * $book['price']);
                    ?>
                    <tr>
                        <td class="text-center"><img src="./assets/img/books/<?= $book['image'] ?>" class="" alt="<?= $book['title'] ?>" height="150" loading="lazy" style="margin: 0 auto; box-shadow: -7px 6px 12px rgba(0, 0, 0, 0.3); transition: all 1s ease-in;"/></td>
                        <td class="align-middle"><?= $book['title'] ?></td>
                        <td class="align-middle">
                            <a href="?action=decrease&id=<?= $book['id'] ?>" class="btn btn-sm btn-primary">-</a>
                            <span class="d-inline-block mx-2" type="number" name="qty" id="qty" min="0" max="<?= $book['qty'] ?>" value="1"><?= $book['qty'] ?></span>
                            <a href="?action=increase&id=<?= $book['id'] ?>" class="btn btn-sm btn-primary">+</a>
                        </td>
                        <td class="align-middle"><?= $book['qty'] * $book['price'] ?> EUR</td>
                    </tr>
                    <?php
                        }
                        // } else{
                                // $_SESSION['cart'] = [];
                        // }
                        }
                    ?>
                </tr>
                <tr>
                    <td colspan="3"><b>Total:</b></td>
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
        <?php if(isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) { ?>
         <a href="checkout.php" class="btn btn-sm btn-success">Checkout</a>
        <a href="?action=empty_cart" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Empty cart</a>
        <?php } ?>
    </div>
</div>  

<?php include('Components/Footer.php')?>