<?php 
    include('Components/Header.php');
    $_SESSION['page'] = 'View Book';

    include('classes/CRUD.php');
    $crud = new CRUD;

    $error = '';
    $errors = [];


  
    if(isset($_GET['id'])) {
        $book = $crud->read('books', ['column' => 'id', 'value' => $_GET['id']]);
        $book = count($book) > 0 ? $book[0] : null;
    }

    if(isset($_GET['add-to-cart'])){
        $id = $_GET['id'];
        $qty = $_GET['qty'];
        
        if($qty > $book['qty']){
            $errors[] = 'Qty must be from 1 - '.$book['qty'];
        } else {
            if(array_key_exists($id, $_SESSION['cart'])){
                $ecbook = $_SESSION['cart'][$id];
                $ecbook['qty'] = $ecbook['qty'] + $qty;
                $_SESSION['cart'][$id] = $ecbook;
            } else {
                $cbook = $book;
                $cbook['qty'] = $qty;
                $_SESSION['cart'][$id] = $cbook;
            }
        }
    }
    
    // cproduct = cart product 
    // ecproduct = exist cart product 

  
?>


<?php
  echo "<pre>";
    print_r($_SESSION['cart']);
?>



<div class="book py-5">
    <div class="container">
        <div class="row">
        <?php 
            if(!is_null($book)) {
            ?>
            <div class="col-sm-12 col-md-4 col-lg-4 mb-4">
                <img src="./assets/img/sliders/<?= $book['image'] ?>" class="img-fluid" alt="<?= $book['title'] ?>" />
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 mb-4">
                <h3><?= $book['title'] ?></h3>
                <p><?= $book['price'] ?> EUR</p>
                <p><?= $book['content'] ?></p>
                <?php 
                    if(count($errors)) {
                        echo '<ul>';
                        foreach($errors as $error) {
                            echo '<li>'.$error.'</li>';
                        }
                        echo '</ul>';
                    }
                ?>
                <form action="<?= $_SERVER['PHP_SELF'] ?>">
                    <input type="number" name="qty" id="qty" min="0" max="<?= $book['qty'] ?>" value="1" />
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
                    <button type="submit" name="add-to-cart" class="btn btn-sm btn-outline-primary">Add to cart</button>
                </form>
            </div>
            <?php 
            } else {
            ?>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <p>book with id <?= $_GET['id'] ?> doesn't exist!</p>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include('Components/Footer.php')?>


