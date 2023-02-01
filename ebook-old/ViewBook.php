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
?>

<div class="book py-5">
    <div class="container">
        <div class="row">
        <?php 
            if(!is_null($book)) {
            ?>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <img src="./assets/img/books/<?= $book['image'] ?>" class="img-thumbnail" alt="<?= $book['title'] ?>" style="margin: 0 auto; box-shadow: -7px 6px 12px rgba(0, 0, 0, 0.3); transition: all 1s ease-in;"/>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8">
                <h1><?= $book['title'] ?></h1>

                <h3 class="mt-5"><b>Description</b></h3>
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

                <form action="<?= $_SERVER['PHP_SELF'] ?>" class="d-flex justify-content-between ">
                    <div>
                        <input type="number" name="qty" id="qty" min="0" max="<?= $book['qty'] ?>" value="1" />
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
                        <button type="submit" name="add-to-cart" class="btn btn-sm btn-outline-primary">Add to cart</button>
                    </div>
                <div>
                    <h4><b><?= $book['price'] ?> EUR</b></h4>
                </div>
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



